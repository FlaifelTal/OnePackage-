@extends('master')

@section('head_content')
<title>Admin</title>
@endsection
@section('main_content')

<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="card">
        <div class="card-body">
            {{-- <h5 class="card-title">Manage Categories</h5> --}}
            {{-- <p class="card-text">Create, edit, and manage categories here.</p> --}}
            <a href="{{ route('categories.show') }}" class="create-btn">Create New Category</a>

            <a href="{{ route('categories.list') }}" class="btn btn-secondary">View Categories List</a>

        </div>
    </div>

    

</div>
@endsection
