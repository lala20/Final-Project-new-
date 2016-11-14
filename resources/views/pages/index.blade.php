@extends('pages/layout')

@section('title')
   Ana səhifə
@endsection
@section('content')
<style media="screen">
  .openLoad{
    width: 50px;
  position: absolute;
  top: 233px;
  z-index: 2;
  left: 654px;
  }
  .closeLoad{
    display: none;
  }
</style>
  <!-- GOOGLEMAP SECTION START -->
  <section id="googlemap">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12 padding0">
           <div id="searchBoxDrag">

               <div id="moveButton">
                     <i class="fa fa-arrows fa-2x"></i>
               </div>
               <div id="searchButton" class="index3" data-index='1'>
                   <i class="fa fa-search-minus fa-2x"></i>
               </div>
               <div id="infoButton" class='index3' data-index='2'>
                   <i class="fa fa-info fa-2x"></i>
               </div>

            <form id="mapSearch" class="form-inline" action="" method="POST">
             <div class="searchpart clickedVer" data-info='1'>
                 <ul>
                   <li>
                       <label> Şəhər/region:</label>
                       <input id="Loc" type="text" class="hidden" name="keyword" value="all">
                       <select class="Test" id="acar">
                         <option name="location" value="all">Hamisi</option>
                         @foreach ($datas as $data)
                           <option name="location" value="{{$data->location}}">{{$data->location}}</option>
                         @endforeach
                       </select>
                   </li>
                     <li>
                       <label> Istek/Destek:</label>
                       <input id="Type" type="text" class="hidden" name="city" value="all">
                       <select class="Test" id="seher">
                         <option  name="type" value="all">Hamisi</option>
                         <option name="type" value="1">Destek</option>
                         <option name="type" value="2">Istek</option>
                       </select>
                     </li>
                     <li>
                       <label> Nov:</label><br>
                       <input id="Nov" type="text" class="hidden" name="category" value="all">
                       <select class="Test" id="kategory">
                         <option  name="nov" value="all">Hamisi</option>
                         @foreach ($datas as $data)
                           <option name="nov" value="{{$data->nov}}">{{$data->nov}}</option>
                         @endforeach
                       </select>
                   </li>
                 </ul>
             </div>
           </form>
           <div class="infopart clickedVer" data-info='2'>
             <p>This is map info content. You can add html content, image etc.. into this area. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
           </div>

           </div>

           <img class="Load openLoad closeLoad" src="{{url('image/info-loading.gif')}}">
           <div id="infoMap">

           </div>
       </div>
     </div>
   </div>
 </section>
  <!-- GOOGLEMAP SECT ION END -->

  <section id="news">
    <div class="container">
      <div class="row">
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAanmTrOlQYWRepobnwqSO1E2SOoHYMRBA&callback=Mydata&language=az"
               async defer></script>
@endsection
