@extends('master')
@section('head_content')
    <title>Gallery</title>
@endsection
@section('main_content')


    <div class="container">
        {{-- <h2>Paginated Gallery</h2> --}}
        @if (isset($forms) && $forms->count() > 0)
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Nationality</th>
                    <th colspan="3" style=" text-align: left; padding-left:70px;">Image</th>

                </tr>
                <tbody>
                    @foreach ($forms as $form)
                        <tr>
                            <td>{{ $form->id }}</td>
                            <td>{{ $form->full_name }}</td>
                            <td>{{ $form->gender }}</td>
                            <td>{{ $form->email }}</td>
                            <td>{{ $form->nationality }}</td>
                            <td>
                                @if ($form->image_path)
                                    <img src="{{ asset('storage/' . $form->image_path) }}" alt="Image"
                                        style="max-width: 200px;">
                                @endif
                            </td>
                            <td><a href="{{ route('gallery.edit', $form->id) }}" class="edit-btn">Edit</a></td>
                            <td>
                                <form method="POST" action="{{ route('gallery.forceDelete', $form->id) }}">
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
