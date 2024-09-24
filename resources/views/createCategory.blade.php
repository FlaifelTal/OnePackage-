@extends('master')

@section('head_content')
    <title>Create New</title>
@endsection
@section('main_content')
    <div class="container">
        <h1>Add New Category</h1>
        <form method="POST" action="{{ route('categories.create') }}">
            @csrf
            <div>
                <label for="type">Category Type</label>
                <input type="text" id="type" name="type" required>
            </div>

            <div class="form-group">
                <label for="parent_id">Parent Category</label>
                <select id="parent_id" name="parent_id" class="form-control">
                    <option value="">None</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['type'] }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit">Add Category</button>
           
          

   
 @endsection

   
    {{-- <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
        <style>
            /* Optional: You can add custom CSS to enhance the tree appearance */
            #categoryTree {
                margin: 20px;
            }
        </style>
    </head>
    <body>
    
        <!-- Tree Container -->
        <div id="categoryTree"></div>
    
        <!-- Pass the category data as JSON to the frontend -->
        <script>
            var categories = {!! json_encode($categories) !!};
        </script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
    
        <script>
            // Function to build hierarchical tree from flat data
            function buildTree(categories, parentId = null) {
                let tree = [];
                categories.forEach(category => {
                    if (category.parent_id == parentId) {
                        // Get children recursively
                        let children = buildTree(categories, category.id);
    
                        // Add the category and its children (if any) to the tree
                        tree.push({
                            id: category.id,
                            text: category.type,
                            children: children.length ? children : null
                        });
                    }
                });
                return tree;
            }
    
            $(document).ready(function() {
                // Initialize jsTree with lines to show hierarchy
                $('#categoryTree').jstree({
                    'core': {
                        'data': buildTree(categories),
                        'themes': {
                            'dots': true,  // Enable dots/lines to connect nodes
                            'icons': false // Disable folder/file icons for cleaner look
                        }
                    },
                    'plugins': ["wholerow"] // Optional: highlights the whole row for better visualization
                });
            });
        </script>
    </body>
    </html>
     --}}