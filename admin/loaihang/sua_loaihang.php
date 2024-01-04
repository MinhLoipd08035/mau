<?php
if(is_array($result)){
    extract($result);
}
?>
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">CẬP NHẬT LOẠI HÀNG</h1>
        <form action="index.php?act=capnhatloaihang" method="POST" class="update-loai-hang-form">
            <div class="form-group">
                <label for="malh" class="form-label">Mã loại hàng:</label>
                <input type="text" id="malh" name="ma_lh" class="form-input" value="<?php if(isset($ma_loai)&&($ma_loai!='')) echo $ma_loai; ?>">
                <span class="form-error"><?php echo isset($loi["loi1"]) ? $loi["loi1"] : "" ?></span>
            </div>

            <div class="form-group">
                <label for="tenlh" class="form-label">Tên loại hàng:</label>
                <input type="text" id="tenlh" name="ten_lh" class="form-input" value="<?php if(isset($ten_loai)&&($ten_loai!='')) echo $ten_loai; ?>">
                <span class="form-error"><?php echo isset($loi["loi2"]) ? $loi["loi2"] : "" ?></span>
            </div>

            <input type="hidden" name="id" value="<?php echo $ma_loai; ?>">
            <input type="submit" name="capnhatloaihang" class="form-button" value="Cập nhật thông tin">
            <input type="reset" value="Nhập lại" class="form-button-reset">
        </form>
        
        <p><a href="index.php?act=listdanhmuc" class="form-link">Xem danh sách Loại hàng</a></p>
    </div>
</main>
