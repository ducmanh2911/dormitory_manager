<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thông tin cá nhân</li>
                </ol>
            </div>
            <h4 class="page-title">Thông tin cá nhân</h4>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="card bg-primary">
            <div class="card-body profile-user-box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="<?= _WEB_ROOT ?>/public/avatar/<?= $_SESSION["login"]["avatar_url"] ?>" alt="" class="rounded-circle img-thumbnail">
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <h4 class="mt-1 mb-1 text-white"><?= $_SESSION["login"]["name"] ?></h4>
                                    <p class="font-13 text-white-50"> Quản trị viên siêu cấp</p>

                                    <ul class="mb-0 list-inline text-light">
                                        <li class="list-inline-item me-3">
                                            <h5 class="mb-1 text-white">Cấp độ</h5>
                                            <p class="mb-0 font-13 text-white-50">Trúc cơ</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="mb-1 text-white">Kinh nghiệm</h5>
                                            <p class="mb-0 font-13 text-white-50">99%</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="text-center mt-sm-0 mt-3 text-sm-end">
                            <button type="button" class="btn btn-light">
                                <i class="mdi mdi-account-edit me-1"></i> Sửa thông tin
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-12">

        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Thông tin</h4>
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
                    <hr />
                    <div class="row mb-3">
                        <label for="name" class="col-2 col-form-label">Họ và tên: </label>
                        <div class="col-5">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ tên" value="<?php if (isset($_SESSION["login"]["name"])) {
                                                                                                                                echo $_SESSION["login"]["name"];
                                                                                                                            } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-2 col-form-label">Tên tài khoản: </label>
                        <div class="col-5">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Nhập tài khoản" value="<?php if (isset($_SESSION["login"]["username"])) {
                                                                                                                                            echo $_SESSION["login"]["username"];
                                                                                                                                        } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-2 col-form-label">Mật khẩu: </label>
                        <div class="col-5">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-2 col-form-label">Giới tính: </label>
                        <div class="col-5">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender1" name="gender" value="0" class="form-check-input" <?php if (isset($_SESSION["login"]["sex"])) {
                                                                                                                        if ($_SESSION["login"]["sex"] == 0) {
                                                                                                                            echo "checked";
                                                                                                                        }
                                                                                                                    } ?>>
                                <label class="form-check-label" for="gender1">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="gender2" name="gender" value="1" class="form-check-input" <?php if (isset($_SESSION["login"]["sex"])) {
                                                                                                                        if ($_SESSION["login"]["sex"] == 1) {
                                                                                                                            echo "checked";
                                                                                                                        }
                                                                                                                    } ?>>
                                <label class="form-check-label" for="gender2">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" id="datepicker1">
                        <label for="date_birth" class="col-2 col-form-label">Ngày sinh: </label>
                        <div class="col-5 ">
                            <input type="date" class="form-control" name="date_birth" id="date_birth" value="<?php if (isset($_SESSION["login"]["date_birth"])) {
                                                                                                                    echo $_SESSION["login"]["date_birth"];
                                                                                                                } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-2 col-form-label">Địa chỉ: </label>
                        <div class="col-5">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ" value="<?php if (isset($_SESSION["login"]["address"])) {
                                                                                                                                        echo $_SESSION["login"]["address"];
                                                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-2 col-form-label">Email: </label>
                        <div class="col-5">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Nhập email" value="<?php if (isset($_SESSION["login"]["email"])) {
                                                                                                                                echo $_SESSION["login"]["email"];
                                                                                                                            } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-2 col-form-label">Số điện thoại: </label>
                        <div class="col-5">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?php if (isset($_SESSION["login"]["phone"])) {
                                                                                                                                        echo $_SESSION["login"]["phone"];
                                                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="avatar" class="col-2 col-form-label">Ảnh đại diện: </label>
                        <div class="col-5">
                            <input class="form-control" type="file" name="avatar"  id="avatar" accept=".jpg, .png">
                            <img src="" class="preview" height="120">
                        </div>
                    </div>


                    <div class="justify-content-end row">
                        <div class="col-9">
                            <button type="submit" name="submit" class="btn btn-info">Lưu thông tin</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    const ipnFileElement = document.querySelector("#avatar")
    const image = document.querySelector('.preview')

    ipnFileElement.addEventListener('change', function(e) {
        const src = URL.createObjectURL(e.target.files[0]);
        image.src = src;
    })
</script>