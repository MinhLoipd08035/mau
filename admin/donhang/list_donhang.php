<style>
    .admin_donhang {
        background-color: #007bff;
        color: #fff;
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .admin_donhang:hover {
        background-color: #0056b3;
    }

    .benthu3 {
        background-color: #28a745;
        color: #fff;
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .benthu3:hover {
        background-color: #218838;
    }
</style>
<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH ĐƠN HÀNG</h1>
    <div class="admin__list-table">
        <table class="admin__table">
            <tr>
                <th>STT</th>
                <th>MÃ ĐƠN HÀNG</th>
                <th>PHƯƠNG THỨC</th>
                <th>NGÀY ĐẶT HÀNG</th>
                <th>TỔNG TIỀN (VND)</th>
                <th>TRẠNG THÁI</th>
                <th>CẬP NHẬT TRẠNG THÁI</th>
                <th></th>
            </tr>
            <?php $soThuTu = 1; ?>
            <?php foreach ($list_donhang as $donhang) {
                extract($donhang);
                $xemthem_donhang = "index.php?act=xemthem_donhang&id=" . $donhang["id"];
                // $ten_loaisp= layTenLoaiBangMaLoai($donhang['ma_loai']);
                $trang_thai_donhang = layTrangThaiDonHang($donhang['trang_thai_don_hang']);
            ?>
                <tr>
                    <td><?php echo $soThuTu; ?></td>
                    <td>NTML-00<?php echo $donhang['id']; ?></td>
                    <td><?php echo ($donhang['phuong_thuc'] == 0) ? 'Thanh toán khi nhận hàng' : 'Thanh toán chuyển khoản'; ?></td>
                    <td><?php echo $donhang['ngay_dathang']; ?></td>
                    <td><?php echo $donhang['tong_tatca']; ?></td>
                    <td><?php echo $trang_thai_donhang; ?></td>
                    <td>
                        <?php if ($donhang['trang_thai_don_hang'] == 0) : ?>
                            <form action="index.php?act=xac_nhan" method="post">
                                <input type="hidden" name="id" value="<?= $donhang["id"] ?>">
                                <input class="admin_donhang" type="submit" onclick="xacnhanDonHang()" value="Xác nhận" name="xac_nhan_donhang">
                            </form>
                        <?php elseif ($donhang['trang_thai_don_hang'] == 1) : ?>
                            <form action="index.php?act=van_chuyen" method="post">
                                <input type="hidden" name="id" value="<?= $donhang["id"] ?>">
                                <input class="benthu3" type="submit" onclick="vanchuyenDonHang()" value="Giao bên vận chuyển" name="ben_thu3">
                            </form>
                        <?php endif; ?>
                    </td>
                    <td><a href="<?php echo $xemthem_donhang; ?>">Xem thêm</a></td>
                </tr>
                <?php $soThuTu++; ?>
            <?php } ?>
        </table>
        <script>
            function xacnhanDonHang() {
                alert("Đã xác nhận đơn hàng.");
            }

            function vanchuyenDonHang() {
                alert("Đã giao bên vận chuyển.");
            }
        </script>
    </div>
</div>