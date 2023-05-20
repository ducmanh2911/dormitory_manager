<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Đăng nhập | Dormitory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= _WEB_ROOT ?>/public/images/favicon.ico">

    <!-- App css -->
    <link href="<?= _WEB_ROOT ?>/public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= _WEB_ROOT ?>/public/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <style>
        body{
            background-image: url(https://toigingiuvedep.vn/wp-content/uploads/2021/01/hinh-nen-4k-tuyet-dep-cho-may-tinh-820x461.jpg) ;
            background-repeat: no-repeat;
            background-size: cover ;
        }
    </style>
</head>

<body>
    <div class></div>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <h2 style="color: #ffffff;">
                                    <!-- <img src="assets/images/logo.png" alt="" height="18"> -->
                                    Đăng nhập
                                </h2>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <?php if (isset($_COOKIE["err"])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_COOKIE["err"]; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($_SESSION["suc"])) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION["suc"]; ?>
                                </div>
                            <?php unset($_SESSION["suc"]); endif; ?>

                            <form action=" " method="POST">

                                <div class="mb-3">
                                    <label for="username" class="form-label">Tài khoản</label>
                                    <input class="form-control" type="text" id="username" name="username" required="" value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"]; } ?>" placeholder="Nhập tài khoản">
                                </div>

                                <div class="mb-3">
                                    <a href="forget-password" class="text-muted float-end"><small>Quên mật khẩu?</small></a>
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"]; } ?>" placeholder="Nhập mật khẩu">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="checkbox-signin" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Nhớ đăng nhập</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit" name="submit"> Đăng nhập </button>
                                </div>

                            </form>
                        </div>
                    </div>



                </div>
            </div>

        </div>

    </div>

    <footer class="footer footer-alt">
        2022 - <script>
            document.write(new Date().getFullYear())
        </script> © Dormitory Manager System
    </footer>

    <!-- bundle -->
    <script src="<?= _WEB_ROOT ?>/public/js/vendor.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/js/app.min.js"></script>

</body>

</html>