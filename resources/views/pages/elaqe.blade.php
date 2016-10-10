@extends('pages/layout')
@section('title')
   Əlaqə
@endsection
@section('content')
  <section id="istek">
    <div class="container">
    <ul>
        <li class="pull-left"> <h1>Əlaqə</h1></li>
        <li class="pull-right">
             <a href="{{url('/')}}">ANA SƏHİFƏ </a>
            <span> / </span>
            <a href="{{url('/elaqe')}}"> ƏLAQƏ</a>
        </li>
    </ul>
    </div>
</section>
<section id="elaqepage">
  <div class="container">

    <div class="elaqeusullari">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="text-center">Əlaqə üsulları</h1>
        </div>
        <div class="col-lg-3 col-lg-offset-1">
          <p>
            <i class="fa fa-map-marker fa-2x"></i> <i>AF Business House, 3cü mərtəbə </i>
          </p>
          <p>
            <i class="fa fa-envelope-o fa-2x"></i> <i> alfagen4@gmail.com</i>
          </p>
          <p>
            <i class="fa fa-phone fa-2x"></i> <i> +994877881254646</i>
          </p>
        </div>
        <div class="col-lg-6 col-lg-offset-1">
          <div id="contactmap"></div>
        </div>
      </div>
    </div>
  </div>
</section>
       <script type="text/javascript">

        function contactMap() {
        var map = new google.maps.Map(document.getElementById('contactmap'), {
          center: {lat: 40.37743150000001, lng: 49.85410260000003},
          zoom: 16,
          zoomControl:false,
          streetViewControl:false,
          mapTypeControl:false,
          scrollwheel:false
        });
        marker = new google.maps.Marker({
         map: map,
         animation: google.maps.Animation.DROP,
         position: {lat: 40.37743150000001, lng: 49.85410260000003}
      });
    }
       </script>
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAanmTrOlQYWRepobnwqSO1E2SOoHYMRBA&callback=contactMap"
       async defer></script>
@endsection
