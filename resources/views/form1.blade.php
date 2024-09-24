@extends('master')
@section('head_content')
<title>Form</title>
@endsection
@section('main_content')

    <div id="config" data-api-url="{{route('form.submit')}}"></div>

    <div class="wrapper">
        <div class="form-container">
            <form action="{{route('form.submit')}}" id="submissionForm" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="fullName">Full name:</label>
                {{-- retrieves the old name (built in ) --}}
                <input type="text" id="fullName" name="full_name" value="{{ old('full_name') }}">
                <div id="fullNameError" class="error">@error('full_name'){{$message}}
                
                @enderror</div>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="">Select</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
                <div id="genderError" class="error">@error('gender'){{$message}}
                    
                @enderror</div>

                <label for="email">Email address:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                <div id="emailError" class="error">@error('email'){{$message}}
                    
                @enderror</div>

                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality">

                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                <div id="imageError" class="error">@error('imape_path'){{$message}}
                    
                @enderror</div>
              
                <button type="submit">Submit</button>
                <div id="responseMessage" class="alert"></div>
            </form>
        </div>
    </div>

  @endsection
