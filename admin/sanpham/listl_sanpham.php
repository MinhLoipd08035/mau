<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH SẢN PHẨM</h1>
    <div class="admin__list-table">
        <form action="index.php?act=listsanpham" method="post">
            <input type="text" name="timloc">
        <select name="sapxep" class="" required>
            <option value="0" selected>tất cả</option>
            <?php
            foreach ($result_loaihang as $loai_hang) {
                extract($loai_hang);
                echo '<option value="' . $ma_loai . '" >' . $ten_loai . '</option>';
            }
            ?>
        </select> <input type="submit" name="locsp" value="Lọc"></form>
        <table class="admin__table">
            <tr>
                <th></th>
                <th>STT</th>
                <th>TÊN LOẠI HÀNG</th>
                <th>TÊN SẢN PHẨM</th>
                <th>MÃ SẢN PHẨM</th>
                <th>HÌNH ẢNH</th>
                <th>GIÁ GỐC</th>
                <th>GIẢM GIÁ (%)</th>
                <th>GIÁ</th>
                <th>LƯỢT XEM</th>
                <th></th>
            </tr>
            <?php $soThuTu = 1; ?>
            <?php foreach ($result as $sanpham) {
                extract($sanpham);
                $sua_sanpham = "index.php?act=sua_sanpham&id=" . $sanpham["ma_hh"];
                $xoa_sanpham = "index.php?act=xoa_sanpham&id=" . $sanpham["ma_hh"];
                if (is_file("../upload/".$hinh)) {
                    $hinhxuat = "<img src='../upload/" . $hinh . "' width='80'>";
                } else {
                    $hinhxuat = "no photo";
                }
                $ten_loaisp= layTenLoaiBangMaLoai($sanpham['ma_loai']);
            ?>
                <tr>
                    <td><input type="checkbox" name=""></td>
                    <td><?php echo $soThuTu; ?></td>
                    <td><?php if (isset($ten_loaisp) && ($ten_loaisp != '')) echo $ten_loaisp; ?></td>
                    <td class="canchodeo"><?php echo $sanpham['ten_hh']; ?></td>
                    <td><?php echo $sanpham['ma_hh']; ?></td>
                    <td><?php echo $hinhxuat; ?></td>
                    <td><?php echo $sanpham['don_gia']; ?></td>
                    <td><?php echo $sanpham['giam_gia']; ?></td>
                    <td><?php echo $sanpham['con_hh']; ?></td>
                    <td><?php echo $sanpham['so_luot_xem']; ?></td>
                    <td>
                        <a href="<?php echo $sua_sanpham; ?>" class="admin__edit-button">Sửa</a>
                        <a href="<?php echo $xoa_sanpham; ?>" class="admin__delete-button">Xóa</a>
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
        <a href="index.php?act=sanpham" class="admin__button-link"><input type="button" value="Nhập thêm" class="admin__button"></a>
    </div>
</div>