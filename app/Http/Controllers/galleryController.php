<?php

namespace App\Http\Controllers;

use App\Models\form;
use Illuminate\Http\Request;

class galleryController extends Controller
{
    //
    // public function index(){
    //     return view('gallery');
    // }
    public function index(Request $request)
    {
        // Define the number of results per page
        $resultsPerPage = 10;
        // $forms = form::paginate($resultsPerPage);
        $forms = form::paginate($resultsPerPage);
        // Fetch paginated data

        // Pass data to the view
        // return view('gallery', ['forms' => $forms]);
        return view('gallery', compact('forms'));

    }
    public function forceDelete($id)  {
         $form = form::findOrFail($id);
        // $form = form::onlyTrashed()->findOrFail($id);
        // File::delete(public_path($post->image));
        $form->forceDelete();
        return redirect()->back();
    
    }
    public function edit($id)  {

        // $editform = editform::all();
        $form = form::findOrFail($id);
        // Pass the record to the edit view
        return view('edit', compact('form'));
        // $categories = category::all();
        // $post = post::findOrFail($id);
        // return view('edit', compact('categories', 'post'));

    }
      // Update the specified resource in storage
      public function update(Request $request, $id)
      {
          $form = form::findOrFail($id); // Retrieve the record to update
  
          // Validate incoming data
          $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'email' => 'required|email|max:255',
            'nationality' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
          ]);
  
          // If there is an uploaded file, handle the image upload
          if ($request->hasFile('image')) {
              $file = $request->file('image');
              $path = $file->store('uploads', 'public'); // Save file to storage/app/public/uploads
              $validatedData['image_path'] = $path; // Add the image path to the validated data
          }
  
          $form->update($validatedData); // Update the record with the validated data
  
          return redirect()->route('gallery')->with('success', 'Record updated successfully.');
      }
}
