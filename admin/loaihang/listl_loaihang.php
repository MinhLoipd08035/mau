<div class="form-container1">
    <h1 class="admin__list-title">DANH SÁCH LOẠI HÀNG</h1>
    <div class="admin__list-table">
        <?php if (!empty($result)) : ?>
            <table class="admin__table">
                <tr>
                    <th></th>
                    <th>STT</th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>

                <?php $soThuTu = 1; ?>
                <?php foreach ($result as $loaihang) {
                    extract($loaihang);
                    $sua_loaihang = "index.php?act=sua_loaihang&id=" . $loaihang["ma_loai"];
                    $xoa_loaihang = "index.php?act=xoa_loaihang&id=" . $loaihang["ma_loai"];
                ?>
                    <tr>
                        <td><input type="checkbox" name=""></td>
                        <td><?php echo $soThuTu; ?></td>
                        <td><?php echo $loaihang['ma_loai']; ?></td>
                        <td><?php echo $loaihang['ten_loai']; ?></td>
                        <td>
                            <a href="<?php echo $sua_loaihang; ?>" class="admin__edit-button">Sửa</a>
                            <a href="<?php echo $xoa_loaihang; ?>" class="admin__delete-button">Xóa</a>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu loại hàng.</p>
        <?php endif; ?>
    </div>
    <div class="admin__list-buttons">
        <input type="button" value="Chọn tất cả" class="admin__button">
        <input type="button" value="Bỏ chọn tất cả" class="admin__button">
        <input type="button" value="Xóa các mục đã chọn" class="admin__button">
        <a href="index.php?act=name" class="admin__button-link"><input type="button" value="Nhập thêm" class="admin__button"></a>
    </div>
</div>