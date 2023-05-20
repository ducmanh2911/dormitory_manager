<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item">Danh sách hoá đơn</li>
                    <li class="breadcrumb-item active">Chi tiết hoá đơn</li>
                </ol>
            </div>
            <h4 class="page-title">Danh sách chi tiết hoá đơn</h4>
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
                                <th>ID Dịch vụ</th>
                                <th>Tên dịch vụ</th>
                                <th>Chi tiết dịch vụ</th>
                                <th>Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data["invoiceDetails_list"])) {
                                foreach ($data["invoiceDetails_list"] as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value["invoice_detailsID"]; ?></td>
                                        <td><?= $value["serviceID"]?></td>
                                        <td><?= $value["name"]?></td>
                                        <td><?= $value["describe"]; ?></td>
                                        <td><?= $value["price"]; ?></td>
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