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
                                            <th>Başlıq</th>
                                            <th>Haqqında</th>
                                            <th>Şəkil</th>
                                            <th>Bax & Sil</th>
                                        </tr>
                                        @foreach($destekler as $destek)
                                            @if($destek->status == '1' && $destek->user_id = Auth::user()->id && $destek->type_id == '1')
                                                <tr>
                                                    <td>{{$destek->title}}</td>
                                                    <td>{{substr($destek->about,0,80)}}</td>
                                                    <td><img src="{{url("image/$destek->image")}}"</>
                                                    <td>
                                                      <a class="btn btn-primary" href="{{url('/single/'.$destek->id)}}">Bax</a>
                                                      <a class="btn btn-danger" href="{{url('/desteksil/'.$destek->id)}}">Sil</a
                                                    </td>
                                                </tr>
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
