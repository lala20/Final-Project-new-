@extends('pages/layout')

@section('content')


    <section id="profilim">
        <div class="container">
        <div id="qatqi">
            <div class="row">
                <form>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                      @if(Auth::user()->avatar)
                        <img class="img-responsive" src="{{url('image/'.Auth::user()->avatar)}}">
                     @else
                       <img class="img-responsive" src="{{url('image/prof.png')}}">
                     @endif
                        <label for="file"><i class="fa fa-arrow-circle-o-up"></i> yüklə</label>
                        <input type="file" name="image" id="file" class="hidden">
                        <ul class="list-unstyled">
                            <li><a href="{{url('/profil')}}"><i class="fa fa-user" aria-hidden="true"></i><b> İstifadəçinin məlumatları</b></a></li>
                            <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Şifrə dəyişdir</a></li>
                            <li><a href="{{url('/isteklerim')}}"><i class="fa fa-thumb-tack" aria-hidden="true"></i> İstək qeydlərim</a></li>
                            <li><a href="{{url('/desteklerim')}}"><i class="fa fa-tags" aria-hidden="true"></i> Dəstəklərim</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-9  col-xs-12">
                      @if (Session::has('destekadded'))
      		              <div class="alert alert-success" role="alert">{{Session::get('destekadded')}}</div>
      								@endif
                        <div class="profilime panel panel-primary">
                            <div class="panel-heading">
                                <h4><i class="fa fa-tags" aria-hidden="true"></i> Dəstəklərim</h4>
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
                                        @foreach($destekler as $destek)
                                           @if($destek->user_id == Auth::user()->id && $destek->type_id == '1')
                                                           @php
                                                              $derc_status = ' Dərc olunmayıb';
                                                              $derc_reng = 'alert-danger';
                                                              if ($destek->status==1) {
                                                                 $derc_status = " Dərc olunub";
                                                                 $derc_reng = 'alert-success';
                                                              }
                                                           @endphp
                                            <tr>
                                                              <td class="{{$derc_reng}}">{{$derc_status}}</td>
                                               <td class="{{$derc_reng}}">{{$destek->title}} </td>
                                                              <td class="{{$derc_reng}}">{{substr($destek->about,0,70)}}...</td>
                                               <td class="{{$derc_reng}}"><img class="img-responsive" src="{{url('image/'.$destek->image)}}"></td>
                                               <td class="{{$derc_reng}}">
                                                                 <a class="btn btn-danger" href="" data-toggle="modal" data-target="#sil">Sil</a>
                                                                 <a class="btn btn-info" href="" data-toggle="modal" data-target="#{{$destek->id}}">Oxu</a>
                                                                 <a class="btn btn-warning" href="{{url('/destekedit/'.$destek->id)}}">Dəyişdir</a>
                                                              </td>
                                            </tr>
                                            {{-- Sil buttonu ucun modal --}}
                                               <div id="sil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog modal-sm">
                                                   <div class="modal-content">
                                                     <div class="modal-header">
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                       </button>
                                                       <h4 class="modal-title text-center" id="myModalLabel">Əminsinizmi?</h4>
                                                     </div>
                                                     <div class="modal-body text-center">
                                                        <button class="btn btn-primary" type="button" class="close" data-dismiss="modal" aria-label="Close">Xeyir
                                                       </button>
                                                       <a class="btn btn-danger" href="{{url('/isteksil/'.$destek->id)}}">Bəli</a>
                                                     </div>
                                                   </div>
                                                 </div>
                                               </div>
                                            {{-- End of modal --}}
                                            {{-- Oxu buttonu ucun modal --}}
                                               <div id="{{$destek->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog modal-lg">
                                                   <div class="modal-content">
                                                     <div class="modal-header">
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                       </button>
                                                       <h4 class="modal-title" id="myModalLabel">{{$destek->title}}</h4>
                                                     </div>
                                                     <div class="modal-body">
                                                       {{$destek->about}}
                                                     </div>
                                                     <div class="modal-footer">
                                                       <img style="width:100%; height:100%;" src="{{url('image/'.$destek->image)}}">
                                                     </div>
                                                   </div>
                                                 </div>
                                               </div>
                                               {{-- End of modal --}}
                                            @else
                                            {{-- <tr>
                                                    <td>Hələki qeyd yoxdur</td>
                                            </tr> --}}
                                         @endif
                                        @endforeach
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
