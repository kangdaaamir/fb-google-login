
<!DOCTYPE html>
<html>
<head>
    @include('partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('partials.header')

  <!-- =============================================== -->

    @include('partials.sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->

    @include('partials.footer')
</div>
<!-- ./wrapper -->

    @include('partials.scripts')
</body>
</html>
