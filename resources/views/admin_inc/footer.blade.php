<footer>
    <div class="footer-area">
        <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
    </div>
</footer>
<script src="{{asset('admin/dashboard/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('admin/dashboard/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/dashboard/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/dashboard/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('admin/dashboard/assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/dashboard/assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin/dashboard/assets/js/jquery.slicknav.min.js')}}"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="{{asset('admin/dashboard/assets/js/line-chart.js')}}"></script>
<!-- all pie chart -->
<script src="{{asset('admin/dashboard/assets/js/pie-chart.js')}}"></script>
<!-- others plugins -->
<script src="{{asset('admin/dashboard/assets/js/plugins.js')}}"></script>
<script src="{{asset('admin/dashboard/assets/js/scripts.js')}}"></script>
<!-- datatable -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>
<script src="{{asset('admin/js/custom.js')}}"></script>

<!-- toastr library -->
@toastr_js
@toastr_render