@extends('admin.layout')
@section('content')
  <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          ALFAGEN <small>Admin Panel</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-yelp fa-5x"></i>
                                <h3>{{$desteksayi}}</h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Dəstək sayı
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3>{{count($users)}}</h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                Istifadeciler
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-map-marker fa-5x"></i>
                                <h3>{{$isteksayi}}</h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                İstək sayı
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /. ROW  -->

                <div class="row">

                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                User list
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Name</th>
                                                <th>Email ID.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($users as $user)
                                             <tr>
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
                <!-- /. ROW  -->

            </div>
@endsection
