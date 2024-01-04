<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH BÌNH LUẬN</h1>
    <div class="admin__list-table">
        <?php if (!empty($list_binhluan)) : ?>
            <table class="admin__table">
                <tr>
                    <th></th>
                    <th>STT</th>
                    <th>MÃ BÌNH LUẬN</th>
                    <th>MÃ SẢN PHẨM</th>
                    <th>NỘI DUNG</th>
                    <th>TÊN KHÁCH HÀNG</th>
                    <th>NGÀY BÌNH LUẬN</th>
                    <th></th>
                </tr>

                <?php $soThuTu = 1; ?>
                <?php foreach ($list_binhluan as $binhluan) {
                    extract($binhluan);
                    $xoa_binhluan = "index.php?act=xoa_binhluan&id=" . $binhluan["ma_bl"];
                ?>
                    <tr>
                        <td><input type="checkbox" name=""></td>
                        <td><?php echo $soThuTu; ?></td>
                        <td><?php echo $binhluan['ma_bl']; ?></td>
                        <td><?php echo $binhluan['ma_hh']; ?></td>
                        <td class="canlai"><?php echo $binhluan['noi_dung']; ?></td>
                        <td><?php echo $binhluan['ten_kh']; ?></td>
                        <td><?php echo $binhluan['ngay_bl']; ?></td>
                        <td>
                            <a href="<?php echo $xoa_binhluan; ?>" class="admin__delete-button">Xóa</a>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu bình luận.</p>
        <?php endif; ?>
    </div>
    <div class="admin__list-buttons">
        <input type="button" value="Chọn tất cả" class="admin__button">
        <input type="button" value="Bỏ chọn tất cả" class="admin__button">
        <input type="button" value="Xóa các mục đã chọn" class="admin__button">
    </div>
</div>