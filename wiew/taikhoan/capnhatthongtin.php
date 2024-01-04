<?php
if (isset($_SESSION['khach_hang']) && (is_array($_SESSION['khach_hang']))) {
    extract($_SESSION['khach_hang']);
    $hinh_anh = "<img src='upload/" . $hinh . "' width='70' class='round-image'>";
}
?>
<div class="form-container">
    <h1 class="form-title">CẬP NHẬT TÀI KHOẢN</h1>
    <form action="index.php?act=capnhat_kh" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
        <div class="form-group">
            <label for="tenlh_bottom" class="form-label">Họ tên</label>
            <input type="text" name="ho_ten" class="form-input" value="<?= $ho_ten ?>" required>
        </div>
        <div class="form-group">
            <label for="tenlh_bottom" class="form-label">Tên đăng nhâp:</label>
            <input type="text" name="ten_dn" class="form-input" value="<?= $ma_kh ?>" required>
            <span class="form-error"><?php echo isset($loi["loi2"]) ? $loi["loi2"] : "" ?></span>
        </div>
        <div class="form-group">
            <label for="tenlh_bottom" class="form-label">Email:</label>
            <input type="email" placeholder="Email" name="email" class="form-input" value="<?= $email ?>" required>
        </div>
        <div class="form-group">
            <label for="tenlh_bottom" class="form-label">Mật khẩu:</label>
            <input type="password" name="mat_khau" class="form-input" value="<?= $mat_khau ?>" required>
        </div>
        <div class="form-group">
            <label for="tenlh_bottom" class="form-label">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" value="<?=$sdt?>" class="form-input" required>
            <span id="error-message" style="color: red; display: none;">Số điện thoại không hợp lệ. Vui lòng nhập lại.</span>
        </div>
        <div class="form-group">
            <label for="tenlh_bottom" class="form-label">Ảnh đại điện:</label>
            <input type="file" name="hinh" class="form-input">
            <label class="form-label"><?php echo $hinh_anh; ?></label>
            <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
        </div>
        <input type="hidden" name="id" value="<?= $ma_kh ?>">
        <span> <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?></span> <br>
        <input onclick="kiemTraSoDienThoai()" type="submit" name="capnhatthongtin" class="form-button" value="Cập Nhật">
        <input type="reset" value="Nhập lại" class="form-button-reset">
        <span class="form-error"><?php echo isset($loi["thanhcong"]) ? $loi["thanhcong"] : "" ?></span>
    </form>
</div>
<script>
    function kiemTraSoDienThoai() {
        var input = document.getElementById("phone");
        var phoneNumber = input.value;
        var errorSpan = document.getElementById("error-message");
        // Sử dụng regex để kiểm tra số điện thoại
        var phoneRegex = /^0[0-9]{9}$/;

        if (phoneRegex.test(phoneNumber)) {
            errorSpan.style.display = "none"; // Ẩn thông báo lỗi
        } else {
            errorSpan.style.display = "block"; // Hiển thị thông báo lỗi
            input.value = ""; // Xóa nội dung không hợp lệ
        }
    }
</script>