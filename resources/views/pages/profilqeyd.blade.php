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
	                        <h4><i class="fa fa-thumb-tack" aria-hidden="true"></i> Ehtiyaclarım</h4>
	                    </div>
	                    <div class="panel-body">
	                        <table class="table table-bordered">
	                            <tbody>
	                            	<tr>
																	<th>Status</th>
	                            		<th>Başlıq</th>
	                            		<th>Haqqında</th>
																	<th>Şəkil</th>
																	<th style="width:151px;">Tənzimləmə</th>
	                            	</tr>
	                            	@foreach($istekler as $istek)
	                            		@if($istek->user_id == Auth::user()->id && $istek->type_id == '2')
																		@php
																			$derc_status = ' Dərc olunmayıb';
																			$derc_reng = 'alert-danger';
																			if ($istek->status==1) {
																				$derc_status = " Dərc olunub";
																				$derc_reng = 'alert-success';
																			}
																		@endphp
	                            			<tr>
																			<td class="{{$derc_reng}}">{{$derc_status}}</td>
	                            				<td class="{{$derc_reng}}">{{$istek->title}} </td>
																			<td class="{{$derc_reng}}">{{substr($istek->about,0,70)}}...</td>
	                            				<td class="{{$derc_reng}}"><img class="img-responsive" src="{{url('image/'.$istek->image)}}"></td>
	                            				<td class="{{$derc_reng}}">
																				<a class="btn btn-danger" href="{{url('/isteksil/'.$istek->id)}}">Sil</a>
																				<a class="btn btn-info" href="{{url('/single/'.$istek->id)}}">Oxu</a>
																				<a class="btn btn-warning" href="{{url('/istekedit/'.$istek->id)}}">Dəyişdir</a>
																			</td>
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
