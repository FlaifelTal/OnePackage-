@extends('master')

@section('head_content')
    <title>Children of {{ $parent->type }}</title>
@endsection

@section('main_content')
    <div class="container">
        <h1>Children of {{ $parent->type }}</h1>
        @if ($children->count() > 0) 
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
                    @foreach ($children as $child)
                        <tr>
                            <td>{{ $child->id }}</td>
                            <td>{{ $child->type }}</td>
                            <td> 
                                @if ($children->isNotEmpty())
                                <a href="{{ route('categories.children', ['id' => $child->id]) }}" class="edit-btn">View Children</a>
                            @else
                                No Children
                            @endif
                           </td>
                           <td> 
                            <a href="{{ route('categories.show') }}" class="create-btn">Create</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No children found</p>
        @endif
        <!-- Pagination Links (if needed) -->
        <div class="d-flex justify-content-center mt-4">
            {!! $children->links('pagination::bootstrap-4') !!}
        </div>
        <!-- Link back to the parent categories list -->
        {{-- <a href="{{ route('categories.list') }}" class="btn btn-primary">Back to Categories List</a> --}}
    </div>
@endsection
