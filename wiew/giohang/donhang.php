<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
    <style>
        .containerdonhang header {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .containerdonhang h1 {
            margin: 0;
        }

        .containerdonhang {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .containerdonhang table {
            width: 100%;
            border-collapse: collapse;
        }

        .containerdonhang table,
        .containerdonhang th,
        .containerdonhang td {
            border: 1px solid #ccc;
        }

        .containerdonhang th,
        .containerdonhang td {
            padding: 10px;
            text-align: left;
        }

        .containerdonhang th {
            background-color: #333;
            color: white;
        }

        .containerdonhang tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .containerdonhang tr:nth-child(odd) {
            background-color: #fff;
        }

        .containerdonhang td.status {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <h1>Thông tin đơn hàng</h1>
    </header>
    <div class="containerdonhang">
        <?php if (!empty($list_donhang)) : ?>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Số lượng mặt hàng</th>
                    <th>Tổng giá tiền (VND)</th>
                    <th>Tình trạng đơn hàng</th>
                    <th></th>
                </tr>
                <?php $soThuTu = 1; ?>
                <?php foreach ($list_donhang as $donhang) {
                    extract($donhang);
                    $xem_chitiet = "index.php?act=xemchitiet&id=" . $donhang['id'];
                    $thaydoi_diachi = "index.php?act=doidiachi&id=" . $donhang['id'];
                    $so_luong = layTongSoLuongChiTietDonHang($donhang['id']);
                    $trang_thai_donhang = layTrangThaiDonHang($donhang['trang_thai_don_hang']);
                ?>
                    <tr>
                        <td><?php echo $soThuTu; ?></td>
                        <td>NTML-00<?php echo $donhang['id']; ?></td>
                        <td><?php echo $donhang['ngay_dathang']; ?></td>
                        <td><?php echo $so_luong ?></td>
                        <td><?php echo $donhang['tong_tatca']; ?></td>
                        <td><?php echo $trang_thai_donhang; ?></td>
                        <td>
                            <a href="<?php echo $xem_chitiet; ?>">Xem Chi Tiết</a>
                            <a href="<?php echo $thaydoi_diachi; ?>">Đổi địa chỉ</a>
                        </td>
                    </tr>
                    <?php $soThuTu++; ?>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu đơn hàng.</p>
        <?php endif; ?>
    </div>
</body>

</html>