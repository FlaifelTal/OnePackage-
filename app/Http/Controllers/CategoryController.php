<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Show form to create a new category
    public function show()
    {
        // $categories = Category::all();
        $categories = $this->getCategoriesHierarchical();

        return view('createCategory', compact('categories'));
    }
    // Store a new category
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|unique:categories,type|max:255',
            'parent_id' => 'nullable|exists:categories,id',

        ]);

        Category::create([
            'type' => $validatedData['type'],
            'parent_id' => $validatedData['parent_id'], // Will be NULL if 'parent_id' is not selected

        ]);

        return redirect()->route('categories.show')->with('success', 'Category added successfully!');
    }
    private function getCategoriesHierarchical($parentId = null, $prefix = '')
    {
        // Fetch categories where parent_id matches the provided $parentId
        $categories = Category::where('parent_id', $parentId)->get();

        // Initialize an array to store hierarchical categories
        $result = [];

        foreach ($categories as $category) {
            // Add the current category to the result with a prefix for hierarchy visualization
            $result[] = [
                'id' => $category->id,
                'type' => $prefix . $category->type,
                // 'children' => $this->getCategoriesHierarchical($category->id)

            ];

            // Recursively fetch child categories
            $result = array_merge($result, $this->getCategoriesHierarchical($category->id, $prefix . '-'));
        }

        return $result;
    }

    public function listParents()
    {
        // Fetch categories where parent_id is null (i.e., parent categories)
        $parentCategories = Category::whereNull('parent_id')->get();
        return view('admin', compact('parentCategories'));
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function showCategoriesList()
    {
        // $resultsPerPage = 10;

        $categories = Category::paginate(10);

        return view('catList', compact('categories'));
    }
    public function showChildren($id)
    {
        $parent = Category::findOrFail($id);
        $children = Category::where('parent_id', $id)->paginate(10); // or get() for non-paginated list
    
        return view('children', compact('parent', 'children'));
    }
    

}
