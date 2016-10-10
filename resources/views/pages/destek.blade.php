@extends('pages/layout')

@section('title')
   Dəstək
@endsection
@section('content')

  <section id="istek">
      <div class="container">
      <ul>
          <li class="pull-left"> <h1><span>Yeni </span> Dəstək</span></h1></li>
          <li class="pull-right">
               <a href="{{url('/')}}">ANA SƏHİFƏ / </a>
              <a href="{{url('/destek')}}"> YENİ DƏSTƏK</a>
          </li>
      </ul>
      </div>
  </section>
  <section id="address">
      <div class="container">
          <div class="row">
              <div class="col-lg-4">
                <div id="map"></div>
                <div class="destek">
                  <!-- Soldakı bütün istəklər -->
                  <div class="thumbnail" >
                    @if($sonEls->type_id=='2' && $sonEls->status=='1')
                     <img src="image/{{$sonEls->image}}">
                       <div class="caption">
                         <h4 class="text-center">{{$sonEls->title}}</h4>
                         <p>{{substr($sonEls->about, 0,200)}}...</p>
                         <div class="col-lg-6"><a href="{{url('/isteksiyahisi')}}" class="btn btn-success center-block" role="button">Bütün İstəklər</a></div>
                         <div class="col-lg-6"><a href="{{url('/single/'.$sonEls->id)}}" class="btn btn-success center-block" role="button">Ətraflı</a></div>
                       </div>
                   @endif
                  </div>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="sag">
                  <form action="{{url('/destek')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="lat" name="lat">
                    <input type="hidden" id="lng" name="lng">
                    <label class="control-label col-sm-3" for="head">Başlıq <span>*</span></label>
                    <div class="col-sm-9">
                      <input type="text" name="title" class="form-control" maxlength="30" id="head" placeholder="Məsələn: Sökük məktəb, qırıq əşyalar və s..."><span class="head"></span>
                    </div>

                    <label class="control-label col-sm-3" for="adres">Ünvan<span>*</span></label>
                    <div class="col-sm-9">
                      <input name="location" type="text" class="form-control" id="adres" placeholder="İstəyinizin və ya yaşadığınız yerin ünvanı"><span class="adres"></span><span class="LatLng"></span>
                    </div>

                    <label class="control-label col-sm-3" for="qurum">Təşkilat adı <span>*</span></label>
                    <div class="col-sm-9">
                      <input name="org" type="text" class="form-control" id="org" placeholder="Əgər varsa təşkilat,universitet və s daxil edin."><span class="org"></span>
                    </div>


                  <label class="control-label col-sm-3" for="aciq">Açıqlama<span>*</span></label>
                  <div class="col-sm-9">
                    <textarea name="about" rows="8" class="form-control" id="aciq" placeholder="İstəyin detalları"></textarea><span class="aciq"></span>
                  </div>


                  <label class="control-label col-sm-3" for="pic">Şəkil<span>*</span></label>
                  <div class="col-sm-9">
                    <input type="file" name="image" class="form-control" id="pic"><span class="pic"></span>
                  </div>

                  <label class="control-label col-sm-3" for="name">Ad , Soyad<span>*</span></label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="name" placeholder="İstək məsələsində əlaqə qurulacaq şəxs" value="{{Auth::user()->name}}"><span class="name"></span>
                  </div>

                  <label class="control-label col-sm-3" for="numb">Telefon<span>*</span></label>
                  <div class="col-sm-9">
                    <input type="text" name="phone" class="form-control" id="numb" placeholder="Şəxsin telefon nömrəsi" value="{{Auth::user()->phone}}"><span class="numb"></span>
                  </div>


                  <label class="control-label col-sm-3" for="mail">Email<span>*</span></label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="mail" placeholder="Şəxsin elektron ünvanı" value="{{Auth::user()->email}}"><span class="mail"></span>
                  </div>

                  <label class="control-label col-sm-3" for="nov">Növ<span>*</span></label>
                  <div class="col-sm-9">
                    <input type="text" name="nov" class="form-control" id="nov" placeholder="Dəstəyin nəyə olduğunu bildirin.Məsələn, məktəb,ev və s."><span class="nov"></span>
                  </div>

                  <label class="control-label col-sm-3" for="date">İstəyinizin müddəti<span>*</span></label>
                  <div class="col-sm-9">
                    <input name="date" type="date" class="form-control" id="date">
                  </div>

                  <div class="col-sm-2 col-sm-offset-3">
                    <input type="submit" name="kaydet" value="Qeyd Et" class="btn">
                  </div>
                  </form>
                </div>
              </div>
          </div>
      </div>
  </section>
  <script type="text/javascript" src="/scripts/main.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAanmTrOlQYWRepobnwqSO1E2SOoHYMRBA&libraries=places&callback=initAutocomplete"
         async defer></script>
@endsection
