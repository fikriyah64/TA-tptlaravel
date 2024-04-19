<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>TPT</title>

  <link rel="stylesheet" href="{{asset('lte/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Font Awesome CSS -->
<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-wq6EF/RFY+xdwGJQr+7Dai+jvKDBKF81X0eKJ4A9vN6Om5xyIS+KGzRb+F+JHEAFpRMvwaQx2Q+KVFus+EuKJg==" crossorigin="anonymous" /')}}>

  <link rel="stylesheet" href="{{asset('lte/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/dropzone/min/dropzone.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  
<div class="wrapper">

  <!-- NAVBAR -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- TUTUP NAVBAR -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="/lte/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- SIDEBAR -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/lte/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('dashboard')}}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SIDEBAR MENU -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">GENERAL</li>
            <!--DASHBOARD-->
            <li class="nav-item">
              <a href="{{route('dashboard')}}" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <!--INPUT DATA-->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>Input Data<i class="right fas fa-angle-left"></i></p>
              </a>

              <ul class="nav nav-treeview">
                <!--INPUT USER-->
                <li class="nav-item">
                  <a href="{{route('user.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data User</p>
                  </a>
                </li>

                <!--INPUT PENDUDUK-->
                <li class="nav-item">
                  <a href="{{route('penduduk.create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Penduduk</p>
                  </a>
                </li>
              </ul>
            </li> 
            <!--TUTUP INPUT DATA-->

            <!--LIHAT DATA-->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-desktop"></i>
                <p>Lihat Data <i class="right fas fa-angle-left"></i></p>
              </a>

              <ul class="nav nav-treeview">
                <!--LIHAT DATA USER-->
                <li class="nav-item">
                  <a href="{{route('input_user')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data user</p>
                  </a>
                </li>

                <!--LIHAT DATA PENDDUDUK/HASIL KLASIFIKASINYA-->
                <li class="nav-item">
                  <a href="/klasifikasi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Hasil Klasifikasi</p>
                  </a>
                </li>
              </ul>
            </li>
            <!--TUTUP LIHAT DATA-->

          <li class="nav-header">LOGOUT</li>
            <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- TUTUP SIDEBAR MENU -->
    </div>
    <!-- TUTUP SIDEBAR -->
  </aside>

  @yield('content')

    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a>Fik</a>.</strong>All rights reserved
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<!-- TUTUP WRAPPER-->

<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lte/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lte/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('lte/lugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{asset('lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('lte/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('lte//plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('lte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('lte/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('lte/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('lte/dist/js/adminlte.js')}}"></script>
<script src="{{asset('lte/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('lte/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('lte/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('lte//plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lte//plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('lte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>
<script>
  $(function() {
      var url = window.location;
      // for single sidebar menu
      $('ul.nav-sidebar a').filter(function() {
          return this.href == url;
      }).addClass('active');

      // for sidebar menu and treeview
      $('ul.nav-treeview a').filter(function() {
              return this.href == url;
          }).parentsUntil(".nav-sidebar > .nav-treeview")
          .css({
              'display': 'block'
          })
          .addClass('menu-open').prev('a')
          .addClass('active');
  });
</script>
<script>
  $(function () {
    $("#example1").DataTable({
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@yield('scripts')
</body>
</html>
