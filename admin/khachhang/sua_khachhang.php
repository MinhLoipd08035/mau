<?php
if (is_array($result)) {
    extract($result);
    if (is_file("../upload/" . $hinh)) {
        $hinhxuat = "<img src='../upload/" . $hinh . "' width='80'>";
    } else {
        $hinh = "no photo";
    }
}
?>
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">Thêm Tài Khoản</h1>
        <form action="index.php?act=capnhatkhachhang" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Họ tên</label>
                <input type="text" name="ho_ten" class="form-input" value="<?php if (isset($ho_ten) && ($ho_ten != '')) echo $ho_ten; ?>" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Tên đăng nhâp:</label>
                <input type="text" name="ten_dn" class="form-input" value="<?php if (isset($ma_kh) && ($ma_kh != '')) echo $ma_kh; ?>" required>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Email:</label>
                <input type="email" placeholder="Email" name="email" class="form-input" value="<?php if (isset($email) && ($email != '')) echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Mật khẩu:</label>
                <input type="text" name="mat_khau" class="form-input" value="<?php if (isset($mat_khau) && ($mat_khau != '')) echo $mat_khau; ?>" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Ảnh đại điện:</label>
                <input type="file" name="hinh" class="form-input">
                <label class="form-label"><?php if (isset($hinhxuat) && ($hinhxuat != '')) echo $hinhxuat; ?></label>
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group1">
                <label for="tenlh_bottom" class="form-label">Trạng Thái:</label>
                <input type="radio" id="kichhoat" name="kich_hoat" value="0" <?php if ($kich_hoat == 0) echo "checked"; ?>>
                <label for="kichhoat">Kích hoạt</label>
                <input type="radio" id="choblock1" name="kich_hoat" value="1" <?php if ($kich_hoat == 1) echo "checked"; ?>>
                <label for="choblock1">Chặn</label>
            </div>
            <div class="form-group1">
                <label for="tenlh_bottom" class="form-label">Vai Trò:</label>
                <input type="radio" id="vaitro" name="vai_tro" value="0" <?php if ($vai_tro == 0) echo "checked"; ?>>
                <label for="vaitro">Khách hàng</label>
                <input type="radio" id="choblock2" name="vai_tro" value="1" <?php if ($vai_tro == 1) echo "checked"; ?>>
                <label for="choblock2">Quản trị</label>
            </div>
            <input type="hidden" name="id" value="<?php echo $ma_kh; ?>">
            <input type="submit" name="capnhatthongtin" class="form-button" value="Cập nhật">
            <input type="reset" value="Nhập lại" class="form-button-reset">
            <br>
            <span class="form-error"><?php echo isset($loi["ten1"]) ? $loi["ten1"] : "" ?></span>
        </form>
        <p><a href="index.php?act=listkhachhang" class="form-link">Xem danh sách khách hàng</a></p>
    </div>
</main>