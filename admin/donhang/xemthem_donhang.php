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
            width: 1000px;
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
            max-width:100px;
            max-height: 70px;
        }

        .total {
            font-weight: bold;
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
                    $hinh_anh = "<img src='../upload/" . $hinh . "'>";
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
    </div>
</body>

</html>