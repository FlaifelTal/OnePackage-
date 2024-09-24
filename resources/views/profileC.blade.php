@extends('master')


@section('head_content')
<title>Login</title>
@endsection

@section('main_content')
<div class="wrapper">
    <div class="form-container">

    {{-- <div class="container"> --}}
        <h2>User Profile</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Hello, {{ $user->name }}</h3>
        <p>Email: {{ $user->email }}</p>

        <form action="{{ route('custom.profile.update') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required>
            </div>
            <div>
                <label for="password">New Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password_confirmation">Confirm New Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <button type="submit">Update Profile</button>
        </form>

        <form action="{{ route('custom.profile.delete') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" style="background-color: red; color: white;">Delete Account</button>
        </form>

        <form action="{{ route('custom.logout') }}" method="POST" id="logout-form">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        
    </div>
</div>

@endsection

