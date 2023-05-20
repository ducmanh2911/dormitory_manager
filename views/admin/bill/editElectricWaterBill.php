<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa hóa đơn điện nước</li>
                </ol>
            </div>
            <h4 class="page-title">Sửa hóa đơn điện nước</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <?php if (isset($_COOKIE["err"])) : ?>
                    <div class="alert alert-danger " role="alert">
                        <?= $_COOKIE["err"]; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_COOKIE["suc"])) : ?>
                    <div class="alert alert-success " role="alert">
                        <?= $_COOKIE["suc"]; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-3 "></div>
                        <div class="col-xl-6 ">
                            <div class="mb-3">
                                <label for="room_id" class="form-label">Phòng</label>
                                <select class="form-select" id="room_id" name="room_id">
                                    <?php 
                                    if (isset($data["rooms"])) {
                                        foreach ($data["rooms"] as $key => $val) {
                                    ?>
                                            <option value="<?php echo $val["id"]; ?>" <?= $data["billew"]["rooms_id"] == $val["id"] ? "selected" : ""; ?>><?php echo $val["room_name"]; ?></option>
                                    <?php

                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="e_first" class="form-label">Số điện đầu </label>
                                <input type="number" id="e_first" name="e_first" class="form-control" value="<?= $data["billew"]["e_first"]; ?>" placeholder="Nhập số điện đầu...">
                            </div>
                            <div class="mb-3">
                                <label for="e_last" class="form-label">Số điện cuối </label>
                                <input type="number" id="e_last" name="e_last" class="form-control" value="<?= $data["billew"]["e_last"]; ?>" placeholder="Nhập số điện cuối...">
                            </div>
                            <div class="mb-3">
                                <label for="price_per_e" class="form-label">Tiền trên 1 số điện </label>
                                <input type="number" id="price_per_e" name="price_per_e" class="form-control" value="<?= $data["billew"]["price_per_e"]; ?>" placeholder="Nhập số tiền  trên 1 số điện...">
                            </div>
                            <div class="mb-3">
                                <label for="w_first" class="form-label">Số nước đầu </label>
                                <input type="number" id="w_first" name="w_first" class="form-control" value="<?= $data["billew"]["w_first"]; ?>" placeholder="Nhập số nước đầu...">
                            </div>
                            <div class="mb-3">
                                <label for="w_last" class="form-label">Số nước cuối </label>
                                <input type="number" id="w_last" name="w_last" class="form-control" value="<?= $data["billew"]["w_last"]; ?>" placeholder="Nhập số nước cuối...">
                            </div>
                            <div class="mb-3">
                                <label for="price_per_w" class="form-label">Tiền trên 1 số nước </label>
                                <input type="number" id="price_per_w" name="price_per_w" class="form-control" value="<?= $data["billew"]["price_per_w"]; ?>" placeholder="Nhập số tiền  trên 1 số nước...">
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="start_date">Từ ngày </label>
                                <input type="date" class="form-control" id="start_date" value="<?= $data["billew"]["start_date"]; ?>" name="start_date">
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="end_date">Đến ngày </label>
                                <input type="date" class="form-control" id="end_date" value="<?= $data["billew"]["end_date"]; ?>" name="end_date">
                            </div>

                            <div class="mb-3">
                                <label for="status1" class="form-label">Trạng thái</label>
                                <select class="form-select" id="status1" name="status">
                                    <option value="0" <?= $data["billew"]["status"] == 0 ? "selected" : ""; ?>>Chưa thanh toán</option>
                                    <option value="1" <?= $data["billew"]["status"] == 1 ? "selected" : ""; ?> id="paymented">Đã thanh toán</option>
                                </select>
                            </div>
                            <div id="method-pay" class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="payment1" name="payment" value="0" <?= $data["billew"]["payment"] == 1 ? "checked" : ""; ?> class="form-check-input">
                                    <label class="form-check-label" for="payment1">Tiền mặt</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="payment2" name="payment" value="1" <?= $data["billew"]["payment"] == 0 ? "checked" : ""; ?> class="form-check-input">
                                    <label class="form-check-label" for="payment2">Chuyển khoản</label>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Sửa</button>
                            <button class="btn btn-secondary"><a href="<?= $this->base_url("admin/bill/list-electric-water") ?>" style="color: #ffffff;">Quay lại</a></button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var valueSelect = $("#status1").val();
    if (valueSelect == 1) {
        $("#method-pay").addClass("show");
    }
    $("#status1").change(function() {
        var valueSelect = $("#status1").val();
        if (valueSelect == 1) {
            $("#method-pay").addClass("show");
            $("#payment1").checked = true;
        } else if (valueSelect == 0) {
            $("#method-pay").removeClass("show");
        }
    })
</script>
<style>
    #method-pay {
        display: none;
    }

    .show {
        display: block !important;
    }
</style>