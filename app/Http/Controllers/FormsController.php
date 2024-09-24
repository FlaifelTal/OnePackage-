<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Forms;
use Illuminate\Support\Facades\Storage;

class FormsController extends Controller
{
    // Get category ID based on form type
    private function getCategoryId($formType)
    {
        // return Category::where('type', $formType)->value('id');

        $categories = [
            'form1' => 'news',
            'form2' => 'projects',
            'form3' => 'events'
        ];

        return \App\Models\Category::where('type', $categories[$formType])->value('id');
    }
    // Show the form based on the form type
    public function showForm($formType)
    {

        switch ($formType) {
            case 'form1':
                $formTitle = 'News';
                $formAction = route('form1.submit', ['formType' => 'form1']);

                break;

            case 'form2':
                $formTitle = 'Projects';
                $formAction = route('form1.submit', ['formType' => 'form2']);

                break;

            default:
                $formTitle = 'Events';
                $formAction = route('form1.submit', ['formType' => 'form3']);

                break;
        }
        // $category = Category::where('type', $formType)->firstOrFail();
        // $formTitle = $category->type; // Assuming the category has a 'name' field
        // $formAction = route('form1.submit', ['formType' => $formType]);
        // Return the view with the form data
        return view('form', compact('formTitle', 'formAction', 'formType'));
    }

    public function submitForm(Request $request, $formType)
    {
        // dd()  alwayyys for error checking 
        // dd($request->all()); // Check the data being submitted



        // Validate and process the form 1 data
        $validatedData = $request->validate([
            'title_en' => 'required|string|max:255',
            'description_en' => 'required|string|max:1000',
            'title_ar' => 'required|string|max:255',
            'description_ar' => 'required|string|max:1000',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB

        ]);
        // get the form cat id 
        $categoryId = $this->getCategoryId($formType);


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

        $languages = [
            'en' => [
                'title' => $validatedData['title_en'],
                'description' => $validatedData['description_en'],
            ],
            'ar' => [
                'title' => $validatedData['title_ar'],
                'description' => $validatedData['description_ar'],
            ],
        ];
        // foreach ($languages as $language => $data) {
        //      Forms::updateOrCreate(
        //         [
        //             'category_id' => $categoryId,
        //             'lang_id' => $request->input('lang_id', 1), // Default or set as needed
        //             'language' => $language
        //         ],
        //         [
        //             'title' => $data['title'],
        //             'description' => $data['description'],
        //             'date' => $validatedData['date'],
        //             'image' => $imagePath,
        //         ]
        //     );
        $nextlangId = Forms::count() + 1;

        foreach ($languages as $language => $data) {
            // Create new record
            $form = Forms::create([
                'category_id' => $categoryId,
                'lang_id' => $nextlangId, // Default or set as needed
                'language' => $language,
                'title' => $data['title'],
                'description' => $data['description'],
                'date' => $validatedData['date'],
                'image' => $imagePath,
            ]);
        }
        // dd($d);
        // dd($request->all());
        return redirect()->back()->with('success', ucfirst($formType) . ' submitted successfully!');
    }

    public function index(Request $request, $lang, $formType)
    {
        app()->setLocale($lang); // Set the application locale based on the URL parameter
        $currentLanguage = app()->getLocale(); // Retrieve the current language

        $resultsPerPage = 10; // Define number of results per page

        // // Determine current language (you may use session, request, or any other method)
        // $currentLanguage = app()->getLocale(); // Example: 'en' or 'ar'

        // Fetch forms for the given type and language
        // $forms = Forms::where('category_id', $this->getCategoryId($formType))
        //     ->where('language', $currentLanguage)
        //     ->paginate($resultsPerPage);
        $categoryId = $this->getCategoryId($formType);
        $forms = Forms::where('category_id', $categoryId)
            ->where('language', $currentLanguage)
            ->paginate($resultsPerPage);

        return view('index', compact('forms', 'formType', 'currentLanguage'));
    }



    public function edit(Request $request, $lang, $formType, $id)
    {
        // Set the application locale based on the language parameter
        app()->setLocale($lang);
        $currentLanguage = app()->getLocale(); // Get the current language


        // Find the form entry by ID and language
        $form = Forms::where('id', $id)
            ->where('language', $currentLanguage)
            ->firstOrFail(); // Ensure that it fails if not found

        if ($request->isMethod('GET')) {

            return view('formEdit', compact('form', 'formType', 'currentLanguage'));
        } elseif ($request->isMethod('POST')) {

            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'date' => 'required|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
            ]);

            // If there is an uploaded file, handle the image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('uploads', 'public'); // Save file to storage/app/public/uploads
                $validatedData['image'] = $path; // Add the image path to the validated data
            }

            // Update the form entry with the validated data
            $form->update($validatedData);

            return redirect()->route('form.index', ['lang' => $currentLanguage, 'formType' => $formType])
                ->with('success', 'Form updated successfully.');
        }
        // Handle invalid request method
        abort(405, 'Method Not Allowed');
    }

    // public function update(Request $request, $lang, $formType, $id)
    // {
    //     // $request->isPost();
    //     app()->setLocale($lang); // Set the locale to the current language
    //     $currentLanguage = app()->getLocale(); // Get the current language

    //     // Validate incoming data
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string|max:1000',
    //         'date' => 'required|date',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
    //     ]);

    //     // Find the form entry by ID and language
    //     $form = Forms::where('id', $id)
    //         ->where('language', $currentLanguage)
    //         ->firstOrFail();

    //     // If there is an uploaded file, handle the image upload
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $path = $file->store('uploads', 'public'); // Save file to storage/app/public/uploads
    //         $validatedData['image'] = $path; // Add the image path to the validated data
    //     }

    //     // Update the form entry with the validated data
    //     $form->update($validatedData);

    //     return redirect()->route('form.index', ['lang' => $currentLanguage, 'formType' => $formType])
    //         ->with('success', 'Form updated successfully.');
    // }

    public function delete($lang, $formType, $id)
    {
        app()->setLocale($lang); // Set the locale to the current language
        $currentLanguage = app()->getLocale(); // Get the current language

        // Find the form entry by ID and language
        $form = Forms::where('id', $id)
            ->where('language', $currentLanguage)
            ->firstOrFail();

        // Delete the form entry
        $form->delete();

        // Redirect back to the forms index with the appropriate parameters
        return redirect()->route('form.index', ['lang' => $currentLanguage, 'formType' => $formType])
            ->with('success', 'Form deleted successfully.');
    }
}
