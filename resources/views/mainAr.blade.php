@extends('master')
<html lang="ar" dir=rtl>


@section('head_content')
    <title>الصفحة الرئيسية</title>
@endsection

@section('main_content')
    <div class="wrap">
        <div id="arrow-left" class="arrow"></div>
        <div id="slider">

            <div class="slide slide1">
                <div class="container">

                    <div class="overlay-text">
                        <h1 style="margin-bottom: 40px;"> <strong>لوريم إيبسوم هو ببساطة نص</strong></h1>
                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                            الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم
                            لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد
                            محتوى نصي" فتجعلها تبدو أي الأحرف وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير
                            صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص</p>
                        <button class="button-overlay">إقرأ المزيد</button>

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
                        <p style="margin: 0; font-size: 14px;">ناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                            سيلهي القارئ عن التركيز على الشكل
                            الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم
                            لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد
                            محتوى نصي" فتجعلها تبدو أي الأحرف وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير
                            صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص صفحات الويب تستخدم لوريم إيبسوم بشكل
                            إفتراضي كنموذج عن النص

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
            <button class="btn">الجميع</button>
            <button class="btn">التنضيف</button>
            <button class="btn">البلاستيك</button>
            <button class="btn">الاّلات</button>
            <!-- Add more category buttons as needed -->
        </div>



    <!-- Popup and Smoke -->
    <div id="smoke"></div>
    <div id="popup">
        <div id="popup_bar">
            <span id="popup_title">العنوان</span>
            <span id="btn_close">X</span>
        </div>
        <div id="popup_content">
            <div id="popup_img">
                <img id="popup_img_src" src="" alt="Product Image">
            </div>
            <div id="popup_text">
                <h2 id="popup_product_name">اسم المنتج</h2>
                <p id="popup_product_description">شرح المنتج هنا</p>
            </div>
        </div>
    </div>

    <div style="background-color: #F3F3F3; ">
        <div class="container">

            <div class="heading-container" style="margin-bottom: 20px;">
                <strong> <span class="blue-text">أخر</span></strong>
                <strong> <span class="grey-text">الأخبار</span></strong>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4" style="margin-bottom: 100px;">

                <div class="col">
                    <img src="{{ asset('img/img1.jpg') }}" alt="" class="img-fluid">
                    <span class="news-time"><i class="icon-clock"></i> July 21, 2024</span>
                    <a href="#" class="news-link">العنوان الإخباري</a>
                </div>
                <div class="col">
                    <img src="{{ asset('img/img2.jpg') }}" alt="" class="img-fluid">
                    <span class="news-time"><i class="icon-clock"></i> July 21, 2024</span>
                    <a href="#" class="news-link">العنوان الإخباري</a>
                </div>
                <div class="col">
                    <img src="{{ asset('img/img3.jpg') }}" alt="" class="img-fluid">
                    <span class="news-time"><i class="icon-clock"></i> July 21, 2024</span>
                    <a href="#" class="news-link">العنوان الإخباري</a>
                </div>
                <div class="col">
                    <img src="{{ asset('img/img4.jpg') }}" alt="" class="img-fluid">
                    <span class="news-time"><i class="icon-clock"></i> July 21, 2024</span>
                    <a href="#" class="news-link">العنوان الإخباري</a>
                </div>
            </div>

        </div>



        <div class="row row-cols-1 row-cols-md-5 g-4 no-gutter" style="margin-bottom: 100px;">

            <div class="col position-relative">
                <img src="{{ asset('img/p1.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">لوريم إيبسوم</span>
                        <span class="line2">هو ببساطة نص شكلي</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/p2.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">لوريم إيبسوم</span>
                        <span class="line2">هو ببساطة نص شكلي</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/p3.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">لوريم إيبسوم</span>
                        <span class="line2">هو ببساطة نص شكلي</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/p4.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">لوريم إيبسوم</span>
                        <span class="line2">هو ببساطة نص شكلي</span>
                        <i class="icon-search  "></i>
                    </p>
                </div>
            </div>
            <div class="col position-relative">
                <img src="{{ asset('img/p5.jpg') }}" alt="" class="img-fluid">
                <div class="overlay">
                    <p class="text-content">
                        <span class="line1">لوريم إيبسوم</span>
                        <span class="line2">هو ببساطة نص شكلي</span>
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
