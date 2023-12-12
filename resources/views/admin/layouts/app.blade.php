@php
use Illuminate\Support\Facades\Form;
@endphp
@if (app()->getLocale() == 'en')
{{--    {{dd(app()->getLocale())}}--}}
    <!doctype html>
    <html lang="en">

    <head>
        <base href="/public">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--favicon-->
        <link rel="icon" href="{{ asset('assets/images/profile.jpg') }}" type="image/png" />
        <!--plugins-->

        <link href="assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet" />
        <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
        <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
        <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
        <link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
        <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
        <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <!-- loader-->
        <link href="assets/css/pace.min.css" rel="stylesheet" />
        <script src="assets/js/pace.min.js"></script>
        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="assets/css/app.css" rel="stylesheet">
        <link href="assets/css/icons.css" rel="stylesheet">
        <!-- Theme Style CSS -->
        <link rel="stylesheet" href="assets/css/dark-theme.css" />
        <link rel="stylesheet" href="assets/css/semi-dark.css" />
        <link rel="stylesheet" href="assets/css/header-colors.css" />
        <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    @else
{{--            {{dd(app()->getLocale())}}--}}

            <!doctype html>
        <html lang="ar" dir="rtl">

        <head>
            <base href="/public">
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!--favicon-->
            <link rel="icon" href="{{ asset('assets/images/profile.jpg') }}" type="image/png" />
            <!--plugins-->

            <link href="rtl/assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet" />
            <link href="rtl/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
            <link href="rtl/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
            <link href="rtl/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
            <link href="rtl/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
            <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
            <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
            <link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
            <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
            <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
            <!-- loader-->
            <link href="rtl/assets/css/pace.min.css" rel="stylesheet" />
            <script src="rtl/assets/js/pace.min.js"></script>
            <!-- Bootstrap CSS -->
            <link href="rtl/assets/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
            <link href="rtl/assets/css/app.css" rel="stylesheet">
            <link href="rtl/assets/css/icons.css" rel="stylesheet">
            <!-- Theme Style CSS -->
            <link rel="stylesheet" href="rtl/assets/css/dark-theme.css" />
            <link rel="stylesheet" href="rtl/assets/css/semi-dark.css" />
            <link rel="stylesheet" href="rtl/assets/css/header-colors.css" />
            <link rel="stylesheet"href="{{ asset('assets/css/all.min.css') }}" />
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">

@endif
<title>@yield('subtitle')</title>

<style>
    #previewImage1,
    #previewImage2 {
        display: block;
        max-width: 200px;
        min-height: 150px;
        max-height: 200px;
        margin: 0 auto;
        padding-top: 10px;
    }
</style>

</head>


<body class="d-flex justify-content-center">
    <!--wrapper-->
    <div class="spinner-border text-primary preloader" style="margin-top: 50vh" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <div class="wrapper d-none">
        @include('include.sidebar')

        @include('include.header')

        @yield('content')
        {{-- </div> --}}
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2021. All right reserved.</p>
    </footer>
    </div>
    <!--end wrapper-->


    @include('include.switcher')
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

	<!--plugins-->

    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<script src="assets/plugins/select2/js/select2.min.js"></script>
    <!--notification js -->
    <script src="assets/plugins/notifications/js/lobibox.min.js"></script>
    <script src="assets/plugins/notifications/js/notifications.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!--app JS-->
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>


    @yield('scripts')



    {{-- ///////////////////////////////////  delete button //////////////////////////////////// --}}
    <script>
        $(document).on("submit", "form .delete", function (e) {
            event.preventDefault();

        });


        function confirmDelete(event,$id) {
          event.preventDefault(); // Cancel the default link behavior
          form = event.target.closest('form');

          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                // document.getElementById('myform').submit();

            }
          });

        }

      </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "bPaginate": false,
                dom: 'frtip'
            });
        });

        $(window).on('load', function(){
            $('.preloader').fadeOut('slow');
            // $('.wrapper').fadeIn('slow');
            $('.wrapper').removeClass('d-none');
        });
    </script>



    {{-- my script in livePreview --}}
    {{-- <script>
            function previewImage(event, img_container) {
                const reader = new FileReader();
                reader.onload = function() {
                    const element = img_container;
                    element.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }

            const input1 = document.querySelector('#inputImage1');
            const input2 = document.querySelector('#inputImage2');

        const img_container1 = document.querySelector('#previewImage1');
        const img_container2 = document.querySelector('#previewImage2');

        input1.addEventListener('change', (event) => {
            previewImage(event, img_container1);
        });
        input2.addEventListener('change', (event) => {
            previewImage(event, img_container2);
        });

        new PerfectScrollbar('.chat-list');
        new PerfectScrollbar('.chat-content');
    </scrip> --}}

    <script src="assets/js/app.js"></script>
</body>


{{--    AIzaSyDF3aj5xiKr4Z9POwAehwPGDed10z3zlUs--}}

</html>
