<!-- Bootstrap core JavaScript-->
<script src="{{asset('backend/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('backend/assetsvendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('backend/assetsjs/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('backend/assetsvendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('backend/assetsjs/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('backend/assetsjs/demo/chart-pie-demo.js')}}"></script>
@yield('extra_js_script')
@livewireScripts
</body>

</html>