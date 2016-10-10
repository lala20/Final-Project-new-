@extends('pages/layout')
@section('title')
   Haqqımızda
@endsection
@section('content')
  <section id="istek">
    <div class="container">
    <ul>
        <li class="pull-left"> <h1>Haqqımızda</h1></li>
        <li class="pull-right">
             <a href="{{url('/')}}">ANA SƏHİFƏ </a>
            <span> / </span>
            <a href="{{url('/haqqimizda')}}"> HAQQIMIZDA</a>
        </li>
    </ul>
    </div>
</section>
<section id="about_body">
  <div class="container text-center">
    <div class="row">
      <div class="container">
        <div class="col-md-3">
          <div class="team">
            <img  class="img-responsive" src="image/member_11-500x535.jpg"/>
              <h4>Naseh Bedelov</h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team">
            <img  class="img-responsive" src="image/gun.jpg"/>
            <h4>Lalə Memmedova</h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team">
            <img  class="img-responsive" src="image/t3.jpg"/>
              <h4>Ferid Babayev</h4>
          </div>
        </div><div class="col-md-3">
          <div class="team">
            <img  class="img-responsive" src="image/gun.jpg"/>
              <h4>Günel İsmayılova</h4>
          </div>
        </div>
      </div>
    </div>
    <h1>Haqqımızda</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
      ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
      voluptate velit esse cillum dolore eu fugiat nulla pariatur.
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
      ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
      voluptate velit esse cillum dolore eu fugiat nulla pariatur.
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
      ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
      voluptate velit esse cillum dolore eu fugiat nulla pariatur.
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

  </div>
</section>
@endsection
