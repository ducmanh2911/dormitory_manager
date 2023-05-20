<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/admin/service/index">Dịch vụ</a></li>
                    <li class="breadcrumb-item active">Sửa dịch vụ</li>
                </ol>
            </div>
            <h4 class="page-title">Sửa dịch vụ</h4>
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
                                <label for="name" class="form-label">Tên dịch vụ <span class="text-danger">(*)</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="<?= $data["service_data"]["name"]; ?>" placeholder="Nhập tên" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Mô tả dịch vụ <span class="text-danger">(*)</span></label>
                                <input type="text" id="describe" name="describe" class="form-control" value="<?= $data["service_data"]["describe"]; ?>" placeholder="Nhập tên" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Giá dịch vụ <span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" id="price" name="price" value="<?= $data["service_data"]["price"]; ?>"  placeholder="Nhập giá tiền...">
                            </div>

                            <div class="mb-3">
                                <label for="status1" class="form-label">Trạng thái</label>
                                <select class="form-select" id="status1" name="status">
                                    <option value="1" <?= ($data["service_data"]["status"] == 1) ? "selected" : ""; ?>>Hoạt Động</option>
                                    <option value="0" <?= ($data["service_data"]["status"] == 0) ? "selected" : ""; ?>>Bảo Trì</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Gửi</button>
                            <button class="btn btn-secondary"><a href="<?= $this->base_url("admin/service/index") ?>" style="color: #ffffff;">Quay lại</a></button>
                        
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>