@extends('master')
@section('head_content')
    <title>Forms</title>
@endsection
@section('main_content')


    <div class="container">
        @if (isset($forms) && $forms->count() > 0)
            <h1>Manage {{ ucfirst($formType) }} ({{ strtoupper($currentLanguage) }})</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        {{-- <th>Actions</th> --}}
                        <th colspan="3" style=" text-align: left; padding-left:50px;">Image</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                        <tr>
                            <td>{{ $form->id }}</td>
                            <td>{{ $form->title }}</td>
                            <td>{{ Str::limit($form->description, 50) }}</td>
                            <td>{{ $form->date }}</td>
                            <td>
                                @if ($form->image)
                                    <img src="{{ asset('storage/' . $form->image) }}" alt="Image" style="max-width: 200px;">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('show', ['formType' => $formType]) }}" class="create-btn">Create</a>

                                <a href="{{ route('form.edit', ['lang' => $currentLanguage, 'formType' => $formType, 'id' => $form->id]) }}"
                                    class="edit-btn">Edit</a>
                                <form
                                    action="{{ route('form.delete', ['lang' => $currentLanguage, 'formType' => $formType, 'id' => $form->id]) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="del-btn"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>no posts </p>
        @endif
        <!-- Pagination Links -->

        <div class="d-flex justify-content-center mt-4">
            {!! $forms->links('pagination::bootstrap-4') !!}
        </div>
    </div>

@endsection
