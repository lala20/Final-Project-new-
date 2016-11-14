@extends('pages/layout')

@section('title')
   Ana səhifə
@endsection
@section('content')
  <!-- SEARCHBAR SECTION START -->
  <section id="searchbar">
    <div class="container">
      <div class="row">
        <!-- Listlər inline olaraq yazılıb -->
          <form class="form-inline" action="{{url('/')}}" method="POST">
            <div class="form-group col-lg-4 col-md-4 col-sm-4">
               {{csrf_field()}}
              <input type="text" class="form-control" name="keyword" placeholder="Açar söz">
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-3"> <!--Şəhər inputu nisbətən kiçikdi. -->
              <input type="text" class="form-control" name="city" placeholder="Şəhər / Region">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-4">
              <input type="text" class="form-control" name="category" placeholder="Kateqoriya">
            </div>
            <div class="form-group col-lg-1 col-md-1 col-sm-1">
              <input type="submit" class="form-control" name="submit" value="&#xf002;">
            </div>
          </form>
      </div>
    </div>
  </section>
  <!-- SEARCHBAR SECTION END -->

  <!-- GOOGLEMAP SECTION START -->
  <section id="googlemap">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 padding0">
            <div id="infoMap"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- GOOGLEMAP SECT ION END -->

  <section id="news">
    <div class="container">
      <div class="row">
        {{-- @foreach($datas as $data)
          @if($data->status=='1' && $data->type_id=='2')

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="fadeIn">
                    <div class="row">
                        <h5>{{$data->title}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{url('/single/'.$data->id)}}"><img src="{{url('/image/'.$data->image)}}" alt="News Image"></a>
                    </div>
                    <div class="row">
                      <p class="about">{{substr($data->about, 0,150)}}...</p>
                      <i class="fa fa-eye" aria-hidden="true"> {{$data->view}}</i>
                      <i class="fa fa-calendar" aria-hidden="true"></i>

                      <a href="{{url('/single/'.$data->id)}}" class="btn pull-right" role="button">Ətraflı
                      <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
          @endif
        @endforeach --}}

        <div class="news-left col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0">
          <!--=====================NEWS BLOCK========================= -->
          @foreach ($datas as $data)
            @if($data->status=='1' && $data->type_id=='2')
              <div class="news-block col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0 thumbnail">
              <div class="news-image col-lg-12 padding0">
                <div class="news-type news-istek">
                  İstək
                </div>
                <a href="{{url('/single/'.$data->id)}}"><img src="{{url('/image/'.$data->image)}}" alt="İstək image" /></a>
              </div>
              <div class="news-content col-lg-12 padding0">
                <div class="news-title">
                  <a href="#">{{$data->title}}</a>
                </div>
                <div class="news-location col-lg-12">
                  <p><i class="fa fa-map-marker"></i> {{$data->location}}</p>
                </div>
                <div class="news-stats col-lg-12">
                  <ul class="list-inline">
                    <li><i class="fa fa-eye"></i> {{$data->view}}</li>
                    <li><i class="fa fa-calendar"></i>
                      @if(!$diff->d == 0 && $diff->m == 0)
                        {{$diff->d}} gün
                      @elseif($diff->d == 0 && !$diff->m == 0)
                        {{$diff->m}} ay
                      @else
                        {{$diff->m}} ay {{$diff->d}} gün
                      @endif
                    </li>
                  </ul>
                </div>
              </div>
              </div>
            @endif
          @endforeach
              <!--=====================END NEWS BLOCK========================= -->
            </div>


        <div class="news-right col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0">
          <!--=====================NEWS BLOCK========================= -->
          @foreach ($datas as $data)
            @if($data->status=='1' && $data->type_id=='1')
              <div class="news-block col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0 thumbnail">
              <div class="news-image col-lg-12 padding0">
                <div class="news-type news-destek">
                  Dəstək
                </div>
                <a href="{{url('/single/'.$data->id)}}"><img src="{{url('/image/'.$data->image)}}" alt="İstək image" /></a>
              </div>
              <div class="news-content col-lg-12 padding0">
                <div class="news-title">
                  <a href="#">{{$data->title}}</a>
                </div>
                <div class="news-location col-lg-12">
                  <p><i class="fa fa-map-marker"></i> {{$data->location}}</p>
                </div>
                <div class="news-stats col-lg-12">
                  <ul class="list-inline">
                    <li><i class="fa fa-eye"></i> {{$data->view}}</li>
                    <li><i class="fa fa-calendar"></i>
                      @if(!$diff->d == 0 && $diff->m == 0)
                        {{$diff->d}} gün
                      @elseif($diff->d == 0 && !$diff->m == 0)
                        {{$diff->m}} ay
                      @else
                        {{$diff->m}} ay {{$diff->d}} gün
                      @endif
                    </li>
                  </ul>
                </div>
              </div>
              </div>
            @endif
          @endforeach
              <!--=====================END NEWS BLOCK========================= -->
        </div>
    </div>
    </div>
  </section>
 <script type="text/javascript" src="scripts/main.js"></script>

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
      </script>
        <script type="text/javascript">
             var markers = [];
      function initMap() {
      var myLatLng = [
      @foreach($datamaps as $datamap)
         @if($datamap->status=='1')
         {lat: {{$datamap->lat}},
         lng:{{$datamap->lng}},

         content:'<div id="infow">' +
                    '<div class="infow-content">' +
                      '<div class="infow-title"></div>' +
                      '<img src="{{url('/image/'.$datamap->image)}}" height="115" width="100">' +
                      '<p>lorem ipsum st dolar amitgbhgbvfdbvfbvgf</p>'
             +
                    '</div>' +
                  '</div>',
         title:"{{$datamap->title}}",
         @if ($datamap->type_id=='2')
            icon:"/image/green-icon.png"
          @elseif ($datamap->type_id=='1')
          icon:"/image/red-icon.png"
         @endif
         },
          @endif

      @endforeach

      ];

      var map = new google.maps.Map(document.getElementById('infoMap'), {
      center: {  lat: 40.100,lng: 48.800},
      zoom: 8,
      scrollwheel: false,
      streetViewControl:false,
      mapTypeControl:false,
      overViewMapControl:false
    });
              var info = new google.maps.InfoWindow();
              function manyInfo(mark, infowindow) {
              infowindow.setContent(mark.content);
              infowindow.open(map, mark);
              markers.addListener('closeclick', function() {
                  infowindow.setMarker(null);
              });

          }
         markers = myLatLng.map(function(location, i) {
              return new google.maps.Marker({
                  position: location,
                  content:myLatLng[i].content,
                  title:myLatLng[i].title,
                  icon: myLatLng[i].icon,
                  animation: google.maps.Animation.DROP
              });

          });
          for (var i = 0; i < markers.length; i++) {
              google.maps.event.addListener(markers[i], 'click', function() {
                  manyInfo(this, info);
              });
          }
          var markerCluster = new MarkerClusterer(map, markers, {
            imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
        });
}
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAanmTrOlQYWRepobnwqSO1E2SOoHYMRBA&callback=initMap"
               async defer></script>
@endsection
