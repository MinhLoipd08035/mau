<?php
if (isset($_SESSION['khach_hang'])) {
    $ten_kh3 = $_SESSION['khach_hang']['ho_ten'];
    $email = $_SESSION['khach_hang']['email'];
    $ma_kh3 = $_SESSION['khach_hang']['ma_kh'];
} else {
    $ten_kh3 = "";
    $email = "";
    $ma_kh3 = "nguoi_ngoai";
}
?>
<form action="index.php?act=bill_muahang" method="post">
    <div class="dat_hang1toanbo">
        <div class="box_trai">
            <h3>Thông tin nhận hàng</h3>
            <input type="email" name="email" value="<?= $email ?>" placeholder="Email" required>
            <input type="text" name="ten" value="<?= $ten_kh3 ?>" placeholder="Họ và Tên" required>
            <input type="tel" id="phone" name="phone" placeholder="Số điện thoại" required>
            <span id="error-message" style="color: red; display: none;">Số điện thoại không hợp lệ. Vui lòng nhập lại.</span>
            <input type="text" name="dia_chi" placeholder="Địa chỉ cụ thể" required>
            <input type="text" name="tinh" placeholder="Tỉnh thành">
            <input type="text" name="huyen" placeholder="Quận Huyện">
            <input type="text" name="xa" placeholder="Phường Xã">
            <textarea name="ghichu" id="" cols="30" rows="1" placeholder="Ghi chú"></textarea>
        </div>
        <div class="box_giua">
            <!-- <p class="loi">Vui lòng nhập thông tin giao hàng</p> -->
            <h3>Phương thức thanh toán</h3>
            <div class="radio-label">
                <input type="radio" name="thanh_toan" value="0" checked>
                <label>Thanh toán khi nhận hàng</label>
            </div>
            <div class="radio-label">
                <input type="radio" name="thanh_toan" value="1">
                <label>Chuyển khoản qua ngân hàng</label>
            </div>
        </div>
        <div class="box_phai">
            <h3>Đơn hàng</h3>
            <?php
            if (isset($_SESSION['mua_hang'])) {
                $i = 0;
                $s = 0;
                foreach ($_SESSION['mua_hang'] as $muahang) {
                    $hinhxuat = $img_path . $muahang[2];
                    $tong_tien = number_format($muahang[5], 0, ',', '.');
                    $tong_dinh_dang2 = number_format($muahang[5], 0, ',', '.');
                    if ($muahang[6] == $ma_kh3) {
            ?>
                        <div class="sanpham">
                            <div class="image-container">
                                <img src="<?php echo $hinhxuat; ?>" alt="">
                                <input type="hidden" name="hinh<?= $s ?>" value="<?php echo $muahang[2]; ?>">
                                <span class="sosanpham"><?php echo $muahang[4]; ?></span>
                                <input type="hidden" name="soluong<?= $s ?>" value="<?php echo $muahang[4]; ?>">
                            </div>
                            <div class="product-info">
                                <div class="info-row">
                                    <p class="tensp_dathang"><?php echo $muahang[1]; ?></p>
                                    <span class="gia"><?php echo $tong_tien; ?> <span class="d">đ</span></span>
                                    <input type="hidden" name="tongtiensp<?= $s ?>" value="<?php echo $tong_tien; ?>">
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
            <div class="conlai">
                <input type="hidden" name="tongtienall" value="<?php echo $tong_dinh_dang2; ?>">
                <span class="tongcong"><span class="tc">Tổng cộng:</span> <?php echo $tong_dinh_dang2; ?> <span class="d">đ</span></span> <br>
                <a href="#">Quay về giỏ hàng</a>
                <input onclick="kiemTraSoDienThoai()" type="submit" name="ok_dathang" value="Đặt hàng">
            </div>
        </div>
    </div>
</form>
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
<style>
    .dat_hang1toanbo {
        display: flex;
        justify-content: space-between;
    }

    .dat_hang1toanbo a {
        text-decoration: none;
        color: blue;
        margin-right: 10px;
    }

    .dat_hang1toanbo a:hover {
        color: #0099FF;
    }

    .dat_hang1toanbo input[name="ok_dathang"] {
        background-color: #FF3300;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-top: 20px;
        margin-left: 20px;
    }

    .dat_hang1toanbo input[name="ok_dathang"]:hover {
        background-color: #FF3366;
    }

    .dat_hang1toanbo .tensp_dathang {
        color: black;
        font-size: 16px;
        text-transform: capitalize;
        font-weight: bold;
    }

    .dat_hang1toanbo .gia {
        color: red;
        font-weight: bold;
        font-size: 110%;

    }

    .dat_hang1toanbo .tongcong .tc {
        color: black;
        font-weight: bold;
        font-size: 25px;
        margin-right: 10px;
    }

    .dat_hang1toanbo .tongcong {
        color: orange;
        font-weight: bold;
        font-size: 20px;
    }

    .dat_hang1toanbo .d {
        color: black;
        opacity: 0.7;
        font-size: 80%;
    }

    .dat_hang1toanbo .box_trai,
    .dat_hang1toanbo .box_giua,
    .dat_hang1toanbo .box_phai {
        flex-basis: calc(33.33% - 10px);
        margin-right: 10px;
        padding: 10px;
    }

    .dat_hang1toanbo .sanpham {
        display: flex;
        align-items: center;
    }

    .dat_hang1toanbo .image-container {
        width: 25%;
        position: relative;
    }

    .dat_hang1toanbo .sanpham img {
        max-width: 100%;
    }

    .dat_hang1toanbo .sosanpham {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        position: absolute;
        top: 0;
        right: 0;
        background-color: #FF9900;
        padding: 0;
        color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .dat_hang1toanbo .product-info {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-left: 10px;
    }

    .dat_hang1toanbo .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dat_hang1toanbo .gia {
        white-space: nowrap;
    }

    .dat_hang1toanbo .conlai {
        flex-direction: column;
    }

    /*1 */

    .dat_hang1toanbo h3 {
        font-size: 1.5em;
        color: #000;
    }

    .dat_hang1toanbo input[type="email"],
    .dat_hang1toanbo input[type="text"],
    .dat_hang1toanbo input[type="tel"],
    .dat_hang1toanbo input[type="password"],
    .dat_hang1toanbo textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1em;
    }

    .dat_hang1toanbo input[type="email"]:focus,
    .dat_hang1toanbo input[type="text"]:focus,
    .dat_hang1toanbo input[type="tel    "]:focus,
    .dat_hang1toanbo input[type="password"]:focus,
    .dat_hang1toanbo textarea:focus {
        border-color: #007bff;
    }

    .dat_hang1toanbo input[type="email"]::-webkit-inner-spin-button,
    .dat_hang1toanbo input[type="email"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .dat_hang1toanbo input[type="text"][placeholder="Tỉnh thành"],
    .dat_hang1toanbo input[type="text"][placeholder="Quận Huyện"],
    .dat_hang1toanbo input[type="text"][placeholder="Phường Xã"] {
        width: 100%;
    }


    .dat_hang1toanbo input[type="text"][placeholder="Tỉnh thành"],
    .dat_hang1toanbo input[type="text"][placeholder="Quận Huyện"],
    .dat_hang1toanbo input[type="text"][placeholder="Phường Xã"] {
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0;
    }

    /** 2 */
    .dat_hang1toanbo .loi {
        color: red;
    }

    .dat_hang1toanbo input[type="radio"] {
        margin-right: 5px;
    }

    .dat_hang1toanbo .radio-label {
        display: flex;
        margin-top: 20px;
        align-items: center;
    }

    .dat_hang1toanbo label {
        font-size: 1em;

    }

    .dat_hang1toanbo input[type="radio"] {
        width: 20px;
        height: 20px;
        margin-right: 5px;
        border: 2px solid #000;
        border-radius: 50%;
    }

    .dat_hang1toanbo label::before {
        content: "\00a0\00a0\00a0";
    }
</style>