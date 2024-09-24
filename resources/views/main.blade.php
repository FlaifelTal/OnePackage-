@extends('master')


@section('head_content')
<title>home</title>
@endsection

@section('main_content')
    <div class="wrap">
        <div id="arrow-left" class="arrow"></div>
        <div id="slider">

            <div class="slide slide1">
                <div class="container">

                    <div class="overlay-text">
                        <h1 style="margin-bottom: 40px;"> <strong>Lorem ipsum dolor is simply text</strong></h1>
                        <p>Maxime mollitia,
                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                            optio, eaque rerum! Provident similique accusantium nemo autem.</p>
                        <button class="button-overlay">Read More</button>

                    </div>
                </div>
            </div>

            <div class="slide slide2">

            </div>

            <div class="slide slide3">

            </div>
        </div>

        <div id="arrow-right" class="arrow"></div>
    </div>



    <div class="container" style="padding-bottom: 140px;">
        <div class="wrapper1">
            <div class="content-wrapper">
                <div class="text-container ">
                    <div style="display: flex; align-items: center; gap: 10px;  padding-left: 40px;">
                        <p style="font-size: 20px; color: #007FC4; margin: 0;">About</p>
                        <p style="font-size: 36px; color: #007FC4; margin: 1;">One Package</p>
                    </div>
                    <div class="border-container">
                        <p style="margin: 0; font-size: 14px;">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                            sheets containing Lorem Ipsum passages,
                        </p>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('img/pic1.jpg') }}" alt="Background Image" class="overlay-image">

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="heading-container" style="margin-bottom: 20px;">
            <strong><span class="blue-text">Our</span></strong>
            <strong><span class="grey-text">Products</span></strong>
        </div>
        <div class="button-row" style="margin-bottom: 30px;">
            <button class="btn">ALL</button>
            <button class="btn">Cleaning</button>
            <button class="btn">Plastics</button>
            <button class="btn">Machines</button>
            <!-- Add more category buttons as needed -->
        </div>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6 g-4" style="margin-bottom: 70px;">
            @forelse ($products as $product)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset($product->img) }}" class="card-img-top" alt="Product Image">

                        {{-- <img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="Product Image"> --}}
                        <div class="card-body text-center">
                            <p style="color: #757575; font-size: 10px; margin-bottom: 0;">
                                {{ htmlspecialchars($product->category) }}</p>
                            <p style="font-size: 16px; margin-bottom: 0;">{{ htmlspecialchars($product->title) }}</p>
                            <p class="truncate" style="font-size: 10px;">{{ htmlspecialchars($product->description) }}</p>
                            <button class="btn_popup btn1" data-cat="{{ htmlspecialchars($product->category) }}"
                                data-title="{{ htmlspecialchars($product->title) }}"
                                data-description="{{ htmlspecialchars($product->description) }}"
                                data-img-src="{{ asset($product->img) }}">Details</button>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>
    </div>

    <!-- Popup and Smoke -->
    <div id="smoke"></div>
    <div id="popup">
        <div id="popup_bar">
            <span id="popup_title">Title</span>
            <span id="btn_close">X</span>
        </div>
        <div id="popup_content">
            <div id="popup_img">
                <img id="popup_img_src" src="" alt="Product Image">
            </div>
            <div id="popup_text">
                <h2 id="popup_product_name">Product Name</h2>
                <p id="popup_product_description">Description of the product goes here.</p>
            </div>
        </div>
    </div>

    <div style="background-color: #F3F3F3; ">
        <div class="container">

            <div class="heading-container" style="margin-bottom: 20px;">
                <strong> <span class="blue-text">Latest</span></strong>
                <strong> <span class="grey-text">News</span></strong>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4" style="margin-bottom: 100px;">

                <div class="col">
                    <img src="{{ asset('img/img1.jpg') }}" alt="" class="img-fluid">
                    <span class="news-time"><i class="icon-clock"></i> July 21, 2024</span>
                    <a href="#" class="news-link">News Title</a>
                </div>
                <div class="col">
                    <img src="{{ asset('img/img2.jpg') }}" alt="" class="img-fluid">
                    <span class="news-time"><i class="icon-clock"></i> July 21, 2024</span>
                    <a href="#" class="news-link">News Title</a>
                </div>
                <div class="col">
                    <img src="{{ asset('img/img3.jpg') }}" alt="" class="img-fluid">
                    <span class="news-time"><i class="icon-clock"></i> July 21, 2024</span>
                    <a href="#" class="news-link">News Title</a>
                </div>
                <div class="col">
                    <img src="{{ asset('img/img4.jpg') }}" alt="" class="img-fluid">
                    <span class="news-time"><i class="icon-clock"></i> July 21, 2024</span>
                    <a href="#" class="news-link">News Title</a>
                </div>
            </div>

        </div>



        <div class="row row-cols-1 row-cols-md-5 g-4 no-gutter" style="margin-bottom: 100px;">

            <div class="col position-relative">
                <img src="{{ asset('img/p1.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">Lorem Ipsum is</span>
                        <span class="line2">simply dummy text</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/p2.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">Lorem Ipsum is</span>
                        <span class="line2">simply dummy text</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/p3.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">Lorem Ipsum is</span>
                        <span class="line2">simply dummy text</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/p4.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">Lorem Ipsum is</span>
                        <span class="line2">simply dummy text</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/p5.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">Lorem Ipsum is</span>
                        <span class="line2">simply dummy text</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-4  " style="margin-bottom: 100px;">

            <div class="col position-relative">
                <img src="{{ asset('img/1.png') }}" alt="">
                <div class="overlay1"></div>

            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/2.png') }}" alt="">
                <div class="overlay1"></div>


            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/3.png') }}" alt="">
                <div class="overlay1"></div>

            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/4.png') }}" alt="">
                <div class="overlay1"></div>

            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/5.png') }}" alt="">
                <div class="overlay1"></div>

            </div>

        </div>
    </div>
@endsection
