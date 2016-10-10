<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link href="{{url('/css/app.css')}}" rel="stylesheet" />
    <link href="{{url('/css/custom-styles.css')}}" rel="stylesheet"/>
</head>

<body>
  <div class="container-fluid">

    <!-- BLADE SEHIFESINDE QOYULMALI -->
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/alfagen')}}">Admin Panel</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              <a class="btn btn-success" href="{{url('/')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Sayta qayıt</a>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('/profil')}}"><i class="fa fa-user fa-fw"></i> Profilim</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{url('alfagen/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Çıxış</a>
                        </li>
                    </ul>
            </ul>
        </nav>

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="{{url('lists')}}"><i class="fa fa-dashboard"></i> Umumi list</a>
                    </li>


                    <li>
                        {{-- <a href="tab-panel.html"><i class="fa fa-qrcode"></i>Elanlar<span class="fa arrow"></span></a> --}}
                        {{-- <ul class="nav nav-second-level"> --}}
                            <li>
                                <a href="{{url('desteklist')}}"><i class="fa fa-qrcode"></i>Destek Siyahisi</a>
                            </li>
                            <li>
                                <a href="{{url('isteklist')}}"><i class="fa fa-qrcode"></i>Istek Siyahisi</a>
                            </li>

                        {{-- </ul> --}}
                    </li>

                    <li>
                        <a href="{{url('userlist')}}"><i class="fa fa-table"></i> User List</a>
                    </li>

                </ul>

            </div>

        </nav>
        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>
</div>
    <script src="{{url('/scripts/vendors/jquery.js')}}"></script>
    <script src="{{url('/scripts/vendors/bootstrap.min.js')}}"></script>
    <script src="{{url('/scripts/jquery.metisMenu.js')}}"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
  $(document).ready(function() {
      $('#dataTables-example').dataTable();
  });
</script>
</body>
</html>
