<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$titlePage}}</title>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
        @include('admin/partials/header')
      <!-- /.navbar -->
    
        @include('admin/partials/sidebar')
    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
            <div class="container-fluid">
                <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{$titlePage}}</h3>
                    <!-- /.card -->
                    </div>
                    @yield('content')
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin/partials/footer')
    </div>
 <!-- jQuery -->
    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <!-- AdminLTE App -->
    <script src="/template/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->   
    <script src="{{asset('admin/js/script.js')}}"></script>
</body>
</html>

