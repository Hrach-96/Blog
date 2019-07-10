<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>srtdash - ICO Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="token" content="{{ csrf_token() }}"/>
<meta name="url" content="{{ URL('/') }}"/>
<link rel="shortcut icon" type="image/png" href="{{asset('admin/dashboard/assets/images/icon/favicon.ico')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/metisMenu.css')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/slicknav.min.css')}}">
<!-- amchart css -->
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<!-- others css -->
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/typography.css')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/default-css.css')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/styles.css')}}">
<link rel="stylesheet" href="{{asset('admin/dashboard/assets/css/responsive.css')}}">
<!-- modernizr css -->
<script src="{{asset('admin/dashboard/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.bootstrap4.min.css">

<link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

@jquery
<!-- toastr library -->
@toastr_css