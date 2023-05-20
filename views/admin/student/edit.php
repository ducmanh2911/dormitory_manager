<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sinh viên</a></li>
                    <li class="breadcrumb-item active">Sửa sinh viên</li>
                </ol>
            </div>
            <h4 class="page-title">Sửa sinh viên</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-3 "></div>
                        <div class="col-xl-6 ">
                            <div class="mb-3">
                                <label for="id" class="form-label">Mã sinh viên <span
                                        class="text-danger">(*)</span></label>
                                <input type="text" id="id" name="id" class="form-control"
                                    value="<?= $data["student"]["username"]; ?>" placeholder="Nhập mã sinh viên..."
                                    required>
                                <div class="invalid-feedback">
                                    Mã sinh viên đã tồn tại vui lòng nhập lại
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên <span
                                        class="text-danger">(*)</span></label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="<?= $data["student"]["name"]; ?>" placeholder="Nhập tên" required>
                            </div>

                            <label for="gender" class="form-label">Giới tính</label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="gender1" name="gender" value="0" class="form-check-input"
                                        <?= ($data["student"]["sex"] == 0) ? "checked" : " "; ?>>
                                    <label class="form-check-label" for="gender1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="gender2" name="gender" value="1" class="form-check-input"
                                        <?= ($data["student"]["sex"] == 1) ? "checked" : " "; ?>>
                                    <label class="form-check-label" for="gender2">Nữ</label>
                                </div>
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_birth">Ngày sinh</label>
                                <input type="date" class="form-control" id="date_birth" name="date_birth"
                                    value="<?= $data["student"]["date_birth"]; ?>">
                            </div>

                            <div class="mb-0">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="<?= $data["student"]["address"]; ?>" placeholder="Nhập địa chỉ ...">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">(*)</span></label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="<?= $data["student"]["email"]; ?>" placeholder="Nhập email..." required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại <span
                                        class="text-danger">(*)</span></label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="<?= $data["student"]["phone"]; ?>" placeholder="Nhập số điện thoại..."
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="avatar">Ảnh</label>
                                <input class="form-control" type="file" name="avatar" alt="1" id="avatar" value="<?= $data["student"]["avatar_url"]; ?>" accept=".jpg, .png">
                                <img src="<?= _WEB_ROOT ?>/public/avatar/<?= $data["student"]["avatar_url"] ?>" class="preview" height="120">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Sửa</button>
                            <button class="btn btn-secondary"><a href="<?= $this->base_url("admin/student/index") ?>"
                                    style="color: #ffffff;">Quay lại</a></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const ipnFileElement = document.querySelector("#avatar")
    const image = document.querySelector('.preview')

    ipnFileElement.addEventListener('change', function (e) {
        const src = URL.createObjectURL(e.target.files[0]);
        image.src = src;
    })


    $("#id").on("keyup", function () {
        var idstudent = $("#id").val();
        $.ajax({
            type: 'POST',
            url: window.location.href,
            data: {
                idStudent: idstudent,
            },
            success: function (data) {
                if (data == 0) {
                    $("#id").addClass("form-err");
                    $(".invalid-feedback").addClass("d-block");
                    return false;
                } else {
                    $("#id").removeClass("form-err");
                    $(".invalid-feedback").removeClass("d-block");
                }
            }

        })
    })
</script>
<style>
    .form-err {
        border-color: #fa5c7c;
        padding-right: calc(1.5em + 0.9rem);
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.225rem) center;
        background-size: calc(0.75em + 0.45rem) calc(0.75em + 0.45rem);
    }

    .d-block {
        display: block !important;
    }
</style>