<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .allll {
            width: 1300px;
            margin: 0 auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        .total {
            font-weight: bold;
        }

        .allll input[type="submit"] {
            background-color: #FF5733;
            /* Màu nền của nút */
            color: #FFFFFF;
            /* Màu chữ trên nút */
            padding: 10px 20px;
            /* Kích thước nút */
            border: none;
            /* Loại bỏ viền */
            cursor: pointer;
            /* Biểu tượng con trỏ là một ngón tay khi di chuột qua nút */
            border-radius: 5px;
            /* Bo tròn các góc của nút */
        }

        .allll input[type="submit"]:hover {
            background-color: #FF0000;
            /* Màu nền của nút khi di chuột qua */
        }
    </style>
</head>

<body>
    <div class="allll">
        <?php if (!empty($list_chitietdh)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>

                <?php
                $tien = 0;
                foreach ($list_chitietdh as $ctdonhang) {
                    extract($ctdonhang);
                    $hinh_anh = "<img src='upload/" . $hinh . "'>";
                    $gia_xuat = number_format((int)$gia, 0, '.', '.');
                    $tien += $thanh_tien;
                    $id1 = $id_donhang;
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $hinh_anh ?></td>
                            <td><?php echo $ten_sp_donhang ?></td>
                            <td><?php echo $so_luong ?></td>
                            <td><?php echo $gia_xuat ?> <span>đ</span></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php else : ?>
            <p>Không có dữ liệu đơn hàng.</p>
        <?php endif; ?>
        <?php $tien_xuat = number_format((int)$tien, 0, '.', '.'); ?>
        <p class="total">Tổng cộng: <?php echo $tien_xuat; ?> <span>đ</span></p>
        <?php
        if (is_array($list_donhang_id)) {
            $trangthai_check = $list_donhang_id['trang_thai_don_hang'];
        }
        ?>
          <?php
        if ($trangthai_check == 3) {
        ?>
            <form action="index.php?act=datlai" method="post">
                <input type="hidden" name="id" value="<?= $id1 ?>">
                <input type="submit" onclick="datlaiDonHang()" value="Đặt lại" name="dat_lai">
            </form>
        <?php
        }elseif ($trangthai_check == 2) {
        ?>
            <form action="index.php?act=xacnhan" method="post">
                <input type="hidden" name="id" value="<?= $id1 ?>">
                <input type="submit" onclick="danhanDonHang()" value="Đã nhận hàng" name="da_nhan">
            </form>
        <?php
        } elseif ($trangthai_check != 4) {
        ?>
            <form action="index.php?act=huydonhang" method="post">
                <input type="hidden" name="id" value="<?= $id1 ?>">
                <input type="submit" onclick="huyDonHang()" value="Hủy đơn hàng" name="huy_donhang">
            </form>
        <?php
        } else {
        ?>
            <form action="index.php?act=datlaidonhang" method="post">
                <input type="hidden" name="id" value="<?= $id1 ?>">
                <input type="submit" onclick="datlaiDonHang()" value="Đặt lại đơn hàng" name="datlai_donhang">
            </form>
        <?php
        }
        ?>



        <script>
            function huyDonHang() {
                alert("Đơn hàng đã được hủy.");
            }

            function datlaiDonHang() {
                alert("Đơn hàng đã được đại lại thành công.");
            }

            function danhanDonHang() {
                alert("Cảm ơn đã đặt hàng bên chúng tôi.");
            }
        </script>
    </div>
</body>

</html>