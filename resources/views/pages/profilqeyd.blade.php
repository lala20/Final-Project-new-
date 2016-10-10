@extends('pages/layout')

@section('content')

	<section id="profilim">
	    <div class="container">
	    <div id="qeyd">

	        <div class="row">

	        <form>
	            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
								@if(Auth::user()->avatar)
									<img class="img-responsive" src="{{url('image/'.Auth::user()->avatar)}}">
							 @else
								 <img class="img-responsive" src="{{url('image/prof.png')}}">
							 @endif
	                <label for="upload"><i class="fa fa-arrow-circle-o-up"></i> Yüklə</label>
	                <input type="file" name="sekil" id="upload" class="hidden">

	               <ul class="list-unstyled">
	                   <li><a href="{{url('/profil')}}"><i class="fa fa-user" aria-hidden="true"></i><b> İstifadəçinin məlumatları</b></a></li>
	                   <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Şifrə dəyişdir</a></li>
	                   <li><a href="{{url('/isteklerim')}}"><i class="fa fa-thumb-tack" aria-hidden="true"></i> İstək qeydlərim</a></li>
	                   <li><a href="{{url('/desteklerim')}}"><i class="fa fa-tags" aria-hidden="true"></i> Dəstəklərim</a></li>
	               </ul>
	            </div>
	            <div class="col-lg-8 col-md-8 col-sm-9  col-xs-12">
								@if (Session::has('istekadded'))
		              <div class="alert alert-success" role="alert">{{Session::get('istekadded')}}</div>
								@endif
	                <div class="profilime panel panel-primary">
	                    <div class="panel-heading">
	                        <h4><i class="fa fa-thumb-tack" aria-hidden="true"></i> Ehtiyaclarim</h4>
	                    </div>
	                    <div class="panel-body">
	                        <table class="table table-bordered">
	                            <tbody>
	                            	<tr>
	                            		<th>Başlıq</th>
	                            		<th>Haqqında</th>
																	<th>Şəkil</th>
																	<th>Tənzimləmə</th>
	                            	</tr>
	                            	@foreach($istekler as $istek)
	                            		@if($istek->status == '1' && $istek->user_id == Auth::user()->id && $istek->type_id == '2')
	                            			<tr>
	                            				<td>{{$istek->title}}</td>
																			<td>{{substr($istek->about,0,100)}}...</td>
	                            				<td><img class="img-responsive" src="{{url('image/'.$istek->image)}}"></td>
	                            				<td><a class="btn btn-danger" href="{{url('/isteksil/'.$istek->id)}}">Sil</a>
																<a class="btn btn-info" href="{{url('/single/'.$istek->id)}}">Oxu</a></td>
	                            			</tr>
	                            			@else
	                            			{{-- <tr>
	                                  			  <td>Hələki qeyd yoxdur</td>
	                                		</tr> --}}
	                            		@endif
	                            	@endforeach
	                                <tr>
	                                    {{-- <td>Hələki qeyd yoxdur</td> --}}
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	            </form>
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
