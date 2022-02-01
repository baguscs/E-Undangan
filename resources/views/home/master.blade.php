<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>MailTo | Home Page</title>

  <!-- Favicons -->
  <link href="{{ asset('css/images/mail.png') }}" rel="icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/home/zabuto_calendar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/gritter/css/jquery.gritter.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/home/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/home/style-responsive.css') }}" rel="stylesheet">
  <script src="{{ asset('lib/chart-master/Chart.js') }}"></script>
</head>
<style>
    .sum{
        color: white;
        font-size: 20px
    }
    .fn-big{
      font-size: 3.5rem;
    }
</style>
@stack('css')
<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>Mail<span>TO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript::void(0);" title="Profil">
                  <i class="fa fa-cogs"></i>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                      <p class="green">Sesuaikan Profilmu</p>
                    </li>
                    <li>
                      <a href="{{ route('myprofile') }}">
                        <div class="task-info">
                          <div class="desc"><i class="fa fa-picture-o"></i> Profil Utama</div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('password') }}">
                        <div class="task-info">
                          <div class="desc"><i class="fa fa-unlock-alt"></i> Ganti Password</div>
                        </div>
                      </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ route('logout') }}" onclick="return confirm('Apakah anda yakin ingin logout?')"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered fn-big">{{Auth::user()->admin->role->role}}</p>
          <h5 class="centered">{{Auth::user()->admin->nama}}</h5>
            <li class="mt">
                <a href="{{ route('dashboard') }}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Administrator</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('add_admin') }}"><i class="fa fa-plus-square"></i>Tambah Data</a></li>
                    <li><a href="{{ route('admin') }}"><i class="fa fa-folder"></i>Lihat Data</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span>Customer</span>
                </a>
                <ul class="sub">
                    <li><a href="grids.html"><i class="fa fa-plus-square"></i>Tambah Data</a></li>
                    <li><a href="{{ route('customer') }}"><i class="fa fa-folder"></i>Lihat Data</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-envelope"></i>
                    <span>Pesanan</span>
                </a>
                <ul class="sub">
                    <li><a href="blank.html"><i class="fa fa-plus-square"></i>Tambah Pesanan</a></li>
                    <li><a href="login.html"><i class="fa fa-folder"></i>Lihat Pesanan</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        @yield('konten')
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>BCS</strong>. All Rights Reserved
        </p>
        <div class="credits">
          MailTo Version 1.0.0
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>

  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" language="javascript" src="{{ asset('lib/advanced-datatable/js/jquery.js') }}"></script>
  <script type="text/javascript" language="javascript" src="{{ asset('lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/advanced-datatable/js/DT_bootstrap.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset('lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ asset('lib/jquery.sparkline.js') }}"></script>
  <!--common script for all pages-->
  <script src="{{ asset('lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/gritter-conf.js') }}"></script>
  <!--script for this page-->
  <script src="{{ asset('lib/sparkline-chart.js') }}"></script>
  <script src="{{ asset('lib/zabuto_calendar.js') }}"></script>
  @stack('js')
</body>

</html>
