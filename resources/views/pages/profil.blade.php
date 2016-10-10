@extends('pages/layout')

@section('content')

	<section id="profilim">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
							@if(Auth::user()->avatar)
					    	<img class="img-responsive" src="{{url('image/'.Auth::user()->avatar)}}">
				     @else
					  	 <img class="img-responsive" src="{{url('image/prof.png')}}">
				     @endif
              <form id="target" action="{{url('/avatar')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                                <!-- yeniiiiiiiiiiiii -->
                    {{-- <input type="file" name="image" id="file" value="hello"> --}}
										<label for="file"><i class="fa fa-arrow-circle-o-up"></i> Yüklə</label>
										<input type="file" name="image" id="file" class="hidden">
                </form>
               <ul class="list-unstyled">
                   <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><b> İstifadəçinin məlumatları</b></a></li>
                   <li><a href=""><i class="fa fa-lock" aria-hidden="true"></i> Şifrə dəyişdir</a></li>
                   <li><a href="{{url('/isteklerim')}}"><i class="fa fa-thumb-tack" aria-hidden="true"></i> İstək qeydlərim</a></li>
                   <li><a href="{{url('/desteklerim')}}"><i class="fa fa-tags" aria-hidden="true"></i>Dəstəklərim</a></li>
               </ul>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-9  col-xs-12">
                <div class="profilime panel panel-primary">
                    <div class="panel-heading">
                        <h4>Profili Nizamlamaq</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                            <form action="{{url('/profil')}}" method="post" enctype="multipart/form-data">
                             {{csrf_field()}}
                                <tr>
                                    <td>İstifadəçi adı</td>
                                    <td><input class="form-control" type="text" name="username" value="{{ Auth::user()->username}}"></td>
                                </tr>
                                <tr>
                                    <td>Adınız Soyadınız *</td>
                                    <td><input class="form-control" type="text" name="name" value="{{ Auth::user()->name}}"></td>
                                </tr>
                                <tr>
                                    <td>Telefon Nömrəniz *</td>
                                    <td><input  class="form-control" type="text" name="phone" value="{{ Auth::user()->phone}}"></td>
                                </tr>
                                <tr>
                                    <td>Elektron Ünvan *</td>
                                    <td><input  class="form-control" type="email" name="email" value="{{ Auth::user()->email}}"></td>
                                </tr>
                                <tr>
                                    <td>Şəhər/Rayon</td>
                                    <td>
																			<input id="city" type="text" class="hidden" name="city" value="">
																			<select id="seherler" class="form-control"  name="city">
																									 <option value="{{Auth::user()->city}}">{{Auth::user()->city}}</option>
																									 <option value="Baki">Baki</option>
																									 <option value="Abşeron">Abşeron</option>
																									 <option value="Ağdam">Ağdam</option>
																									 <option value="Ağdaş">Ağdaş</option>
																									 <option value="Avalueabədi">Ağcabədi</option>
																									 <option value="Ağstafa">Ağstafa</option>
																									 <option value="Ağsu">Ağsu</option>
																									 <option value="Astara">Astara</option>
																									 <option value="Babək">Babək</option>
																									 <option value="Balakən">Balakən</option>
																									 <option value="Bərdə">Bərdə</option>
																									 <option value="Beyləqan">Beyləqan</option>
																									 <option value="Biləsuvar">Biləsuvar</option>
																									 <option value="Cəbrayıl">Cəbrayıl</option>
																									 <option value="Cəlilabad">Cəlilabad</option>
																									 <option value="Culfa">Culfa</option>
																									 <option value="Daşkəsən">Daşkəsən</option>
																									 <option value="Füzuli">Füzuli</option>
																									 <option value="Gədəbəy">Gədəbəy</option>
																									 <option value="Goranboy">Goranboy</option>
																									 <option value="Göyçay">Göyçay</option>
																									 <option value="Göygöl">Göygöl</option>
																									 <option value="Hacıqabul">Hacıqabul</option>
																									 <option value="Xaçmaz">Xaçmaz</option>
																									 <option value="Xızı">Xızı</option>
																									 <option value="Xocalı">Xocalı</option>
																									 <option value="Xocavənd">Xocavənd</option>
																									 <option value="İmişli">İmişli</option>
																									 <option value="İsmayıllı">İsmayıllı</option>
																									 <option value="Kəlbəcər">Kəlbəcər</option>
																									 <option value="Kəngərli">Kəngərli</option>
																									 <option value="Kürdəmir">Kürdəmir</option>
																									 <option value="Qəbələ">Qəbələ</option>
																									 <option value="Qax">Qax</option>
																									 <option value="Qazax">Qazax</option>
																									 <option value="Qobustan">Qobustan</option>
																									 <option value="Quba">Quba</option>
																									 <option value="Qubadlı">Qubadlı</option>
																									 <option value="Qusar">Qusar</option>
																									 <option value="Laçın">Laçın</option>
																									 <option value="Lənkəran">Lənkəran</option>
																									 <option value="Lerik">Lerik</option>
																									 <option value="Masallı">Masallı</option>
																									 <option value="Neftçala">Neftçala</option>
																									 <option value="Oğuz">Oğuz</option>
																									 <option value="Ordubad">Ordubad</option>
																									 <option value="Saatlı">Saatlı</option>
																									 <option value="Sabirabad">Sabirabad</option>
																									 <option value="Sədərək">Sədərək</option>
																									 <option value="Salyan">Salyan</option>
																									 <option value="Samux">Samux</option>
																									 <option value="Şabran">Şabran</option>
																									 <option value="Şahbuz">Şahbuz</option>
																									 <option value="Şəki">Şəki</option>
																									 <option value="Şamaxı">Şamaxı</option>
																									 <option value="Şəmkir">Şəmkir</option>
																									 <option value="Şərur">Şərur</option>
																									 <option value="Şuşa">Şuşa</option>
																									 <option value="Siyəzən">Siyəzən</option>
																									 <option value="Tərtər">Tərtər</option>
																									 <option value="Tovuz">Tovuz</option>
																									 <option value="Ucar">Ucar</option>
																									 <option value="Yardımlı">Yardımlı</option>
																									 <option value="Yevlax">Yevlax</option>
																									 <option value="Zəngilan">Zəngilan</option>
																									 <option value="Zaqatala">Zaqatala</option>
																									 <option value="Zərdab">Zərdab</option>
																						 </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                                <p>Ulduz(*) ilə işarələnmiş hissələr boş buraxılmamalıdır</p>

                                <input class="btn btn-primary" type="submit" name="submit" value="Düzəlt">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{url('scripts/vendors/jquery.js')}}"></script>

		<script type="text/javascript">
		$(document).ready(function() {

				$('#file').change(function() {
					$('#target').submit();
				});
		});
		</script>
@endsection
