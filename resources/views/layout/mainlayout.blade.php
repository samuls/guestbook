<!DOCTYPE html>
<html>

<head>
  @include('layout.partials.head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layout.partials.nav')
    @include('layout.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('layout.partials.footer')
  </div>
  <!-- ./wrapper -->
  @include('layout.partials.script')
</body>

</html>