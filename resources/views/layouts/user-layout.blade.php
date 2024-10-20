<!DOCTYPE html>
<html lang="en">
  <head>
    <!--  Title -->
    <title>Dashboard</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('assets/modernize/dist/libs/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/modernize/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
    
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('node_modules/toastr/build/toastr.min.css') }}">

    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="{{ asset('assets/modernize/css/style.min.css')}}" />

    <!-- Jquer cdn : For remove and New image upload section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
      <!-- Preloader -->
      <div class="preloader">
        <img src="{{ asset('assets/modernize/images/logos/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
      </div>
      <!-- Preloader -->
      <div class="preloader">
        <img src="{{ asset('assets/modernize/images/logos/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
      </div>
      <!--  Body Wrapper -->
      <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme"  data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <x-user-component />
        <main>
            @yield('content')
        </main>
      </div>


    <!--  Customizer -->
    <!--  Import Js Files -->
    <script src="{{ asset('assets/modernize/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/modernize/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/modernize/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--  core files -->
    <script src="{{ asset('assets/modernize/js/app.min.js')}}"></script>
    <script src="{{ asset('assets/modernize/js/app.init.js')}}"></script>
    <script src="{{ asset('assets/modernize/js/app-style-switcher.js')}}"></script>
    <script src="{{ asset('assets/modernize/js/sidebarmenu.js')}}"></script>
    <script src="{{ asset('assets/modernize/js/custom.js')}}"></script>
    <!--  current page js files -->
    <script src="{{ asset('assets/modernize/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/modernize/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/modernize/js/dashboard.js')}}"></script>

    <!--  For data tables -->
    <script src="{{ asset('assets/modernize/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/modernize/js/datatable/datatable-basic.init.js')}}"></script>
    <!-- Toastr JS -->
    <script src="{{ asset('node_modules/toastr/build/toastr.min.js') }}"></script>
  </body>
</html>