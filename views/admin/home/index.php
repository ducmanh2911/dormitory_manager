<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Trang chủ</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12 col-lg-12">

        <div class="side-nav-title side-nav-item">Số liệu sinh viên</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Tổng số sinh viên</h5>
                            <h3 class="mt-3 mb-3"><?php echo count($data['students']); ?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-calendar-remove widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Sinh viên hết hạn</h5>
                            <h3 class="mt-3 mb-3"><?php echo count($data['students_end']); ?></h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>

       
        <div class="side-nav-title side-nav-item">Số liệu phòng</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Tổng số phòng</h5>
                            <h3 class="mt-3 mb-3"><?php echo count($data['rooms']); ?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home-remove widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Số phòng trống</h5>
                            <h3 class="mt-3 mb-3"><?php $dem = 0; foreach($data['checkStudent'] as $value){if($value['count'] == 0){ $dem++;}} echo $dem;?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Phòng chưa ghép đủ </h5>
                            <h3 class="mt-3 mb-3"><?php echo count($data['checkStudent'])-$dem; ?></h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="side-nav-title side-nav-item">Số liệu người dùng</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Tổng số người dùng</h5>
                            <h3 class="mt-3 mb-3"><?php echo count($data['users']); ?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home-remove widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Số tài khoản bị khóa</h5>
                            <h3 class="mt-3 mb-3"><?php $dem1 = 0; foreach($data['users'] as $value){if($value['status'] == 0){ $dem1++;}} echo $dem1;?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Số tài khoản hoạt động</h5>
                            <h3 class="mt-3 mb-3"><?php echo count($data['users'])-$dem1; ?></h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>