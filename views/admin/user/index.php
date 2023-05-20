<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li> -->
                    <li class="breadcrumb-item active">Người dùng</li>
                </ol>
            </div>
            <h4 class="page-title">Quản lý người dùng</h4>
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
                                <th>Tên đăng nhập</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Trạng thái</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data["user"])) {
                                foreach ($data["user"] as $key => $value) {
                                    if ($value["id"] != 2) {
                            ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value["username"]; ?></td>
                                            <td><?= $value["name"]; ?></td>
                                            <td><a href="mailto:<?= $value["email"]; ?>"><?= $value["email"]; ?></a></td>
                                            <td><a href="tel:<?= $value["phone"]; ?>"><?= $value["phone"]; ?></a></td>
                                            <td>
                                                <?php if ($value["status"] == 1) { ?>
                                                    <span class="badge bg-success">Hoạt động</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">Khóa</span>
                                                <?php } ?>
                                            </td>
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
                                                                        <p class="text-muted"><strong>Tên đăng nhập:</strong> <span class="ms-2"><?= $value["username"]; ?></span></p>
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
                                                <?php if ($_SESSION['login']['id'] != $value['id']) { ?>
                                                    <?php if ($value["status"] == 1) { ?>
                                                        <a href="<?= $this->base_url("admin/user/edit/" . $value['id']) ?>" class="action-icon" title="Mở"> <i class="mdi mdi-account-lock-open"></i></a>
                                                    <?php } else { ?>
                                                        <a href="<?= $this->base_url("admin/user/edit/" . $value['id']) ?>" class="action-icon" title="Khóa"> <i class="mdi mdi-account-lock"></i></a>
                                                    <?php } ?>
                                                    <form action="<?= $this->base_url("admin/user/delete/" . $value["id"]) ?>" id="form-delete" method="get">
                                                        <a class=" btn-delete btn" onclick="showAlert()"> <i class="mdi mdi-delete"></i></a>
                                                    </form>
                                                <?php } ?>
                                            </td>
                                        </tr>
                            <?php
                                    }
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
    function showAlert() {
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'OK',
            denyButtonText: `Không`,
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-delete').submit();
            }
        })
    };
</script>
<style>
    #form-delete {
        font-size: 1.2rem;
        display: inline-block;
        padding: 0 3px;
    }

    #form-delete a {
        color: #98a6ad;
        padding: 0;
        border: 0;

    }

    #form-delete a:hover {
        color: red;
    }

    #form-delete a i {
        font-size: 1.2rem;

    }
</style>