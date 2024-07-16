<!DOCTYPE html>

<html lang="en">

<head>
    {{-- <base href="./"> --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sooprs ">
    <meta name="author" content="">
    <meta name="keyword" content="sooprs,admin-panel,sooprs admin">
    <title>Sooprs Admin </title>
    {{-- <link rel="apple-touch-icon" sizes="57x57"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ url('') }}/admin-assets/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ url('') }}/admin-assets/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ url('') }}/admin-assets/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ url('') }}/admin-assets/assets/favicon/favicon-96x96.png"> --}}
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ url('') }}/admin-assets/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ url('') }}/admin-assets/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ url('') }}/admin-assets/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="{{ url('') }}/admin-assets/css/vendors/simplebar.css">

    {{-- Data Tables css links  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    {{-- fonmt awesome  --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous"> --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    {{-- Bootstrap 5 link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

    

	
    <!-- Main styles for this application-->
    <link href="{{ url('') }}/admin-assets/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ url('') }}/admin-assets/css/examples.css" rel="stylesheet">


    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <link href="{{ url('') }}/admin-assets/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
    <style>
        
        #example_wrapper {
            overflow-x: auto;
        }

        .sidebar-nav .nav-link.active {
            color: rgb(255 255 255)!important;
            background: rgb(0 105 255)!important;
        }

        @media (hover: hover), (-ms-high-contrast: none){
            .sidebar-nav .nav-link:hover {
                color: var(--cui-sidebar-nav-link-hover-color);
                text-decoration: none;
                background: rgb(0 105 255);
            }
        }
    </style>
    @stack('style')
</head>

<body>
    {{-- Sidebar here  --}}
    @include('admin.layout.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 ">

        {{-- Header here  --}}
        @include('admin.layout.header')

        @yield('content')

        {{-- Footer here  --}}
        @include('admin.layout.footer')

    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ url('') }}/admin-assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="{{ url('') }}/admin-assets/vendors/simplebar/js/simplebar.min.js"></script>

    {{-- Bootstrap 5 js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Plugins and scripts required by this view-->
    {{-- <script src="{{ url('') }}/admin-assets/vendors/chart.js/js/chart.min.js"></script> --}}
    {{-- <script src="{{ url('') }}/admin-assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script> --}}
    {{-- <script src="{{ url('') }}/admin-assets/vendors/@coreui/utils/js/coreui-utils.js"></script> --}}
    <script src="{{ url('') }}/admin-assets/js/main.js"></script>
    
    <script src="{{ url('') }}/admin-assets/TinyMCE/tinymce/js/tinymce/tinymce.min.js"></script>

    <script src="https://kit.fontawesome.com/5f579897f0.js" crossorigin="anonymous"></script>

	
    {{-- Data tables js script  --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    @stack('script')

</body>

</html>
