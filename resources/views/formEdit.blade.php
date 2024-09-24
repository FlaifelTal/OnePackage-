@extends('master')

@section('main_content')
<div class="container">
    <h1>Edit {{ ucfirst($formType) }} ({{ strtoupper($currentLanguage) }})</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Display form with existing data -->
    <form action="{{ route('form.edit', ['lang' => $currentLanguage, 'formType' => $formType, 'id' => $form->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $form->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $form->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $form->date) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($form->image)
                <img src="{{ asset('storage/' . $form->image) }}" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('form.index', ['lang' => $currentLanguage, 'formType' => $formType]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
