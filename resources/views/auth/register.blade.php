@extends('pages.layout')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Qeydiyyat</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Adınız Soyadınız</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{$errors->has('username') ? ' has-error ' : ''}}">
                          <label for="username" class="col-md-4 control-label">İstifadəçi adı</label>
                          <div class="col-md-6">
                              <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                              <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Telefon Nömrəsi</label>
                            <div class="col-md-6">

                              <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                              @if ($errors->has('phone'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Şəhər/Rayon</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="hidden" name="city">
                                <select id="seherler" class="form-control"  name="city">
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
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Şifrəniz</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Təkrar Şifrəniz</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
