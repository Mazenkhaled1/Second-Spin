<!DOCTYPE html>
<html lang="en">
   @include("Admin.inc.header")
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('Admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
   @include("Admin.inc.nav")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   @include("Admin.inc.sidebar")

  <!-- Content Wrapper. Contains page content -->
   @yield('content')


  <!-- /.content-wrapper -->

   @include("Admin.inc.footer")
<!-- jQuery -->
   @include("Admin.inc.scripts")
</body>
</html>
