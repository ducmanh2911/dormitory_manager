<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li> -->
                    <li class="breadcrumb-item active">Báo cáo</li>
                </ol>
            </div>
            <h4 class="page-title">Quản báo cáo</h4>
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
                            <th>Mã thông báo</th>
                            <th>Tên sinh viên</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data["listRepot"])) {
                            foreach ($data["listRepot"] as $key => $value) {
                        ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value["id"]; ?></td>
                                    <td><?= $value["name"]; ?></td>
                                    <td><?= $value["title"]; ?></td>
                                    <td><?= $value["message"]; ?></td>
                                    <td><?= $value["created_at"]; ?></td>
                                    <td><?php if($value['status'] == 0){
                                        echo "<a href='http://localhost/dormitory_manager/admin/report/edit/".$value['id']."' class='btn btn-success'>Xác nhận</a>";
                                    }else{
                                        echo "Đã xác nhận";
                                    } ?></td>
                                    <td class="table-action">
                                          <form action="<?= $this->base_url("admin/report/delete/" . $value["id"]) ?>" class="form-delete" id="form-delete" method="get">
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