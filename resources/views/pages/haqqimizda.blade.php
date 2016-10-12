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
  <div class="container">
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
    <h1 class="text-center">Haqqımızda</h1>
    <p>
      Harada yaşayırıqsa yaşayaq ehtiyacı olan insanlara dəstək olmaq, bir-birimizə yardım etmək cəmiyyət olaraq hər birimizin vicdani vəzifəsidir.
      Bu saytın yaranmasının əsas məqsədi yardıma ehtiyacı olan insanların istəklərinin qısa müddətdə sosialaşdırılması, yəni bu istəklərin ən qısa zamanda insanların nəzərinə gətirməkdir və onların daha tez qarşılanmasına şərait yaratmaqdır. Bu saytda heç bir maddi maraq güdülmür və heç bir maddi dəstəyə icazə verilmir.
    </p>
    <p>
      Bu saytda iki əsas bölmə var: İSTƏK ƏLAVƏ ETMƏK və DƏSTƏK OLMAQ.

    </p>
    <p>
      “İstək əlavə et” bölməsində qarşılanmasını istədiyiniz ehtiyaclarınızı əlavə edə bilərsiniz.</p>
    <p>“Dəstək ol” bölməsində isə siz verə biləcəyiniz dəstəkləri qeyd edə bilərsiniz. Qeydləriniz təhsil, tibb, məişət, heyvanlara yardım və s. tipli ola bilər..</p>


  </div>
</section>
@endsection
