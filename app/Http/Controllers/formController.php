<?php

namespace App\Http\Controllers;

use App\Models\form;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class formController extends Controller
{
    //
    public static function index()
    {
        return view('form1');
    }
    public function submit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'email' => 'required|email|max:255',
            'nationality' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);
    
        $imagePath = null;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = $file->getClientOriginalName();
    
            // Check if image already exists in the storage
            $existingImagePath = 'uploads/' . $imageName;
            if (Storage::disk('public')->exists($existingImagePath)) {
                // If the image already exists, use the existing path
                $imagePath = $existingImagePath;
            } else {
                // Store the new image and get the path
                $imagePath = $file->storeAs('uploads', $imageName, 'public');
            }
        }
    
        // Create a new record in the form1 table
        Form::create(array_merge($validatedData, ['image_path' => $imagePath]));
    
        return response()->json([
            'status' => true,
            'message' => 'Your data has been submitted successfully!'
        ]);
    }
}


// php artisan storage:link
// link storage to public    