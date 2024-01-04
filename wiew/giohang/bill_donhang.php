<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    .hidden {
        display: none;
    }
    #success-message {
        margin-top: 40px;
        text-align: center;
        padding: 20px;
        border: 1px solid #ccc;
        width: 300px;
        margin: 0 auto;
        background-color: #dff0d8;
    }
</style>

<body>
    <div id="success-message" class="hidden">
        <p>Đặt hàng thành công!</p>
        <button id="back-button">Quay về trang chủ</button>
    </div>
    <script src="script.js"></script>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Đặt biến dat_hang_ok thành true (điều này sẽ xảy ra sau khi đặt hàng thành công)
        var dat_hang_ok = true;

        // Lấy thẻ div chứa thông báo thành công
        var successMessage = document.getElementById("success-message");

        // Nếu biến dat_hang_ok là true, hiển thị thông báo
        if (dat_hang_ok) {
            successMessage.style.display = "block";
        }

        // Gắn sự kiện click cho nút "Quay về trang chủ"
        var backButton = document.getElementById("back-button");
        backButton.addEventListener("click", function() {
            // Chuyển người dùng về trang chủ (thay đổi đường dẫn tùy theo trang chủ của bạn)
            window.location.href = "index.php";
        });
    });
</script>