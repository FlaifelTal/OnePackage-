@extends('master')
@section('head_content')
    <title>{{ $formTitle }}</title>
@endsection
@section('main_content')
    <div class="wrapper">
        <div class="form-container">
            {{-- <h1>{{ $formTitle }}</h1> --}}
            <form id="dynamicForm" method="POST" action="{{ route('form1.submit', ['formType' => $formType]) }}"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="form_type" value="{{ $formType }}">

                @if ($formType === 'form1')
                    <!-- Form 1 specific fields -->
                    <label for="title_en">News Title</label>
                    <input type="text" id="title_en" name="title_en" value="{{ old('title_en') }}">

                    <label for="title_ar">العنوان الإخباري</label>
                    <input type="text" id="title_ar" name="title_ar" value="{{ old('title_ar') }}">


                    <label for="description_en">News Description</label>
                    <input type="text" id="description_en" name="description_en" value="{{ old('description_en') }}">


                    <label for="description_ar">تفاصيل الأخبار</label>
                    <input type="text" id="description_ar" name="description_ar" value="{{ old('description_ar') }}">

                    <label for="date">Puplish Date</label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}">

                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" value="{{ old('image') }}">
                @elseif ($formType === 'form2')
                    <!-- Form 1 specific fields -->
                    <label for="title_en">Project Title</label>
                    <input type="text" id="title_en_Project" name="title_en" value="{{ old('title_en') }}">

                    <label for="title_ar">عنوان المشروع</label>
                    <input type="text" id="title_ar_Project" name="title_ar" value="{{ old('title_ar') }}">

                    {{-- <label for="extraField1">العنوان الإخباري</label>
                   <input type="text" id="extraField1" name="extra_field1"
                       value="{{ old('title') ?? $formData['title'] }}"> --}}


                    <label for="description_en">Project Description</label>
                    <input type="text" id="description_en_Project" name="description_en"
                        value="{{ old('description_en') }}">


                    <label for="description_ar">تفاصيل المشروع</label>
                    <input type="text" id="description_ar_Project" name="description_ar"
                        value="{{ old('description_ar') }}">

                    <label for="date">Puplish Date</label>
                    <input type="date" id="date_Project" name="date" value="{{ old('date') }}">

                    <label for="image">Image</label>
                    <input type="file" id="image_Project" name="image" value="{{ old('image') }}">
                @else
                    <!-- Form 1 specific fields -->
                    <label for="title_en">Event Title</label>
                    <input type="text" id="title_en_news_event" name="title_en" value="{{ old('title_en') }}">

                    <label for="title_ar">عنوان الحدث</label>
                    <input type="text" id="title_ar_event" name="title_ar" value="{{ old('title_ar') }}">

                    <label for="description_en">Event Description</label>
                    <input type="text" id="description_en_event" name="description_en"
                        value="{{ old('description_en') }}">


                    <label for="description_ar">تفاصيل الحدث</label>
                    <input type="text" id="description_a_eventr" name="description_ar"
                        value="{{ old('description_ar') }}">

                    <label for="date">Puplish Date</label>
                    <input type="date" id="date_event" name="date" value="{{ old('date') }}">

                    <label for="image">Image</label>
                    <input type="file" id="image_event" name="image" value="{{ old('image') }}">
                @endif

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
