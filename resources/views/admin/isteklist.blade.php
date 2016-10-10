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
                                  <th>Status</th>
                                  <th>id</th>
                                  <th>user id</th>
                                  <th>city id</th>
                                  <th>title</th>
                                  <th>status</th>
                                  <th>about</th>
                                  <th>location</th>
                                  <th>name</th>
                                  <th>phone</th>
                                  <th>email</th>
                                  <th>image</th>
                                  <th>org</th>
                                  <th>nov</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($istekler as $istek)
                              @if($istek->type_id=='2')
                              <tr>
                                  @if($istek->status=='0')
                                    <td><a href="{{url('/activate/'.$istek->id)}}">Aktiləşdir</a></td>

                                  @else($istek->status=='1')
                                    <td><a href="{{url('/deactivate/'.$istek->id)}}">Deaktivləşdir</a></td>
                                  @endif
                                  <td>{{$istek->id}}</td>
                                  <td>{{$istek->user_id}}</td>
                                  <td>{{$istek->city_id}}</td>
                                  <td>{{$istek->title}}</td>
                                  <td>{{$istek->status}}</td>
                                  <td>{{substr($istek->about, 0,10)}}</td>
                                  <td>{{substr($istek->location, 0,10)}}</td>
                                  <td>{{$istek->name}}</td>
                                  <td>{{$istek->phone}}</td>
                                  <td>{{$istek->email}}</td>
                                  <td>{{$istek->image}}</td>
                                  <td>{{$istek->org}}</td>
                                  <td>{{$istek->nov}}</td>
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
