<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li> -->
                    <li class="breadcrumb-item active">Dịch vụ</li>
                </ol>
            </div>
            <h4 class="page-title">Quản lý dịch vụ</h4>
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
                            <th>Tên dịch vụ</th>
                            <th>Mô tả</th>
                            <th>Giá dịch vụ (VND)</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        if (isset($data["list_service"])) {
                            foreach ($data["list_service"] as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value["name"]; ?></td>
                                    <td><?= $value["describe"]; ?></td>
                                    <td><?= number_format($value["price"]); ?></td>
                                    <td>
                                        <?php if ($value["status"] == 1) { ?>
                                            <span class="badge bg-success">Hoạt động</span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">Bảo trì</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= $this->base_url("admin/service/edit/" . $value["id"]) ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <form action="<?= $this->base_url("admin/service/delete/" . $value["id"]) ?>" class="form-delete" id="form-delete" method="get">
                                            <a class=" btn-delete btn"> <i class="mdi mdi-delete"></i></a>
                                        </form>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
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