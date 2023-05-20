<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/layouts-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jul 2022 02:25:15 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Quản lý ký túc xá</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= _WEB_ROOT ?>/public/image/logo/logo_icon.png">

    <!-- App css -->
    <link href="<?= _WEB_ROOT ?>/public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= _WEB_ROOT ?>/public/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="<?= _WEB_ROOT ?>/public/css/main.css" rel="stylesheet" type="text/css" />
    <script src="<?= _WEB_ROOT ?>/public/js/jquery-3.6.1.min.js"></script>

</head>

<body class="loading" data-layout-color="<?= $_SESSION['login']['color_scheme'] == 1 ? "dark" : "light" ; ?>" data-layout="topnav" data-layout-mode="fluid" >
    <!-- Begin page -->
    <div class="wrapper">


        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom topnav-navbar">
                    <?php
                    include "topbar.php";
                    ?>
                </div>
                <!-- end Topbar -->

                <div class="topnav">
                    <div class="container-fluid">
                        <?php
                        include "topnav.php";
                        ?>
                    </div>
                </div>


                <!-- Start Content-->
                <div class="container-fluid">

                    <?php
                    if (isset($view)) {
                        include $view;
                    }
                    ?>


                </div>


            </div>



            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Xin tí code
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">Về chúng tôi</a>
                                <a href="javascript: void(0);">Hỗ trợ</a>
                                <a href="javascript: void(0);">Liên hệ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>


    </div>


    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="<?= _WEB_ROOT ?>/public/js/vendor.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/js/app.min.js"></script>


</body>

</html>