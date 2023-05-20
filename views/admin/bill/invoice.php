<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Hoá đơn dịch vụ</li>
                </ol>
            </div>
            <h4 class="page-title">Danh sách hoá đơn dịch vụ</h4>
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
                                <th>ID</th>
                                <th>Ngày tạo</th>
                                <th>Người tạo</th>
                                <th>Người sử dụng</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data["invoice_list"])) {
                                foreach ($data["invoice_list"] as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value["id"]; ?></td>
                                        <td><?= $value["created_at"]?></td>
                                        <td><?= $value["user_id"]?></td>
                                        <td><?= $value["name"]; ?></td>
                                        <td><?= $value["status"] == 0 ? "<span class='badge bg-danger'>Chưa thanh toán</span>" : "<span class='badge bg-success'>Đã thanh toán</span>"; ?></td>
                                        <td class="table-action d-flex">
                                            <a href="<?= $this->base_url("admin/bill/view-details-invoice/" . $value['id']) ?>" class="action-icon"> <i class="mdi mdi-eye"></i></a>

                                            <form action="<?= $this->base_url("admin/bill/delete-invoice/" . $value["id"]) ?>" class="form-delete" method="get">
                                                <a class=" btn-delete btn"> <i class="mdi mdi-delete"></i> </a>
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