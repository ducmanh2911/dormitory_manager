<div class="container-fluid">

    <!-- LOGO -->
    <a href="<?php _WEB_ROOT ?>" class="topnav-logo" style="">
        <span class="topnav-logo-lg">
            <h2>PTIT</h2>
            <!-- <img src="assets/images/logo.png" alt="" height="16"> -->
        </span>
        <span class="topnav-logo-sm">
            <h4>PTIT</h4>
            <!-- <img src="assets/images/logo_sm.png" alt="" height="16"> -->
        </span>
    </a>

    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list" style="line-height: 70px;">

            <input hidden class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check">
            <label class="form-check-label light-btn  <?= $_SESSION['login']['color_scheme'] == 0 ? "d-none" : ""; ?>" for="light-mode-check"><i style="font-size: 25px;" class="mdi mdi-weather-night"></i></label>
            <input hidden class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
            <label class="form-check-label dark-btn <?= $_SESSION['login']['color_scheme'] == 1 ? "d-none" : ""; ?> " for="dark-mode-check"><i style="font-size: 25px;" class="mdi mdi-weather-sunny"></i></label>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">

                <!-- item-->
                <div class="dropdown-item noti-title px-3">
                    <h5 class="m-0">
                        <span class="float-end">
                            <a href="javascript: void(0);" class="text-dark">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="px-3" style="max-height: 300px;" data-simplebar>

                    <h5 class="text-muted font-13 fw-normal mt-0">Today</h5>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp <small class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Admin <small class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                    <small class="noti-item-subtitle text-muted">New user registered</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon">
                                        <!-- <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> -->
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                    <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon">
                                        <!-- <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> -->
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                    <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome design</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="text-center">
                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                    </div>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                    View All
                </a>

            </div>
        </li>




        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="<?= _WEB_ROOT ?>/public/avatar/<?= $_SESSION["login"]["avatar_url"]; ?>" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name"><?= $_SESSION["login"]["name"]; ?></span>
                    <span class="account-position">Học sinh khá</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Đang làm việc !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>Thông tin cá nhân</span>
                </a>


                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lifebuoy me-1"></i>
                    <span>Hỗ trợ</span>
                </a>

                <!-- item-->
                <a href="<?= _WEB_ROOT; ?>/admin/user/logout" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Đăng xuất</span>
                </a>

            </div>
        </li>

    </ul>


</div>
<script>
    var valBg = 1;
    $(".light-btn").on("click", function() {
        valBg = $("#light-mode-check").val()
        $(".light").prop("checked",false);
        $(".light-btn").addClass("d-none");
        $(".dark-btn").removeClass("d-none");
        changeBgColor(valBg);
    })

    $(".dark-btn").on("click", function() {
        valBg = $("#dark-mode-check").val()
        $(".dark").prop("checked",false);
        $(".dark-btn").addClass("d-none");
        $(".light-btn").removeClass("d-none");
        changeBgColor(valBg);
    })

    function changeBgColor(valBg){
        $.ajax({
            type: 'POST',
            url: 'http://localhost/dormitory_manager/home/index',
            data: {
                valBg: valBg,
            },
            success: function(data) {
                console.log("Lương Văn Hòa");
                console.log(data);
            }
    
        })
    }

</script>