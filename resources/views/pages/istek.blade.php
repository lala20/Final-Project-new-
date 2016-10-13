@extends('pages/layout')

@section('title')
  İstək
@endsection
@section('content')

  <section id="istek">
      <div class="container">
      <ul>
          <li class="pull-left"> <h1><span>Yeni </span> İstək</span></h1></li>
          <li class="pull-right">
               <a href="{{url('/')}}">ANA SƏHİFƏ / </a>
              <a href="{{url('/istek')}}"> YENİ İSTƏK</a>
          </li>
      </ul>
      </div>
  </section>
  <section id="address">
      <div class="container">
          <div class="row">
              <div class="col-lg-4">
                <div id="map"></div>
              </div>

              <div class="col-lg-8">
                <div class="sag">
                  <form action="{{url('/istek')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" id="lat" name="lat">
                    <input type="hidden" id="lng" name="lng">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                      <label class="control-label col-sm-3" for="head">Başlıq <span>*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" maxlength="30" id="head" placeholder="Məsələn: Sökük məktəb, qırıq əşyalar və s...">
                        @if ($errors->has('title'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın</strong>
                            </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('location') || $errors->has('lat') && $errors->has('lng')? ' has-error' : '' }}">
                      <label class="control-label col-sm-3" for="adres">Ünvan<span>*</span></label>
                      <div class="col-sm-9">
                        <input name="location" type="text" class="form-control" id="adres" placeholder="İstəyinizin və ya yaşadığınız yerin ünvanı">
                          @if ($errors->has('location'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın</strong>
                            </span>
                          @elseif($errors->has('lat') && $errors->has('lng'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın </strong>
                            </span>
                        @endif
                      </div>
                    </div>

                    <label class="control-label col-sm-3" for="qurum">Təşkilat adı</label>
                    <div class="col-sm-9">
                      <input name="org" type="text" class="form-control" id="org" placeholder="Əgər varsa təşkilat,universitet və s daxil edin."><span class="org"></span>
                    </div>

                    <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                      <label class="control-label col-sm-3" for="aciq">Açıqlama<span>*</span></label>
                      <div class="col-sm-9">
                        <textarea name="about" rows="8" class="form-control" id="aciq" placeholder="İstəyin detalları"></textarea>
                        @if ($errors->has('about'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın</strong>
                            </span>
                        @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label class="control-label col-sm-3" for="pic">Şəkil<span>*</span></label>
                    <div class="col-sm-9">
                      <input type="file" name="image" class="form-control" id="pic">
                    @if ($errors->has('image'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın</strong>
                            </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="control-label col-sm-3" for="name">Ad , Soyad<span>*</span></label>
                    <div class="col-sm-9">
                      <input type="text" name="name" class="form-control" id="name" placeholder="İstək məsələsində əlaqə qurulacaq şəxs" value="{{Auth::user()->name}}">
                      @if ($errors->has('name'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın</strong>
                            </span>
                        @endif
                    </div>
                  </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                      <label class="control-label col-sm-3" for="numb">Telefon<span>*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="phone" class="form-control" id="numb" placeholder="Şəxsin telefon nömrəsi" value="{{Auth::user()->phone}}">
                          @if ($errors->has('phone'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın</strong>
                            </span>
                        @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="control-label col-sm-3" for="mail">Email<span>*</span></label>
                    <div class="col-sm-9">
                      <input type="email" name="email" class="form-control" id="mail" placeholder="Şəxsin elektron ünvanı" value="{{Auth::user()->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın</strong>
                            </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('nov') ? ' has-error' : '' }}">
                    <label class="control-label col-sm-3" for="nov">Növ<span>*</span></label>
                    <div class="col-sm-9">
                      <input type="text" name="nov" class="form-control" id="nov" placeholder="Dəstəyin nəyə olduğunu bildirin.Məsələn, məktəb,ev və s.">
                        @if ($errors->has('nov'))
                            <span class="help-block">
                              <strong>Boşluq buraxmayın</strong>
                            </span>
                        @endif
                    </div>
                  </div>

                  <div class="form-group">
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
  </section>
  <script src="{{url('/scripts/vendors/jquery.js')}}"></script>

  <script type="text/javascript" src="{{url('/scripts/main.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAanmTrOlQYWRepobnwqSO1E2SOoHYMRBA&libraries=places&callback=initAutocomplete"
         async defer></script>
@endsection
