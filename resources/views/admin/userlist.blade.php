@extends('admin.layout')
@section('content')
   <div id="page-inner">
              <div class="row">
                  <div class="col-md-12">
                      <h1 class="page-header">
                        User List <small>Responsive tables</small>
                      </h1>
                  </div>
              </div>
              <!-- /. ROW  -->


                      <!-- Advanced Tables -->
                      <div class="row">

                          <div class="col-md-8 col-sm-12 col-xs-12">

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
                                                      <th>city Id</th>
                                                      <th>First Name</th>
                                                      <th>Last Name</th>
                                                      <th>User Name</th>
                                                      <th>Email ID.</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($users as $user)
                                                  <tr>
                                                      <td>{{$user->id}}</td>
                                                      <td>{{$user->city_id}}</td>
                                                      <td>{{$user->username}}</td>
                                                      <td>{{$user->phone}}</td>
                                                      <td>{{$user->name}}</td>
                                                      <td>{{$user->email}}</td>
                                                  </tr>
                                                @endforeach

                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                      <!--End Advanced Tables -->


          </div>

@endsection
