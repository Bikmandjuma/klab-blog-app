<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Blog app') }}</title>
  <link rel="flag icon" href="/style/dist/img/flag.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!--w3 style-->
  <link rel="stylesheet" href="/style/dist/w3/w3.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/style/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/style/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/style/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/style/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/style/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/style/plugins/summernote/summernote-bs4.min.css">

"  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('.ckeditor').ckeditor();
        });
    </script>
  <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light" style="margin-top:-25px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <div class="rowtext-center">
      <div class="col-md-12" style="margin-left:350px;">{{Auth::user()->name}}'s Panel</div>
    </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search text-white"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar w3-white" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <!-- <a class="nav-link" data-toggle="dropdown" href="#" style="margin-top:-5px;">
         <img src="{{URL::to('/')}}/images/user/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image" style="width:40px;height:40px;border-radius:50%;">
        </a> -->
        <div data-toggle="dropdown" style="margin-top:5px;cursor:pointer;">{{Auth::user()->name}}</div>

        <div class="dropdown-menu dropdown-menu-right bg-info" style="margin-top:5px;margin-right:-40px;border:2px solid white">
           <a href="{{url('account')}}" class="dropdown-item w3-hover-text-black w3-hover-text-black">
            <i class="fas fa-user mr-2"></i>
            Account
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{url('user')}}/{{Auth::user()->id}}" class="dropdown-item w3-hover-text-black w3-hover-text-black">
            <i class="fas fa-image mr-2"></i>
           Profile picture
          </a>

          <div class="dropdown-divider"></div>
          <div class="dropdown-item w3-hover-text-black">
                <a class="dropdown-item text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i>&nbsp;
                        {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
                </form>
          </div>
        </div>

      </li>
      <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link text-center">
      <span class="brand-text text-white" style="color:white;font-size:25px;"><b>KLab blog app</b></span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{URL::to('/')}}/images/user/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image" style="width:40px;height:40px;border-radius:50%;">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!--Citizen compains-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Activity
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
      
            <li class="nav-item">
                <a href="{{url('myblog')}}" class="nav-link" data-toggle="modal" data-target="#myModal">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new blog</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('myblog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My blogs</p>
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="{{url('home')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
          <!--end of citizen complains-->

           <!--system users managemet -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Account
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('account')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My account</p>
                </a>
              </li>
            </ul>
          </li> -->

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <br>
    <div class="row">
       <div class="col-md-12 text-center">

            @if(session('delete'))
            <div class="alert alert-danger alert-dismissable fade show" style="width:300px;margin-left:350px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{session('delete')}}</strong>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success alert-dismissable fade show" style="width:300px;margin-left:350px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{session('success')}}</strong>
            </div>
            @endif  
          

              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  
                      <!-- Modal Header -->
                      <div class="modal-header text-white bg-success">
                      <h4 class="modal-title">Add blog data</h4>
                      <button type="button" class="close bg-default" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                      <!--  -->
                        <form class="form-group" action="{{route('adddata')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <label>Title</label>
                          <input class="form-control" name="title" style="border:1px solid green;" placeholder="Enter title name">
                          <span style="color:red;">@error('title') {{ $message }} @enderror</span><br>
                          <label>Content</label>
                          <textarea rows="3" style="border:1px solid green;"  placeholder="Enter content" class="ckeditor form-control" id="content" name="content"> 
                          </textarea>
                          <span style="color:red;">@error('content') {{ $message }} @enderror</span><br>
                          <label>Image</label>
                          <input type="file" class="form-control" name="image">
                          <span style="color:red;">@error('image') {{ $message }} @enderror</span><br>
                          <button type="submit" class="btn btn-primary">Post blog</button>
                        </form>
                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
  
                  </div>
                  </div>
              </div>
          @yield('content')
       </div>
    </div>
          
    <!-- /.content -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/style/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/style/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/style/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/style/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/style/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/style/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/style/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/style/plugins/moment/moment.min.js"></script>
<script src="/style/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/style/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE../ App -->
<script src="/style/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes >
<script src="../dist/js/demo.js"></script-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/style/dist/js/pages/dashboard.js"></script>
</body>
</html>
