<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sinh viên</a></li>
                    <li class="breadcrumb-item active">Thêm sinh viên</li>
                </ol>
            </div>
            <h4 class="page-title">Thêm hóa đơn điện nước</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
                                            <option value="<?php echo $val["id"]; ?>"><?php echo $val["room_name"]; ?></option>
                                    <?php

                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="e_first" class="form-label">Số điện đầu </label>
                                <input type="number" id="e_first" name="e_first" class="form-control" placeholder="Nhập số điện đầu..." >
                            </div>
                            <div class="mb-3">
                                <label for="e_last" class="form-label">Số điện cuối </label>
                                <input type="number" id="e_last" name="e_last" class="form-control" placeholder="Nhập số điện cuối..." >
                            </div>
                            <div class="mb-3">
                                <label for="price_per_e" class="form-label">Tiền trên 1 số điện </label>
                                <input type="number" id="price_per_e" name="price_per_e" class="form-control" placeholder="Nhập số tiền  trên 1 số điện..." >
                            </div>
                            <div class="mb-3">
                                <label for="w_first" class="form-label">Số nước đầu </label>
                                <input type="number" id="w_first" name="w_first" class="form-control" placeholder="Nhập số nước đầu..." >
                            </div>
                            <div class="mb-3">
                                <label for="w_last" class="form-label">Số nước cuối </label>
                                <input type="number" id="w_last" name="w_last" class="form-control" placeholder="Nhập số nước cuối..." >
                            </div>
                            <div class="mb-3">
                                <label for="price_per_w" class="form-label">Tiền trên 1 số nước </label>
                                <input type="number" id="price_per_w" name="price_per_w" class="form-control" placeholder="Nhập số tiền  trên 1 số nước..." >
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="start_date">Từ ngày </label>
                                <input type="date" class="form-control" id="start_date" name="start_date" >
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="end_date">Đến ngày </label>
                                <input type="date" class="form-control" id="end_date" name="end_date" >
                            </div>

                            <div class="mb-3">
                                <label for="status1" class="form-label">Trạng thái</label>
                                <select class="form-select" id="status1" onchange="showm()" name="status">
                                    <option value="0">Chưa thanh toán</option>
                                    <option value="1" id="paymented">Đã thanh toán</option>
                                </select>
                            </div>
                            <div id="method-pay" class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="payment1" name="payment" value="0" class="form-check-input">
                                    <label class="form-check-label" for="payment1">Tiền mặt</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="payment2" name="payment" value="1" class="form-check-input">
                                    <label class="form-check-label" for="payment2">Chuyển khoản</label>
                                </div>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-success">Lập hóa đơn</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function showm(){
        var valueSelect = document.getElementById("status1").value;
        const methodPay = document.getElementById("method-pay");
        if(valueSelect == 1){
            methodPay.classList.add("show");
            document.getElementById("payment1").checked = true;
        }else{
            methodPay.classList.remove("show");
        }
    }
</script>
<style>
    #method-pay{
        display: none;
    }
    .show{
        display: block !important;
    }
</style>