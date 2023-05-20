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
    <script src="<?= _WEB_ROOT ?>/public/js/jquery-3.6.1.min.js"></script>
</head>

<body>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-lg-5">
                    <div class="card-body card">

                        <h4 class="header-title mb-3">Quên mật khẩu</h4>

                        
                        <form action="" method="POST" id="resetpass">
                            <div id="basicwizard">

                                <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                    <li class="nav-item" class="basictab1">
                                        <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab" class="nav-link nav-link1 rounded-0 pt-2 pb-2 ">
                                            <i class="mdi mdi-account-circle me-1"></i>
                                            <span class="d-none d-sm-inline">Xác thực</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane" id="basictab1" class="basictab1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="email" name="email" class="form-control ">
                                                        <div class="invalid-feedback">
                                                            Email không tồn tại vui lòng nhập lại
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane" id="basictab2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password"> Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="password" name="password" class="form-control" value="123456789">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-md-3 col-form-label" for="confirm">Re Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="confirm" name="confirm" class="form-control" value="123456789">
                                                    </div>
                                                </div>


                                            </div>
                                        </div> 
                                    </div> -->
                                    <ul class="list-inline wizard mb-0">
                                        <li class="next  list-inline-item float-end">
                                            <button type="submit" name="submit" class="btn btn-info btn-next">Xác thực</button>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </form>

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
    <script src="<?= _WEB_ROOT ?>/public/js/pages/demo.form-wizard.js"></script>

    <script>
        $(document).ready(function() {
            var email = $("#email").val();
            if (email == '') {
                $("#resetpass").attr("onsubmit", "return false");
            }
            $("#email").on("change", function() {
                $.ajax({
                    type: 'POST',
                    url: window.location.href,
                    data: {
                        email: $("#email").val(),
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#email").addClass("form-err");
                            $(".invalid-feedback").addClass("d-block");
                            $("#resetpass").attr("onsubmit", "return false");
                        } else {
                            $("#email").removeClass("form-err");
                            $(".invalid-feedback").removeClass("d-block");
                            $("#resetpass").attr("onsubmit", "");
                            // $(".basictab1").addClass("d-none");
                        }
                    }

                })
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

        .d-none{
            display: none !important;
        }
    </style>
</body>

</html>