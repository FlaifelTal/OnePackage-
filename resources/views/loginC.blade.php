@extends('master')


@section('head_content')
<title>Login</title>
@endsection

@section('main_content')
<div class="wrapper">
    <div class="form-container">

    {{-- <div class="container"> --}}
        <h2>Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('custom.login.submit') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('custom.register') }}">Register here</a>.</p>
    </div>
</div>

@endsection
