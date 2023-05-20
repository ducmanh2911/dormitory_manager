<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hoá đơn</a></li>
                    <li class="breadcrumb-item active">Thêm hoá đơn</li>
                </ol>
            </div>
            <h4 class="page-title">Thêm hóa đơn dịch vụ</h4>
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
                            <div class="mb-3">
                                <label for="e_last" class="form-label">Ngày tạo </label>
                                <input type="text" id="create_at" name="create_at" class="form-control" placeholder="<?= date('Y-m-d'); ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="e_last" class="form-label">Người tạo </label>
                                <input type="text" id="user_id" name="user_id" class="form-control" placeholder="<?= $_SESSION['login']['username']; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="student_id" class="form-label">Sinh viên sử dụng</label>
                                <select class="form-select" id="student_id" name="student_id">
                                    <?php foreach ($data['allStudent'] as $key => $value) { ?>
                                        <option value="<?= $value['username'] ?>"><?= $value['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="student_id" class="form-label">Các dịch vụ</label>
                                <select class="select2 form-control select2-multiple" data-toggle="select2" name="service[]" multiple="multiple" data-placeholder="Choose ...">
                                    <?php foreach($data['allService'] as $value){ ?>
                                        <option value="<?= $value['id']?>"><?= $value['name']?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status1" class="form-label">Trạng thái</label>
                                <select class="form-select" id="status1" name="status">
                                    <option value="0">Chưa thanh toán</option>
                                    <option value="1" id="paymented">Đã thanh toán</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Thêm hóa đơn dịch vụ</button>
                    </div>
            </div>
            </form>

        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function showm() {
        var valueSelect = document.getElementById("status1").value;
        const methodPay = document.getElementById("method-pay");
        if (valueSelect == 1) {
            methodPay.classList.add("show");
            document.getElementById("payment1").checked = true;
        } else {
            methodPay.classList.remove("show");
        }
    }
</script>
<style>
    #method-pay {
        display: none;
    }

    .show {
        display: block !important;
    }
</style>