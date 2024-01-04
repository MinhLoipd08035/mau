<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<?php
if (is_array($result)) {
    extract($result);
    $ma_loaisp = $ma_loai;
    if (is_file("../upload/" . $hinh)) {
        $hinhxuat = "<img src='../upload/" . $hinh . "' width='80'>";
    } else {
        $hinh = "no photo";
    }
}
?>
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">CẬP NHẬT SẢN PHẨM</h1>
        <form action="index.php?act=capnhatsanpham" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="malh_bottom" class="form-label">Loại:</label>
                <select name="ma_loai" class="form-input" required>
                    <option value="" selected>Loại hàng</option>
                    <?php
                    foreach ($result1 as $loai_hang) {
                        extract($loai_hang);
                        if ($ma_loaisp == $ma_loai) {
                            echo '<option selected value="' . $ma_loai . '" >' . $ten_loai . '</option>';
                        } else {
                            echo '<option value="' . $ma_loai . '" >' . $ten_loai . '</option>';
                        }
                    }
                    ?>
                </select>
                <!-- <input type="text" id="malh_bottom" name="ma_loai" class="form-input"> -->
                <span class="form-error"><?php echo isset($loi["loi2"]) ? $loi["loi2"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Tên Sản Phẩm:</label>
                <input type="text" id="tenlh_bottom" name="ten_hh" class="form-input" value="<?php if (isset($ten_hh) && ($ten_hh != '')) echo $ten_hh; ?>">
                <span class="form-error"><?php echo isset($loi["loi2"]) ? $loi["loi2"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Đơn Giá:</label>
                <input type="number" id="tenlh_bottom" name="don_gia" class="form-input" value="<?php if (isset($don_gia) && ($don_gia != '')) echo $don_gia; ?>" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Giảm Giá (%):</label>
                <input type="number" id="tenlh_bottom" name="giam_gia" max="100" min="0" value="<?php if (isset($giam_gia) && ($giam_gia != '')) echo $giam_gia; ?>" class="form-input">
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Hình Ảnh Sản Phẩm:</label>
                <input type="file" id="tenlh_bottom" name="hinh" class="form-input">
                <label class="form-label"><?php echo $hinhxuat; ?></label>
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Hình Ảnh Mô Tả:</label>
                <input type="file" id="tenlh_bottom" name="hinhmota[]" class="form-input" multiple="multiple">
                <?php
                // Kiểm tra nếu có hình ảnh chi tiết
                $hinhchitiet = layHinhChiTietBangMaHang($ma_hh);
                if (!empty($hinhchitiet)) {
                    echo '<label class="form-label">';
                    foreach ($hinhchitiet as $hinh) {
                        echo '<img src="../upload/' . $hinh['hinh_chi_tiet'] . '" alt="Hình ảnh chi tiết" width="80" style="margin: 5px;">';
                    }
                    echo '</label>';
                } else {
                    echo "Không có hình ảnh chi tiết cho mã hàng hóa '$ma_hh'.";
                }
                ?>
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Mô Tả:</label>
                <textarea type="text" id="editor1" name="mo_ta" class="form-input"><?php if (isset($mo_ta) && ($mo_ta != '')) echo $mo_ta; ?></textarea>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Thông Tin Sản Phẩm:</label>
                <textarea id="editor" name="thongtinsp" class="form-input"><?php if (isset($thong_tin_hh) && ($thong_tin_hh != '')) echo $thong_tin_hh; ?></textarea>
            </div>
            <span> <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?></span> <br>
            <input type="hidden" name="id" value="<?php echo $ma_hh; ?>">
            <input type="submit" name="capnhatsanpham" class="form-button" value="Cập nhật thông tin">
            <input type="reset" value="Nhập lại" class="form-button-reset">
        </form>
        <p><a href="index.php?act=listsanpham" class="form-link">Xem danh sách Sản Phẩm</a></p>
    </div>
</main>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });
</script>