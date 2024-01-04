<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
</head>

<body>
    <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                <option value="" selected>Chọn tỉnh thành</option>
            </select>

            <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                <option value="" selected>Chọn quận huyện</option>
            </select>

            <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                <option value="" selected>Chọn phường xã</option>
            </select>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");

        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function() {
                districts.length = 1;
                wards.length = 1;
                if (this.value !== "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        districts.options[districts.options.length] = new Option(k.Name, k.Id);
                    }
                }
            };
            districts.onchange = function() {
                wards.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value !== "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
    </script>
</body>

</html>
<?php
// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $selectedCity = $_POST["city"];
    $selectedDistrict = $_POST["district"];
    $selectedWard = $_POST["ward"];
   
    // Kết nối với cơ sở dữ liệu
    $servername = "localhost"; // Địa chỉ máy chủ MySQL
    $username = "root"; // Tên đăng nhập MySQL
    $password = ""; // Mật khẩu MySQL
    $dbname = "demo"; // Tên cơ sở dữ liệu

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Chuẩn bị truy vấn SQL để chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO dem1 (tinh, huyen, xa) VALUES ('$selectedCity', '$selectedDistrict', '$selectedWard')";

    // Thực hiện truy vấn
    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
        echo $selectedCity;
        echo $selectedDistrict;
        echo $selectedWard;
    } else {
        echo "Lỗi khi lưu dữ liệu: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có dữ liệu được gửi từ biểu mẫu.";
}
?>