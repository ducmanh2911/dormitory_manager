<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đăng ký quản trị viên</li>
                </ol>
            </div>
            <h4 class="page-title">Đăng ký quản trị viên</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="form-check" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-3 "></div>
                        <div class="col-xl-6 ">

                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên <span class="text-danger">(*)</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Tài khoản  <span class="text-danger">(*)</span></label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Nhập tài khoản..." required>
                            </div>
                            <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"  placeholder="Nhập mật khẩu">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                            <label for="gender" class="form-label">Giới tính</label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="gender1" name="gender" value="0" class="form-check-input" checked>
                                    <label class="form-check-label" for="gender1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="gender2" name="gender" value="1" class="form-check-input">
                                    <label class="form-check-label" for="gender2">Nữ</label>
                                </div>
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_birth">Ngày sinh</label>
                                <input type="date" class="form-control" id="date_birth" name="date_birth">
                            </div>

                            <div class="mb-0">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <textarea class="form-control" id="address" name="address" rows="5" placeholder="Nhập địa chỉ ..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">(*)</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email..." required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại <span class="text-danger">(*)</span></label>
                                <input type="text" id="phone" name="phone" class="form-control" maxlength="11" placeholder="Nhập số điện thoại..." required>
                            </div>

                            <div class="mb-3">
                                <label class="avatar">Ảnh</label>
                                <input class="form-control" type="file" name="avatar" id="avatar" accept=".jpg, .png">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Đăng ký</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
