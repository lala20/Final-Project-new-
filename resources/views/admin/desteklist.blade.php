@extends('admin.layout')
@section('content')
    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="panel panel-default">
              <div class="panel-heading">
                  Responsive Table Example
              </div>
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>id</th>
                                  <th>type Id</th>
                                  <th>user id</th>
                                  <th>city id</th>
                                  <th>title</th>
                                  <th>status</th>
                                  <th>about</th>
                                  <th>location</th>
                                  <th>lat</th>
                                  <th>lng</th>
                                  <th>name</th>
                                  <th>phone</th>
                                  <th>email</th>
                                  <th>image</th>
                                  <th>org</th>
                                  <th>nov</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($destekler as $destek)
                              @if($destek->type_id=='1')
                              <tr>
                                  <td>{{$destek->id}}</td>
                                  <td>{{$destek->type_id}}</td>
                                  <td>{{$destek->user_id}}</td>
                                  <td>{{$destek->city_id}}</td>
                                  <td>{{$destek->title}}</td>
                                  <td>{{$destek->status}}</td>
                                  <td>{{$destek->about}}</td>
                                  <td>{{$destek->location}}</td>
                                  <td>{{$destek->lat}}</td>
                                  <td>{{$destek->lng}}</td>
                                  <td>{{$destek->name}}</td>
                                  <td>{{$destek->phone}}</td>
                                  <td>{{$destek->email}}</td>
                                  <td>{{$destek->image}}</td>
                                  <td>{{$destek->org}}</td>
                                  <td>{{$destek->nov}}</td>
                            @if($destek->status=='0')
                              <td><a href="{{url('/activate/'.$destek->id)}}">Aktiləşdir</a></td>
                            @else($destek->status=='1')
                              <td><a href="{{url('/deactivate/'.$destek->id)}}">Deaktivləşdir</a></td>
                            @endif
                            </tr>

                            @endif
                            @endforeach

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>

      </div>
  </div>
@endsection
