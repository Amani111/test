<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test IDP | @yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="@yield('meta_author')">
    @yield('meta')
     <!-- Favicon -->
  <link href="{{asset('dashbord/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('dashbord/assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('dashbord/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('dashbord/assets/css/argon-dashboard.css?v=1.1.2')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('dashbord/assets/vendor/sweetalert2.min.css')}}">
    @stack('styles')
</head>
<body class="">
    @include('includes.sidebar')
    <div class="main-content">
      <!-- Navbar -->
      @include('includes.navbar')
      <!-- End Navbar -->
      <!-- Header -->
      @include('includes.header')
      <div class="container-fluid mt--7">
           @yield('content')
           <!-- Footer -->
        <footer class="footer" style="background: #f7fafc; padding-top:400Px !important;">
          <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
              <div class="copyright text-center text-xl-left text-muted">
                &copy; 2020 <a href="" class="font-weight-bold ml-1" target="_blank">Sebri Amani</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core   -->
    <script src="{{asset('dashbord/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dashbord/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--   Optional JS   -->
    <script src="{{asset('dashbord/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('dashbord/assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
    <!--   Argon JS   -->
    <script src="{{asset('dashbord/assets/js/argon-dashboard.min.js')}}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
      window.TrackJS &&
        TrackJS.install({
          token: "ee6fab19c5a04ac1a32a645abde4613a",
          application: "argon-dashboard-free"
        });
    </script>
     @stack('scripts')
  </body>
  
  </html>