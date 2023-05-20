<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách sinh viên</li>
                </ol>
            </div>
            <h4 class="page-title">Danh sách sinh viên</h4>
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
                                <th>Mã sinh viên</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data["students"])) {
                                foreach ($data["students"] as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value["username"]; ?></td>
                                        <td><?= $value["name"]; ?></td>
                                        <td><a href="mailto:<?= $value["email"]; ?>"><?= $value["email"]; ?></a></td>
                                        <td><a href="tel:<?= $value["phone"]; ?>"><?= $value["phone"]; ?></a></td>
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
                                                                <div>
                                                                    <img src="<?= _WEB_ROOT ?>/public/avatar/<?= $value["avatar_url"] ?>" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                                                </div>
                                                                <div class="text-start mt-3">
                                                                    <p class="text-muted"><strong>Mã sinh viên:</strong> <span class="ms-2"><?= $value["username"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Họ và tên:</strong> <span class="ms-2"><?= $value["name"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Giới tính:</strong> <span class="ms-2"><?= ($value["sex"] == 0) ? "Nam" : "Nữ"; ?></span></p>
                                                                    <p class="text-muted"><strong>Ngày sinh:</strong> <span class="ms-2"><?= $value["date_birth"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Địa chỉ:</strong> <span class="ms-2"><?= $value["address"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Email:</strong> <span class="ms-2"><?= $value["email"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Số điện thoại:</strong> <span class="ms-2"><?= $value["phone"]; ?></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="<?= $this->base_url("admin/student/edit/" . $value['username']) ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <form action="<?= $this->base_url("admin/student/delete/" . $value["username"]) ?>" class="form-delete" method="get">
                                                <a class=" btn-delete btn"> <i class="mdi mdi-delete"></i></a>
                                            </form>
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
            text: "Nếu xóa thì tất cả các dữ liệu liên quan đến sinh viên này sẽ bị xóa hết bao gồm hợp đồng, dịch vụ, báo cáo!!",
            icon: 'warning',
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

    .form-delete a i {
        font-size: 1.2rem;

    }
</style>