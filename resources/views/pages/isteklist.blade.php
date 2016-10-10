@extends('pages.layout')

@section('content')
  <section id="istek">
      <div class="container">
      <ul>
          <li class="pull-left"> <h1>İstəklər</span></h1></li>
          <li class="pull-right">
               <a href="{{url('/')}}">ANA SƏHİFƏ / </a>
              <a href="{{url('/istek')}}"> YENİ İSTƏK</a>
          </li>
      </ul>
      </div>
  </section>
  <section id="destek_olanlar">
     <div class="container-fluid">
        <div class="row">
        @foreach($isteklist as $istek)
        @if($istek->type_id=='2')
           <div class="col-md-6 col-sm-6">
             <div class="row list">
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <img class="img-responsive" src="{{url('image/'.$istek->image)}}"/>
                 </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <h2>{{$istek->title}}</h2>
                   <p>{{substr($istek->about, 0,120)}}...</p>
                   <a class="pull-right" href="{{URL('single/'.$istek->id)}}"><i class="fa fa-3x fa-chevron-circle-right" aria-hidden="true"></i></a>
                 </div>
             </div>
           </div>
           @endif
          @endforeach
        </div>
        <div class="col-md-3 col-md-offset-9">
          {{ $isteklist->links()}}
        </div>


     </div>
  </section>
@endsection
