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
        @foreach($datas as $data)
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
                      <?php
                      $dbdate=new DateTime($data->deadline);
                      $newdate=new DateTime('now');
                      $diff = date_diff($newdate,$dbdate);
                       ?>
                  @if(!$diff->d == 0 && $diff->m == 0)
                   {{$diff->d}} gün
                @elseif($diff->d == 0 && !$diff->m == 0)
                 {{$diff->m}} ay
               @else
                    {{$diff->d}} gün  {{$diff->m}} ay
              @endif
                      <a href="{{url('/single/'.$data->id)}}" class="btn pull-right" role="button">Ətraflı
                      <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
          @endif
        @endforeach
    </div>
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 col-xs-12">
          <a class="btn center-block" href="{{url('/isteksiyahisi')}}">Bütün istəklərə bax <i class="fa fa-arrow-right"></i></a>
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
            title:"<b>{{$datamap->title}}</b><br> <img style='width:200px;height:150px' src='{{url('image/'.$data->image)}}'><br><a href='{{url('/single/'.$datamap->id)}}' class='btn pull-right'>Ətraflı</a>"
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
              infowindow.setContent(mark.title);
              infowindow.open(map, mark);
              markers.addListener('closeclick', function() {
                  infowindow.setMarker(null);
              });

          }
         markers = myLatLng.map(function(location, i) {
              return new google.maps.Marker({
                  position: location,
                  title:myLatLng[i].title,
                  icon: 'https://lh3.googleusercontent.com/NU7oZ7XSozdZYdGnZs_64cn0U6hwrkKNfAr-cqFScO40nEgyIcRtvXuzSAZQn_9VqsY=w40',
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
