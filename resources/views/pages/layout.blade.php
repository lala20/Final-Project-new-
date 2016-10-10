<?php
use App\City;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Bootstrap və Fontawesome sass ilə qoşulub -->
    <link rel="stylesheet" href="{{url('css/app.css')}}">
</head>
<body>
<!-- CONTACT SECTION START -->
<section id="contact" class="hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <!-- Email və əlaqə nömrəsi -->

                <ul class="list-inline pull-left margin0 padding0">
                    <li><a href="mailto:info@testwebsite.com"><h6 class="pull-left margin0">alfagen4@gmail.com</h6></a></li>
                </ul>
                <!-- Social fontawesome iconlar-->
                <ul class="list-inline pull-right margin0 padding0">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT SECTION END -->

<!-- NAVBAR SECTION START -->
<section id="navbar">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
              <!-- Ekran ölçüsü balacalaşdıqda istifadə olunacaq button(lar) -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>

                    <!-- Logo -->
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('image/logo.png')}}" alt="logo" /></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <!-- Navbar  Menu -->
                <ul class="nav navbar-nav">
                    <li><a {{Request::is('/') ? "class=active" : ''}} href="{{url('/')}}"><i class="fa fa-home"></i> Ana Səhİfə</a></li>
                    <li><a {{Request::is('istek') ? "class=active" : ''}} href="{{url('/istek')}}"><i class="fa fa-map-marker"></i> İstək əlavə et</a></li>
                    <li><a {{Request::is('destek') ? "class=active" : ''}} href="{{url('/destek')}}"><i class="fa fa-yelp"></i> Dəstək ol</a></li>
                    <li><a {{Request::is('haqqimizda') ? "class=active" : ''}} href="{{url('/haqqimizda')}}"><i class="fa fa-info-circle"></i> Haqqımızda</a></li>
                    <li><a {{Request::is('elaqe') ? "class=active" : ''}} href="{{url('/elaqe')}}"><i class="fa fa-phone"></i> Əlaqə</a></li>
                </ul>

                  <ul class="nav navbar-nav navbar-right">
                      <!-- Authentication Links -->
                      @if (Auth::guest())
                        <li><a href="{{url('/register')}}"><i class="fa fa-user-plus"></i> Qeydiyyat</a></li>
                        <li><a href="{{url('/login')}}"><i class="fa fa-sign-in"></i> Daxil ol</a></li>
                      @else
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Xoş gəldiniz, {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                  <li><a href="{{ url('/profil') }}"><i class="fa fa-btn fa-user"></i> Profilim</a></li>
                                  <li><a href="{{ url('/isteklerim') }}"><i class="fa fa-btn fa-map-marker"></i> Ehtiyaclarım</a></li>
                                  <li><a href="{{ url('/desteklerim') }}"><i class="fa fa-btn fa-yelp"></i> Dəstəklərim</a></li>
                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Çıxış</a></li>
                              </ul>
                          </li>
                      @endif
                  </ul>
            </div>
        </div>
    </nav>
</section>
<!-- NAVBAR SECTION END -->
@yield('content')
<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3">
        <img src="{{url('/image/logo.png')}}" alt="logo" />
      </div>
      <div class="col-lg-6 col-md-6 col-sm-4 col-xs-9">
        <p>
          Bu layihə könüllü şəxslər tərəfindən yaradılıb və heç bir
          maddi maraq güdülmür. Saytda yerləşdirilmiş materiallara
          görə məsuliyyət daşımırıq.
        </p>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-5 hidden-xs"></div>
    </div>
  </div>
</div>

<script src="{{url('/scripts/vendors/jquery.js')}}"></script>
<script src="{{url('/scripts/vendors/bootstrap.min.js')}}"></script>
<script src="{{url('/scripts/vendors/modernizr.min.js')}}"></script>
<script src="{{url('/scripts/main.js')}}"></script>
</body>
</html>
