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
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <a href="<?= _WEB_ROOT; ?>/room/create" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Thêm phòng</a>
                    </div>
                    <div class="col-sm-7">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div>
                </div>
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
                                    <td><?= $value["name_user"]; ?></td>
                                    <td><?= number_format($value["price"]); ?></td>
                                    <td>
                                        <?php
                                        $tong_student = 6;
                                        $dem[$value["room_name"]] = 0;
                                        foreach ($data['students'] as $student) {
                                            if ($student["room_id"] == $value["id"]) {
                                                $dem[$value["room_name"]]++;
                                            }
                                        }

                                        echo $dem[$value["room_name"]] . "/" . $tong_student;
                                        if ($dem[$value["room_name"]] == $tong_student) {
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