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
            @if (Session::has('send'))
                 <div class="alert alert-success" role="alert">{{Session::get('send')}}</div>
            @endif
          <h1 class="text-center">Bizimlə əlaqə</h1>
          <p>Əlaqə saxlamaq üçün aşağıdakı formu doldurun.</p>
        </div>
         <form class="" action="{{url('/elaqe')}}" method="post">
         {{csrf_field()}}
           <div class="col-md-7">
              {{-- name input --}}
             <div class="col-md-2">
               <label for="contactName">Ad *</label>
             </div>
             <div class="col-md-10">
                 <input id="contactName" class="form-control" type="text" name="name">
             </div>
               {{-- surname input --}}
             <div class="col-md-2">
               <label for="contactSurname">Soyad *</label>
             </div>
             <div class="col-md-10">
                 <input id="contactSurname" class="form-control" type="text" name="surname">
             </div>
             {{-- email input --}}
             <div class="col-md-2">
               <label for="contactEmail">Email *</label>
             </div>
             <div class="col-md-10">
                 <input id="contactEmail" class="form-control" type="text" name="email">
             </div>
             {{-- message input --}}
             <div class="col-md-2">
               <label for="contactMessage">Mesaj *</label>
             </div>
             <div class="col-md-10">
                 <textarea id="contactMessage" rows="10" class="form-control" type="text" name="message"></textarea>
             </div>
             <div class="col-md-4 col-md-offset-4">
                <input type="submit" name="send" value="Göndər" class="btn btn-success form-control">
             </div>

         </form>

        </div>
      </div>
    </div>

  </div>
</section>
@endsection
