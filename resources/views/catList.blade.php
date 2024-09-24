@extends('master')

@section('head_content')
    <title>Categories List</title>
@endsection

@section('main_content')

    <div class="container">
        <h1>Root Categories List</h1>
        @if (isset($categories) && $categories->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Navigate</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        @php
                            $parent = \App\Models\Category::find($category->parent_id);
                            $children = \App\Models\Category::where('parent_id', $category->id)->get();

                        @endphp
                        @if ($parent == null)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->type }}</td>
                                {{-- Check if the category has children --}}
                               <td> @if ($children->isNotEmpty())
                                    <a href="{{ route('categories.children', ['id' => $category->id]) }}" class="edit-btn">View Children</a>
                                @else
                                    No Children
                                @endif
                               </td>
                               <td> 
                                <a href="{{ route('categories.show') }}" class="create-btn">Create</a>
                            </td>
                                {{-- {{ $category->parent_id }} --}}
                                @if ($parent)
                                    {{ $parent->type }}
                                @else
                                    {{-- No Parent --}}
                                @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <p>no posts </p>
        @endif
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {!! $categories->links('pagination::bootstrap-4') !!}
        </div>
    </div>

@endsection
