<!DOCTYPE html>
<html lang="en">

<head>
    <title>FlowerShop - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('user/assets/css/bass.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/grid.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('user/assets/css/responsive.css')}}">

    <script src="{{asset('user/Javascrip/angular.min.js')}}"></script>
    <script src="{{asset('user/Javascrip/global.js')}}"></script>
    <script src="{{asset('user/Javascrip/api.js')}}"></script>
    <script src="{{asset('user/Javascrip/detail.js')}}"></script>
    <script src="{{asset('user/Javascrip/search.js')}}"></script>
    <script src="{{asset('user/Javascrip/login.js')}}"></script>
    <!-- <script src="{{asset('user/Javascrip/detail.js')}}"></script> -->
</head>

<body>
    <!-- header -->
    @yield('header')
    <main>
        @yield('content')
    </main>

    <!--  footer -->
    @yield('footer')
    <script src="{{asset('user/Javascrip/home.js')}}"></script>
    <script src="{{asset('asset_admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
</body>

</html>