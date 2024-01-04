
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">Thêm Tài Khoản</h1>
        <form action="index.php?act=khachhang" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Họ tên</label>
                <input type="text" name="ho_ten" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Tên đăng nhâp:</label>
                <input type="text" name="ten_dn" class="form-input" required>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Email:</label>
                <input type="email" placeholder="Email" name="email" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Mật khẩu:</label>
                <input type="password" name="mat_khau" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Ảnh đại điện:</label>
                <input type="file" name="hinh" class="form-input">
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group1">
                <label for="tenlh_bottom" class="form-label">Trạng Thái:</label>
                <input type="radio" id="kichhoat" name="kich_hoat" value="0" checked>
                <label for="kichhoat">Kích hoạt</label>
                <input type="radio" id="choblock1" name="kich_hoat" value="1">
                <label for="choblock1">Chặn</label>
            </div>
            <div class="form-group1">
                <label for="tenlh_bottom" class="form-label">Vai Trò:</label>
                <input type="radio" id="vaitro" name="vai_tro" value="0" checked>
                <label for="vaitro">Khách hàng</label>
                <input type="radio" id="choblock2" name="vai_tro" value="1">
                <label for="choblock2">Quản trị</label>
            </div>
            <input type="submit" name="them_tai_khoan" class="form-button" value="Thêm Khách Hàng">
            <input type="reset" value="Nhập lại" class="form-button-reset">
            <br>
            <span class="form-error"><?php echo isset($loi["ten1"]) ? $loi["ten1"] : "" ?></span>
        </form>
        <p><a href="index.php?act=listkhachhang" class="form-link">Xem danh sách khách hàng</a></p>
    </div>
</main>