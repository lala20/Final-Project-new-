@extends('pages.layout')

@section('content')
  <section id="istek">
      <div class="container">
      <ul>
          <li class="pull-left"> <h1>Mənim <span>İstəyim</span></h1></li>
          <li class="pull-right">
               <a href="{{url('/')}}">ANA SƏHİFƏ / </a>
              <a href="{{url('/istek')}}"> İSTƏK</a>
          </li>
      </ul>
      </div>
  </section>
  <section id="singlePage">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <img class="img-responsive center-block" src="{{url('/image/'.$single->image)}}" alt="singleNews Photo" />
                    <a class="btn btn-success center-block destek-ol-button" role="button"><i class="fa fa-check"></i> Dəstək olmaq istəyirəm</a>
                    <div class="alert alert-success destek-ol-message">
                      <p><i class="fa fa-user"></i> Ad,Soyad: {{$single->name}}</p>
                      <p><i class="fa fa-envelope-o"></i> Email: {{$single->email}}</p>
                      <p><i class="fa fa-phone"></i> Əlaqə nömrəsi: {{$single->phone}}</p>
                      <p><i class="fa fa-map-marker"></i> Ünvan: {{$single->location}}</p>

                    </div>
              </div>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <h1 class="text-center">{{$single->title}}</h1>
                  <p class="text-right">
                  </p>
                  @if(!$diff->d == 0 && $diff->m == 0)
                    <p class="text-right">
                    İstəyin müddəti: {{$diff->d}} gün
                  </p>
                @else
                  <p class="text-right">
                  İstəyin müddəti: {{$diff->m}} ay {{$diff->d}} gün
                </p>
              @endif
                <p class="text-justify">{{$single->about}}</p>
              </div>
          </div>
      </div>
  </section>
@endsection
