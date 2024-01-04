<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH KHÁCH HÀNG</h1>
    <div class="admin__list-table">
        <table class="admin__table">
            <tr>
                <th></th>
                <th>STT</th>
                <th>TÊN KHÁCH HÀNG</th>
                <th>TÊN ĐĂNG NHẬP</th>
                <th>TRẠNG THÁI</th>
                <th>HÌNH ẢNH</th>
                <th>EMAIL</th>
                <th>VAI TRÒ</th>
                <th></th>
            </tr>

            <?php $soThuTu = 1; ?>
            <?php foreach ($result as $khachhang) {
                extract($khachhang);
                $sua_khachhang = "index.php?act=sua_khachhang&id=" . $khachhang["ma_kh"];
                if (is_file("../upload/" . $hinh)) {
                    $hinhxuat = "<img src='../upload/" . $hinh . "' width='80'>";
                } else {
                    $hinhxuat = "no photo";
                }
            ?>
                <tr>
                    <td><input type="checkbox" name=""></td>
                    <td><?php echo $soThuTu; ?></td>
                    <td><?php echo $khachhang['ho_ten']; ?></td>
                    <td><?php echo $khachhang['ma_kh']; ?></td>
                    <td><?php echo $khachhang['kich_hoat'] == 0 ? 'Kích hoạt' : 'Block'; ?></td>
                    <td><?php echo $hinhxuat; ?></td>
                    <td><?php echo $khachhang['email']; ?></td>
                    <td><?php echo $khachhang['vai_tro'] == 0 ? 'Khách hàng' : 'Admin'; ?></td>
                    <td>
                        <a href="<?php echo $sua_khachhang; ?>" class="admin__edit-button">Sửa</a>
                    </td>
                </tr>
                <?php $soThuTu++; ?>
            <?php } ?>
        </table>

    </div>
    <div class="admin__list-buttons">
        <input type="button" value="Chọn tất cả" class="admin__button">
        <input type="button" value="Bỏ chọn tất cả" class="admin__button">
        <input type="button" value="Xóa các mục đã chọn" class="admin__button">
        <a href="index.php?act=khachhang" class="admin__button-link"><input type="button" value="Nhập thêm" class="admin__button"></a>
    </div>
</div>