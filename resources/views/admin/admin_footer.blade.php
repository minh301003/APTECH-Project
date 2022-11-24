</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng xuất</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn chắc chắn muốn đăng xuất chứ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="submit" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" href="{{ route('admin.logout')}}">Đăng xuất</a>
            </div>
        </div>
    </div>
</div></div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ url('./vendorAdmin/jquery/jquery.min.js') }}"></script>
<script src="{{ url('./vendorAdmin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('./vendorAdmin/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('./js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('./vendorAdmin/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('./js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('./js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>