<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('custom.profile');
        }
        return view('registerC');
    }

    // Handle registration
    public function register(Request $request)
    {
       
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('custom.profile');
    }

    // Show the login form
    public function showLoginForm()
    {
  
        return view('loginC');
    }

    // Handle login
    public function login(Request $request)
    {
       
    
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('custom.profile');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Show profile page
    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('custom.login'); // Redirect to login if not authenticated
        }
    
        return view('profileC', ['user' => Auth::user()]);
    }

    // Handle account deletion
    public function deleteAccount(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        if ($user) {
            // Use query builder to delete the user
            User::where('id', $user->id)->delete();
            Auth::logout();
            return redirect()->route('custom.login')->with('status', 'Account deleted successfully.');
        } else {
            return back()->withErrors(['error' => 'User not found or already deleted.']);
        }
    }


    // Handle password change


   // Method to update the authenticated user’s profile
   public function updateProfile(Request $request)
   {
       $user = Auth::user(); // Get the currently authenticated user

       if ($user) {
           // Validate the incoming request data
           $validatedData = $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
               'password' => 'nullable|string|min:8|confirmed',
           ]);

           // Prepare data for update
           $dataToUpdate = [
               'name' => $validatedData['name'],
               'email' => $validatedData['email'],
           ];

           // Update password only if provided
           if (!empty($validatedData['password'])) {
               $dataToUpdate['password'] = bcrypt($validatedData['password']);
           }

           // Update the user using the update() method
           User::where('id', $user->id)->update($dataToUpdate);

           return redirect()->back()->with('status', 'Profile updated successfully.');
       } else {
           return back()->withErrors(['error' => 'User not found.']);
       }
   }

   public function logout(Request $request)
   {
       Auth::logout(); // Log the user out
       $request->session()->invalidate(); // Invalidate the session
       $request->session()->regenerateToken(); // Regenerate CSRF token
   
       return redirect()->route('custom.login')->with('status', 'Logged out successfully.');
   }

}