<div class="quenmk">
    <h2>Quên mật khẩu</h2>
    <form action="index.php?act=quen_mk" method="post">
        <input type="email" name="email" id="">
        <input type="submit" name="quen_mk" value="Lấy lại Mật khẩu">
        <input type="reset" value="nhập lại">
    </form>
    <?php if (!empty($thong_bao1)) : ?>
        <span class="thongbao_mk"><?php echo $thong_bao1; ?> <a href="index.php?act=dangnhap">Đăng nhập</a></span>
    <?php endif; ?>
    <?php if (!empty($thong_bao)) : ?>
        <span class="thongbao_mk"><?php echo $thong_bao; ?> <a href="index.php?act=dangnhap">Đăng ký ngay</a></span>
    <?php endif; ?>
</div>
<style>
    .quenmk {
        text-align: center;
        margin: 20px;
    }

    .thongbao_mk a {
        text-decoration: underline;
        margin-left: 5px;
        color: #0074d9;
    }

    .quenmk input[type="reset"] {
        background: #ff4136;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    /* CSS cho phần thông báo */
    .thongbao_mk {
        background: #ffc107;
        color: #333;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        display: block;
        margin: 10px 0;
        width: 650px;
        margin: 0 auto;
        margin-top: 20px;
    }

    .quenmk input[type="reset"]:hover {
        background: #d21f18;
    }

    .quenmk form {
        display: inline-block;
        background: #f0f0f0;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Chọn phần input email */
    .quenmk input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .quenmk input[type="submit"] {
        background: #0074d9;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .quenmk input[type="submit"]:hover {
        background: #0056b3;
    }
</style>