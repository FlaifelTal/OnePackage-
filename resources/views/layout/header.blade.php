
<div class="container">
        <nav class="navbar  navbar-expand-lg  navbar-light  marg">
                  <div class="marg  r">
                    <a href="{{route('main')}}">
                     
                  <img src="{{ asset('img\logo.png') }}" alt=""></a>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                  <div class="collapse navbar-collapse " id="navbarNavDropdown">

                  <ul class="navbar-nav mr-auto">
                  <li class="nav-item ">
                    <a class="nav text-dark" aria-current="page" href="{{route('main')}}">Home</a>
                  </li>
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                  <a href="{{ route('admin') }}">Admin</a>
                </li>

                  <li class="nav-item">
                    <a class="nav text-dark" href="{{ route('form.index', ['lang' => 'en', 'formType' => 'form3']) }}">Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav text-dark" href="{{ route('form.index', ['lang' => 'en', 'formType' => 'form2']) }}">Projects</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav text-dark" href="{{ route('form.index', ['lang' => 'en', 'formType' => 'form1']) }}">News</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav text-dark" href="{{route('gallery')}}">Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav text-dark" href="{{ route('login') }}">login</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav text-dark " href="{{ route('register') }}">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav text-dark  " href="{{route('form')}}">Contact</a>
                  </li>

                

                </ul>
                  <div>
                  <ul class="navbar-nav">
                  <li class="nav-item ">
                    <a href="#"><i class="icon-facebook icon"></i></a>
                </li>
                <li class="nav-item ">
                  <a href="#"><i class="icon-twitter icon"></i></a>
                </li>
                <li class="nav-item ">
                <a href="#"><i class="icon-linkedin icon"></i></a>
                </li>
                  <li class="nav-item  ">
                  <a href="{{route('ArabicMain')}}" class="icon"><strong>AR</strong></a>
                </li>
                <li class="nav-item">
                  <a href="#"><i class="icon-search  icon-special"></i></a>
                </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
