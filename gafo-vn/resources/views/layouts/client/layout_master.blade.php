<!DOCTYPE html>
<html lang="en" ng-app="gafoApp">

<head>
    <meta charset="utf-8">
    <title>Gafo - Organic Prodducts</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{!! asset('contents/img/favicon.ico') !!}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{!! asset('contents/lib/animate/animate.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('contents/lib/owlcarousel/assets/owl.carousel.min.css') !!}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{!! asset('contents/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{!! asset('contents/css/style.css') !!}" rel="stylesheet">
    <!-- AngularJS -->
    <script src="{!! asset('contents/angularjs/angular.min.js') !!}"></script>
   
</head>

<body>
       

        @yield('content')

        @include('layouts.client.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{!! asset('contents/lib/wow/wow.min.js') !!}"></script>
    <script src="{!! asset('contents/lib/easing/easing.min.js') !!}"></script>
    <script src="{!! asset('contents/lib/waypoints/waypoints.min.js') !!}"></script>
    <script src="{!! asset('contents/lib/owlcarousel/owl.carousel.min.js') !!}"></script>

    <!-- Template Javascript -->
    <script src="{!! asset('contents/js/main.js') !!}"></script>

    <!-- AngularJs -->
    <script>
        // Khởi tạo ứng dụng AngularJS, sử dụng plugin ngCart
        // Do Laravel và AngularJS đều sử dụng dấu `Double bracket` để render dữ liệu
        // => để tránh bị xung đột cú pháp, ta sẽ đổi cú pháp render dữ liệu của AngularJS thành <% %>
        var app = angular.module('gafoApp', [],
            function($interpolateProvider) {
                $interpolateProvider.startSymbol('<%');
                $interpolateProvider.endSymbol('%>');
            });
    </script>
</body>

</html>