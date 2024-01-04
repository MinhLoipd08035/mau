<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">THÊM SẢN PHẨM</h1>
        <form action="index.php?act=addsanpham" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="malh_bottom" class="form-label">Loại:</label>
                <select name="ma_loai" class="form-input" required>
                    <option value="" selected>Loại hàng</option>
                    <?php
                    foreach ($result as $loai_hang) {
                        extract($loai_hang);
                        echo '<option value="' . $ma_loai . '" >' . $ten_loai . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Tên Sản Phẩm:</label>
                <input type="text" id="tenlh_bottom" name="ten_hh" class="form-input" required>
                <span class="form-error"><?php echo isset($loi["loi2"]) ? $loi["loi2"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Đơn Giá:</label>
                <input type="number" id="tenlh_bottom" name="don_gia" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Giảm Giá (%):</label>
                <input type="number" id="tenlh_bottom" name="giam_gia" max="100" min="0" value="0" class="form-input">
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Hình Ảnh Sản Phẩm:</label>
                <input type="file" id="tenlh_bottom" name="hinh" class="form-input">
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Hình Ảnh Mô Tả:</label>
                <input type="file" id="tenlh_bottom" name="hinhmota[]" class="form-input" multiple="multiple">
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Mô Tả:</label>
                <textarea type="text" id="thu2" name="mota" class="form-input"></textarea>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Thông Tin Sản Phẩm:</label>
                <textarea id="editor" name="thongtinsp" class="form-input"></textarea>
            </div>
            <span> <?php
                    if (isset($id_sanpham_moi) && ($id_sanpham_moi != "")) {
                        echo $id_sanpham_moi;
                    }
                    ?></span> <br>
            <input type="submit" name="addsanpham" class="form-button" value="Lưu thông tin">

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
        .create(document.querySelector('#thu2'))
        .catch(error => {
            console.error(error);
        });
</script>