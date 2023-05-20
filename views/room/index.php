<div class="row">
    <div class="card d-block">
        <?php if (empty($data["room"]["id"])) { ?>
            <div class="d-flex justify-content-center flex-column text-center align-items-center">
                <h2>Không có thông tin phòng</h2>
                <button type="button" class="btn btn-primary">Yêu cầu vào phòng</button>
            </div>
        <?php } else { ?>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="">Tên Phòng: <?= $data["room"]["room_name"] ?></h4>
                </div>
                <?php if ($data["room"]["status"] == 0) { ?>
                    <div class="badge bg-secondary text-light mb-3">Bảo trì</div>
                <?php } else { ?>
                    <div class="badge bg-success text-light mb-3">Hoạt động</div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h5>Người quản lý:</h5>
                            <p><?= $data["room"]["name"] ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h5>Số lượng người tối đa:</h5>
                            <p><?= $data["room"]["max_num"] ?> người</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h5>Giá tiền phòng chung / 1 tháng:</h5>
                            <p><?= number_format($data["room"]["price"]) ?> VND</p>
                        </div>
                    </div>
                </div>

                <div class=" align-items-center mb-2">
                    <h4 class="header-title">Thành viên phòng:</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <?php foreach ($data["students"] as $student) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <img class="me-2 rounded-circle avatar-sm" src="<?= _WEB_ROOT ?>/public/avatar/<?= $student["avatar_url"] ?>" width="40" alt="Generic placeholder image">
                                                <div>
                                                    <h5 class="mt-0 mb-1"><?= $student["name"]; ?></h5>
                                                    <span class="font-13">Ngày vào: <?= $this->formatDate($student["date_start"]) ?></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>