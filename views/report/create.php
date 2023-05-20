<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm hợp đồng</li>
                </ol>
            </div>
            <h4 class="page-title">Thêm báo cáo</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-xl-3 "></div>
                        <div class="col-xl-6 ">
                            <?php if (isset($_COOKIE["err"])) : ?>
                                <div class="alert alert-danger " role="alert">
                                    <?= $_COOKIE["err"]; ?>
                                </div>
                            <?php endif; ?>


                            <div class="mb-3">
                                <label for="max_num" class="form-label">Tiêu đề<span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề" require>
                            </div>

                            <div class="mb-3">
                                <label for="max_num" class="form-label">Nội dung<span class="text-danger">(*)</span></label>
                                <textarea  class="form-control" rows="3" name="message"></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Gửi báo cáo</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>