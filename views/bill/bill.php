<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Hóa đơn điền nước theo phòng</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-xl-8">
                        <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                            <div class="col-auto">
                                <label for="inputPassword2" class="visually-hidden">Tìm kiếm</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Tìm kiếm...">
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <label for="status-select" class="me-2">Trạng thái</label>
                                    <select class="form-select" id="status-select">
                                        <option selected>Chọn...</option>
                                        <option value="1">Đã thanh toán</option>
                                        <option value="2">Chưa thanh toán</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Mã hóa đơn</th>
                                <th>Ngày</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <!-- <th>Phương thức thanh toán</th> -->
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['bills'] as $bill) {
                                $tienDien = 0;
                                $tienNuoc = 0;
                                $tienDien = ($bill['e_last'] - $bill['e_first']) * $bill['price_per_e'];
                                $tienNuoc = ($bill['w_last'] - $bill['w_first']) * $bill['price_per_w'];
                            ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck2">
                                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td><a href="apps-ecommerce-orders-details.html" class="text-body fw-bold"><?= $bill['id'] ?></a> </td>
                                    <td>
                                        <?= $this->formatDate($bill['start_date']) ?>
                                    </td>
                                    <td>
                                        <?= number_format($tienDien + $tienNuoc) ?> VNĐ
                                    </td>
                                    <td>
                                        <h5><?php if ($bill['status'] == 1) { ?>
                                                <span class="badge badge-success-lighten">
                                                    <i class="mdi mdi-bitcoin"></i> Đã thanh toán
                                                </span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger-lighten">
                                                    <i class="mdi mdi-bitcoin"></i> Chưa thanh toán
                                                </span>
                                            <?php } ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <div class="text-sm-end">
                                        <?php if ($bill['status'] == 1) { ?>
                                            <a href="javascript:void(0);" class=" btn btn-success">
                                                 Xem </a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0);" class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#centermodal<?= $bill["id"]; ?>">
                                                <i class="mdi mdi-cash-multiple me-1"></i> Thanh toán ngay </a>
                                            <?php } ?>
                                            
                                        </div>

                                        <div class="modal fade" id="centermodal<?= $bill["id"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myCenterModalLabel<?= $bill["id"]; ?>">Chọn phương thức thanh toán</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <div class="card text-center">
                                                        <div class="modal-body">
                                                            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="">

                                                                <div class="border p-3 mb-3 rounded">
                                                                    <div class="row">
                                                                        <div class="col-sm-8">
                                                                            <div class="form-check">
                                                                                <input type="radio" id="BillingOptRadio2<?= $bill["id"]; ?>" value="paypal" name="billingOptions" class="options form-check-input" checked>
                                                                                <label class="form-check-label font-16 fw-bold" for="BillingOptRadio2">Thanh toán với Paypal</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 text-sm-end mt-3 mt-sm-0">
                                                                            <img src="<?= _WEB_ROOT ?>/public/image/payments/paypal.png" height="25" alt="paypal-img">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="border p-3 mb-3 rounded">
                                                                    <div class="row">
                                                                        <div class="col-sm-8">
                                                                            <div class="form-check">
                                                                                <input type="radio" id="BillingOptRadio3<?= $bill["id"]; ?>" name="billingOptions" value="momo" class="options form-check-input">
                                                                                <label class="form-check-label font-16 fw-bold" for="BillingOptRadio3">Thanh toán với Momo</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 text-sm-end mt-3 mt-sm-0">
                                                                            <img src="<?= _WEB_ROOT ?>/public/image/payments/momo.png" height="30" alt="paypal-img">
                                                                        </div>

                                                                    </div>
                                                                    <div class=" method-pay">
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio"  name="payment-momo" value="qrmomo" class="form-check-input payment1" checked>
                                                                            <label class="form-check-label" for="payment1">Mã QR code</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio"  name="payment-momo" value="atmmomo" class="form-check-input payment2">
                                                                            <label class="form-check-label" for="payment2">ATM Momo</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="border p-3 mb-3 rounded">
                                                                    <div class="row">
                                                                        <div class="col-sm-8">
                                                                            <div class="form-check">
                                                                                <input type="radio" id="BillingOptRadio2<?= $bill["id"]; ?>" value="paypal" name="billingOptions" class="form-check-input">
                                                                                <label class="form-check-label font-16 fw-bold" for="BillingOptRadio2">Tiền mặt</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-4">
                                                                    <div class="col-sm-6">
                                                                        <div class="text-sm-end">
                                                                            <button class="btn btn-danger" type="submit" name="payment">
                                                                                <i class="mdi mdi-cash-multiple me-1"></i> Thanh toán </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
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
    </div>
</div>
<script type="text/javascript">
    $(".options").on('click', function(){
        var methodPay = $(this).parent().parent().parent().parent(".rounded").find(".method-pay");
        if ($(this).val() == 'momo') {
            methodPay.addClass("show");
        }else{
            methodPay.removeClass("show");
        }
        if($(this).val() == 'paypal'){
            $(".method-pay").removeClass("show");
        }
    })
</script>
<style>
    .method-pay {
        display: none;
    }

    .show {
        display: block !important;
    }
    
</style>