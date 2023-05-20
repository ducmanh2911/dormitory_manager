<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li> -->
                    <li class="breadcrumb-item active">Phòng</li>
                </ol>
            </div>
            <h4 class="page-title">Quản lý phòng</h4>
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
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên phòng</th>
                            <th>Người quản lý</th>
                            <th>Giá phòng(VND)</th>
                            <th>Khu </th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        if (isset($data["list_room"])) {
                            foreach ($data["list_room"] as $key => $value) {
                        ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value["room_name"]; ?></td>
                                    <td><?= $value["user_name"]; ?></td>
                                    <td><?= number_format($value["price"]); ?></td>
                                    <td>
                                        <?=
                                        $value["area"] == 0 ? "Nam" : "Nữ";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $value["count"] . "/" . $value["max_num"];
                                        if ($value["count"] == $value["max_num"]) {
                                            echo "<span class='badge bg-danger ms-2'>Đầy</span>";
                                        } else {
                                            echo "<span class='badge bg-success ms-2'>Thiếu</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($value["status"] == 1) { ?>
                                            <span class="badge bg-success">Hoạt động</span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">Bảo trì</span>
                                        <?php } ?>
                                    </td>

                                    <td class="table-action">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#centermodal<?= $value["id"]; ?>" class="action-icon"> <i class="mdi mdi-eye"></i></a>

                                        <div class="modal fade" id="centermodal<?= $value["id"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myCenterModalLabel">Thông tin chi tiết</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="card text-center">
                                                        <div class="modal-body">
                                                            <div class="text-start">
                                                                <div class="inbox-widget">
                                                                    <?php
                                                                    
                                                                    if($value["count"] == 0){
                                                                        echo "<h3 class='text-center'>Phòng trống</h3>";
                                                                    }
                                                                    foreach ($data['students'] as $student) {
                                                                        if ($student["room_id"] == $value["id"]) {
                                                                    ?>
                                                                            <div class="inbox-item">
                                                                                <div class="inbox-item-img"><img src="<?= _WEB_ROOT ?>/public/avatar/<?= $student["avatar_url"] ?>" class="rounded-circle" alt=""></div>
                                                                                <p class="inbox-item-author"><?= $student["name"] ?></p>
                                                                                <p class="inbox-item-text">Ngày hết hạn: <?= $student["date_end"] ?></p>
                                                                            </div>

                                                                        <?php
                                                                        }
                                                                    }?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <a href="<?= $this->base_url("admin/room/edit/" . $value["id"]) ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <form action="<?= $this->base_url("admin/room/delete/" . $value["id"]) ?>" class="form-delete" id="form-delete" method="get">
                                            <a class=" btn-delete btn"> <i class="mdi mdi-delete"></i></a>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    const x = document.getElementsByClassName("form-delete");
    for (let i = 0; i < x.length; i++) {
        x[i].onclick = function() {
            Swal.fire({
                title: 'Bạn chắc chắn muốn xóa?',
                text: "Nếu xóa phòng tất cả các thông tin liên quan đến phòng này đều bị xóa hết!!",
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'OK',
                denyButtonText: `Không`,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        }
    }
</script>

<style>
    .inbox-item-img img {
        height: 40px;
    }

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