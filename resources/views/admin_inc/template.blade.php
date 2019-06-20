<!doctype html>
<html>
<head>
    @include('admin_inc.head')
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        @include('admin_inc.left-sidebar')
        <!-- main content area start -->
            <div class="main-content">
                @include('admin_inc.header')
                @include('admin_inc.page-title')
                @yield('content')
            </div>
        @include('admin_inc.footer')
    </div>
</body>
</html>