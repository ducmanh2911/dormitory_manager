

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center">
                                <h1 class="text-error"><i class="mdi mdi-emoticon-sad"></i></h1>
                                <h4 class="text-uppercase text-danger mt-3">Bạn không đủ quyền truy cập trang này</h4>
                                <!-- <p class="text-muted mt-3">Có vẻ đã có một số sự cố cho trang bạn cần tìm, bạn vui lòng kiểm tra lại đường link đã đúng chưa hoặc liên hệ với quản trị viên để báo lỗi.</p> -->

                                <a class="btn btn-info mt-3" onclick="quay_lai_trang_truoc()"><i class="mdi mdi-reply"></i> Trở lại</a>
                            </div>
                    </div>
            </div>
        </div>

    </div>
    <script>
        function quay_lai_trang_truoc() {
            history.back();
        }
    </script>
