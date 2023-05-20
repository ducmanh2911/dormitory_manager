<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách điện nước</li>
                </ol>
            </div>
            <h4 class="page-title">Danh sách điện nước</h4>
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
                <div class="table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã hóa đơn</th>
                                <th>Số điện sử dụng</th>
                                <th>Số nước sử dụng</th>
                                <th>Từ ngày</th>
                                <th>Đến ngày</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data["bill_ew"])) {
                                foreach ($data["bill_ew"] as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value["id"]; ?></td>
                                        <td><?= $value["e_last"] - $value["e_first"]; ?></td>
                                        <td><?= $value["w_last"] - $value["w_first"]; ?></td>
                                        <td><?= $value["start_date"]; ?></td>
                                        <td><?= $value["end_date"]; ?></td>
                                        <td><?= $value["status"] == 0 ? "<span class='badge bg-danger'>Chưa thanh toán</span>" : "<span class='badge bg-success'>Đã thanh toán</span>"; ?></td>
                                        <td class="table-action d-flex">
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#centermodal<?= $value["id"]; ?>"> <i class="mdi mdi-eye"></i></a>

                                            <div class="modal fade" id="centermodal<?= $value["id"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myCenterModalLabel">Thông tin chi tiết</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="card text-center">
                                                            <div class="modal-body">
                                                                <div class="text-start mt-3">
                                                                    <p class="text-muted"><strong>Tên phòng:</strong> <span class="ms-2"><?= $value["room_name"] ?></span></p>
                                                                    <p class="text-muted"><strong>Mã hóa đơn:</strong> <span class="ms-2"><?= $value["id"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Chỉ số điện đầu:</strong> <span class="ms-2"><?= $value["e_first"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Chỉ số điện cuối:</strong> <span class="ms-2"><?= $value["e_last"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Giá tiền trên 1 số điện:</strong> <span class="ms-2"><?= $value["price_per_e"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Tổng tiền điện:</strong> <span class="ms-2"><?= number_format($value["price_per_e"] * ($value["e_last"] - $value["e_first"])); ?> VND</span></p>
                                                                    <p class="text-muted"><strong>Chỉ số nước đầu:</strong> <span class="ms-2"><?= $value["w_first"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Chỉ số nước cuối:</strong> <span class="ms-2"><?= $value["w_last"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Giá tiền trên 1 số nước:</strong> <span class="ms-2"><?= $value["price_per_w"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Tổng tiền nước:</strong> <span class="ms-2"><?= number_format($value["price_per_w"] * ($value["w_last"] - $value["w_first"])); ?> VND</span></p>
                                                                    <p class="text-muted"><strong>Từ ngày:</strong> <span class="ms-2"><?= $value["start_date"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Đến ngày:</strong> <span class="ms-2"><?= $value["end_date"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Trạng thái :</strong> <span class="ms-2"><?= $value["status"] == 0 ? "<span class='badge bg-danger'>Chưa thanh toán</span>" : "<span class='badge bg-success'>Đã thanh toán</span>"; ?></span></p>
                                                                    <?php
                                                                    if ($value["status"] == 1) {
                                                                    ?>
                                                                        <p class="text-muted"><strong>Phương thức thanh toán</strong> <span class="ms-2"><?= $value["status"] == 0 ? "Chuyển khoản" : "Tiền mặt"; ?></span></p>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="<?= $this->base_url("admin/bill/edit-electric-water/" . $value['id']) ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>

                                            <form action="<?= $this->base_url("admin/bill/delete-electric-water/" . $value["id"]) ?>" class="form-delete" method="get">
                                                <a class=" btn-delete btn"> <i class="mdi mdi-delete"></i> </a>
                                            </form>
                                            <!-- <form action="<?= $this->base_url("admin/student/delete/" . $value["username"]) ?>" id="form-delete" method="get">
                                                <a class=" btn-delete btn" onclick="showAlert()"> <i class="mdi mdi-delete"></i></a>
                                            </form> -->
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".form-delete").on("click", function() {
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'OK',
            denyButtonText: `Không`,
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).submit();
            }
        })
    })
</script>
<style>
    .form-delete {
        font-size: 1.2rem;
        display: inline-block;
        padding: 0 3px;
    }

    .form-delete a {
        color: #98a6ad;
        padding: 0;
        border: 0;

    }

    .form-delete a:hover {
        color: red;
    }

    #form-delete a i {
        font-size: 1.2rem;

    }
</style>