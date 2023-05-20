<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/admin/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm hợp đồng</li>
                </ol>
            </div> 
            <h4 class="page-title">Thêm hợp đồng</h4>
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
                                <label for="user_id" class="form-label">Sinh viên <span class="text-danger">(*)</span></label>
                                <select class="form-select" id="user_id" name="user_id" required>
                                    <?php  foreach($data["students"] as $value){?>
                                    <option value="<?php echo $value["username"]; ?>"><?php echo $value["name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="room_id" class="form-label">Phòng <span class="text-danger">(*)</span></label>
                                <select class="form-select" id="room_id" name="room_id" required>
                                    <?php  foreach($data["rooms"] as $value){?>
                                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["room_name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_birth">Ngày tạo <span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control" id="date_birth" name="date_start" required>
                            </div>
                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_birth">Ngày kết thúc <span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control" id="date_birth" name="date_end" required>
                            </div>
                            <div class="mb-3">
                                <label for="status1" class="form-label">Phương thức thanh toán</label>
                                <select class="form-select" id="status1" name="method_payment">
                                    <option value="0">Tiền mặt</option>
                                    <option value="1">Chuyển khoản</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Thêm hợp đồng</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    $('#user_id').change(function() {
        $.ajax({
            type: 'POST',
            url: '',
            data: {
                idS: $('#user_id').val(),
            },
            success: function(data) {
                $('#room_id').empty();
                $('#room_id').append(data);
            }
        })
    });
</script>