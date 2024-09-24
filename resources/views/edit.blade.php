@extends('master')

@section('head_content')
<title>Edit Record</title>
@endsection
@section('main_content')
<div class="container">
    <h1>Edit Record</h1>
    <form action="{{ route('gallery.update', $form->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="fullName">Full name:</label>
            <input type="text" id="fullName" name="full_name" value="{{ old('full_name', $form->full_name) }}" class="form-control">
            @error('full_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control">
                <option value="">Select</option>
                <option value="male" {{ old('gender', $form->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $form->gender) == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $form->email) }}" class="form-control">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality" value="{{ old('nationality', $form->nationality) }}" class="form-control">
            @error('nationality')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            @if ($form->image_path)
                <div>
                    <img src="{{ asset('storage/' . $form->image_path) }}" alt="Current Image" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" id="image" name="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
