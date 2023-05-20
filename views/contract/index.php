<?php if (empty($data["student"]["id"])) { ?>
    <p>Không có thông tin hợp đồng, hãy đăng ký</p>
<?php } else { ?>
    <div class="row mt-4">
        <div class="d-print-none mb-3">
            <div class="text-end">
                <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> In</a>
            </div>
        </div>
        <div class="card d-flex ">
            <div class="card-body">
                <table class="contract-word">
                    <tr>
                        <td class=" text-center">
                            <p> <strong> ĐẠI HỌC TÀI NGUYÊN VÀ MÔI TRƯỜNG HÀ NỘI </strong></p>
                            <p><strong>Số: <?= $data['contract']['contract_id'] ?>/HĐ thuê chỗ ở KTX</strong></p>
                            <p><strong>Năm học 2020 -2022</strong></p>
                        </td>
                        <td class=" text-center">
                            <p><strong> CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </strong></p>
                            <p><strong> Độc lập - Tự do - Hạnh phúc</strong></p>
                            <p><strong> Hà Nội, ngày <?= date('d') ?> tháng <?= date('m') ?> năm <?= date('Y') ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class=" text-center">
                            <p><strong>HỢP ĐỒNG THUÊ CHỖ Ở NỘI TRÚ</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="my-0"><strong>BÊN CHO THUÊ (Bên A): TRƯỜNG ĐẠI HỌC TÀI NGUYÊN VÀ MÔI TRƯỜNG HÀ NỘI</strong></p>
                            <p class="my-0">Đại diện: <?= $data['contract']['name'] ?></p>
                            <p class="my-0">Chức vụ: Trưởng phòng Công tác sinh viên</p>
                            <p class="my-0">Số điện thoại: <?= $data['contract']['phone'] ?></p>
                            <p class="my-0">Email: <?= $data['contract']['email'] ?></p>
                            <br>
                            <p class="my-0"><strong>BÊN THUÊ CHỖ Ở (Bên B):</strong></p>
                            <p class="my-0">Họ và tên: <?= $data['student']['name'] ?></p>
                            <p class="my-0">Nam/ Nữ: <?= $data['student']['sex'] == 0 ? "Nam" : "Nữ"; ?></p>
                            <p class="my-0">Sinh ngày: <?= $this->formatDate($data['student']['date_birth']) ?></p>
                            <p class="my-0">Mã sinh viên: <?= $data['student']['username'] ?></p>
                            <br>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Bên A được sự ủy quyền của Hiệu trưởng Trường Đại học Tài Nguyên và Môi Trường Hà Nội,
                                cùng Bên B thống nhất ký kết Hợp đồng cho thuê chỗ ở nội trú tại Ký túc xá cơ sở 1 (KTX)
                                Trường Đại học Tài Nguyên và Môi Trường Hà Nội với các nội dung sau:
                            </p>
                            <p class="my-0"><strong>Điều 1:</strong></p>
                            <p class="my-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Bên A đồng ý cho Bên B thuê 01 chỗ ở nội trú tại Phòng số: 5 Ký túc xá Cơ sở 1 Trường Đại học Tài Nguyên và Môi Trường Hà Nội.
                            </p>
                            <p class="my-0">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Bên B được phép sử dụng các tài sản do nhà trường trang bị tại phòng ở theo các quy định và nội quy KTX Trường Đại học Tài Nguyên và Môi Trường Hà Nội.
                            </p>

                            <p class="my-0"><strong>Điều 2: Giá cả, thời gian và phương thức thanh toán.</strong></p>
                            <p class="my-0"><strong>a)</strong>Đơn giá cho thuê: <?= number_format($data['contract']['price']) ?> VND/tháng. </p>
                            <p class="my-0"><strong>b)</strong>Thời gian cho thuê từ ngày <?= $this->formatDate($data['contract']['date_start']) ?> đến ngày<?= $this->formatDate($data['contract']['date_end']) ?>. </p>
                            <p class="my-0"><strong>c)</strong>Phương thức thanh toán: Bên B thanh toán cho Bên A tiền thuê chỗ ở nội trú bằng tiền mặt. </p>
                            <p class="my-0"><strong>d)</strong>Tiền điện và tiền nước: Bên B thanh toán theo số thực tế sử dụng (chỉ số côngtơ), theo giá quy định chung của nhà trường. </p>

                            <p class="my-0"><strong>Điều 3: Hợp đồng chấm dứt hiệu lực khi:.</strong></p>
                            <p class="my-0"><strong>a)</strong>Thời hạn thuê chỗ ở KTX ghi trong hợp đồng kết thúc. </p>
                            <p class="my-0"><strong>b)</strong>Bên B có đơn đề nghị chấm dứt hợp đồng trước thời hạn. </p>
                            <p class="my-0"><strong>c)</strong>Bên B không còn là sinh viên của trường: đã tốt nghiệp, bị đình chỉ học tập, bị đuổi học hoặc tự ý bỏ học. </p>
                            <p class="my-0"><strong>d)</strong>Bên B không đảm bảo về sức khỏe, mắc các chứng bệnh về lây nhiễm theo kết luận của cơ quan y tế cấp quận (huyện) trở lên. </p>
                            <p class="my-0"><strong>e)</strong>Bên B vi phạm Nội quy KTX, bị xử lý kỷ luật theo khung kỷ luật ban hành mức chấm dứt hợp đồng cho ra khỏi KTX. </p>
                            <p><strong>Bên A không có trách nhiệm hoàn trả tiền cho bên B trong các trường hợp chấm dứt hợp đồng nội trú tại các điểm b,c,d,e.</strong></p>

                        </td>
                    </tr>
                    <tr>
                        <td class=" text-center">
                            <p class="my-0"><strong>Bên B</strong></p>
                            <p>(Ký và ghi rõ họ tên)</p>
                            <p><?= $data['contract']['name'] ?></p>
                        </td>
                        <td class=" text-center">
                            <p class="my-0"><strong>Bên A</strong></p>
                            <p>(Ký và ghi rõ họ tên)</p>
                            <p><?= $data['student']['name'] ?></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<style>
    .contract-word {
        width: 100%;
        font-size: 14px;
        font-family: "Times New Roman", serif;
    }
</style>