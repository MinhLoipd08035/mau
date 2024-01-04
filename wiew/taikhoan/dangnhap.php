<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }

    .lonnhat {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 80vh;
        margin: -20px 0 50px;
    }

    .lonnhat h1 {
        font-weight: bold;
        margin: 0;
    }

    .lonnhat h2 {
        text-align: center;
    }

    .lonnhat p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    .lonnhat span {
        font-size: 12px;
    }

    .lonnhat a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    .lonnhat button {
        border-radius: 20px;
        border: 1px solid #FF4B2B;
        background-color: #FF4B2B;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    .lonnhat button:active {
        transform: scale(0.95);
    }

    .lonnhat button:focus {
        outline: none;
    }

    .lonnhat button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    .lonnhat form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    .lonnhat input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .lonnhat .containerdangnhap {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .lonnhat .form-containerdangnhap {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .lonnhat .sign-in-containerdangnhap {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .lonnhat .containerdangnhap.right-panel-active .sign-in-containerdangnhap {
        transform: translateX(100%);
    }

    .lonnhat .sign-up-containerdangnhap {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .lonnhat .containerdangnhap.right-panel-active .sign-up-containerdangnhap {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    @keyframes show {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .lonnhat .overlay-containerdangnhap {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .lonnhat .containerdangnhap.right-panel-active .overlay-containerdangnhap {
        transform: translateX(-100%);
    }

    .lonnhat .overlay {
        background: #FF416C;
        background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
        background: linear-gradient(to right, #FF4B2B, #FF416C);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #FFFFFF;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .lonnhat .containerdangnhap.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .lonnhat .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .lonnhat .overlay-left {
        transform: translateX(-20%);
    }

    .lonnhat .containerdangnhap.right-panel-active .overlay-left {
        transform: translateX(0);
    }

    .lonnhat .overlay-right {
        right: 0;
        transform: translateX(0);
    }

    .lonnhat .containerdangnhap.right-panel-active .overlay-right {
        transform: translateX(20%);
    }

    .lonnhat .social-containerdangnhap {
        margin: 20px 0;
    }

    .lonnhat .social-containerdangnhap a {
        border: 1px solid #DDDDDD;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }
</style>
<div class="lonnhat">
    <div class="containerdangnhap" id="containerdangnhap">
        <div class="form-containerdangnhap sign-up-containerdangnhap">
            <form method="post" action="index.php?act=dangnhap" enctype="multipart/form-data">
                <h1>ĐĂNG KÝ</h1>
                <span>or use your email for registration</span>
                <input type="text" name="ho_ten" placeholder="Họ Tên" required />
                <input type="text" name="ten_dn" placeholder="Tên Đăng Nhập" required />
                <span style="color:red;"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="mat_khau" placeholder="Mật Khẩu" required />
                <input type="file" name="hinh" />
                <span style="color:red;"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
                <input type="submit" name="dangky" value="Đăng ký">
                <!-- <button>Sign Up</button> -->
            </form>
        </div>
        <div class="form-containerdangnhap sign-in-containerdangnhap">
            <form action="index.php?act=dangnhap" method="post">
                <h1>ĐĂNG NHẬP</h1>
                <span style="color:red;"><?php echo isset($loi["ten1"]) ? $loi["ten1"] : "" ?></span>
                <span>or use your account</span>
                <input type="text" placeholder="Tên Đăng Nhập" name="ten_dndn" required />
                <input type="password" placeholder="Password" name="mat_khaudn" />
                <a href="index.php?act=quen_mk">Quên mật khẩu?</a>
                <input type="submit" value="Đăng nhập" name="dangnhap">
            </form>
        </div>
        <div class="overlay-containerdangnhap">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const containerdangnhap = document.getElementById('containerdangnhap');

    signUpButton.addEventListener('click', () => {
        containerdangnhap.classList.add('right-panel-active');
    });

    signInButton.addEventListener('click', () => {
        containerdangnhap.classList.remove('right-panel-active');
    });
</script>