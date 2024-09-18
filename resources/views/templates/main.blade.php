<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Titlee</title>


    <!-- Favicons -->
    <link href="{{ url('/niceadmin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('/niceadmin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('/niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('/niceadmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('/niceadmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('/niceadmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('/niceadmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('/niceadmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <link href="{{ url('/niceadmin/assets/css/style.css') }}" rel="stylesheet">

    @stack('addon-css')
</head>

<body>
    <!-- Header -->
    @include('templates.components.header')

    <!-- Sidebar -->
    @include('templates.components.sidebar')

    <!-- Main Container -->
    <main id="main" class="main">
        @include('templates.components.title')

        <!-- Main Content -->
        <div>
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    @include('templates.components.footer')

    <!-- REQUIRED SCRIPTS -->
    <script src="{{url('/assets/js/script.js')}}"></script>
    <!-- jQuery -->
    <script src="{{url('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- SweetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vendor JS Files -->
    <script src="{{ url('/niceadmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('/niceadmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url('/niceadmin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('/niceadmin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ url('/niceadmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('/niceadmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('/niceadmin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('/niceadmin/assets/js/main.js') }}"></script>

    @stack('addon-js')
    @if (session()->has('success'))
    <script>
        Swal.fire({
            title: "Success",
            text: "{{session()->get('success')}}",
            icon: "success"
        });
    </script>
    @endif

    @if (session()->has('error'))
    <script>
        Swal.fire({
            title: "Error",
            text: "{{session()->get('error')}}",
            icon: "error"
        });
    </script>
    @endif

    @stack('addon-js')

</body>

</html>