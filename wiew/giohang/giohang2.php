<!DOCTYPE html>
<html>

<head>
    <style>
        /* Thiết lập kiểu chung cho trang */
        /* Kiểu cho giỏ hàng */
        #cartformpage {
            flex-wrap: wrap;
            margin-bottom: 0 !important;
            padding: 10px;
        }

        .cart-row {
            margin-bottom: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            position: relative;
            /* Tạo khung chứa nút xóa */
            flex: 1;
        }

        .item-remove {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .item-remove a {
            padding: 5px 10px;
            background: red;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .table-cart {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-img img {
            max-width: 100px;
            height: auto;
        }

        .item-info {
            flex-grow: 1;
        }

        .item--title {
            width: 470px;
        }

        .item--title a {
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }

        .item-price p {
            font-weight: bold;
            color: #333;
        }

        .item-total-price {
            text-align: right;
            color: black;
            font-weight: bold;
        }

        /* Kiểu cho nút "tăng" và "giảm" số lượng */
        .qty-btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .qty-btn:hover {
            background-color: #0056b3;
        }

        /* Kiểu cho số lượng */
        .item-quantity {
            width: 40px;
            text-align: center;
            font-size: 16px;
            margin: 10px;
        }

        /* Mẫu đặt hàng */

        .toanbo {
            display: flex;
            width: 1300px;
            margin: 0 auto;
            justify-content: space-between;
            align-items: flex-start;
        }

        .bentrai {
            padding: 10px;
            width: 68%;

            /* 60% width for the left div */
        }

        .right-div {
            flex: 1;
            padding: 10px;
            z-index: 2;
            margin-left: 0px;
            padding-left: 0px;
        }

        .frombenphai {
            margin-bottom: 10px;
            border: 1px solid #ddd;
            width: 400px;
            margin-left: 10px;
            padding: 5px;
        }

        .frombenphai input[type="submit"] {
            background-color: red;
            color: white;
            text-align: center;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .right-div {
            display: flex;
        }

        .frombenphai {
            word-wrap: break-word;
        }

        .dathang {
            text-align: center;
        }

        .tongtien {
            color: black;
            /* Đặt màu chữ của .tongtien thành màu đen */
            font-weight: bold;
            /* In đậm nội dung trong .tongtien */
        }

        .tien {
            font-weight: bold;
            float: right;
            color: red;
            font-size: 24px;
        }

        .toanbo li {
            margin: 10px;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <h1>GIỎ HÀNG CỦA BẠN</h1>
    <div class="toanbo">
        <div class="bentrai">
            <?php
            if (isset($_SESSION['khach_hang'])) {
                $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
            } else {
                $ma_kh1 = "nguoi_ngoai";
            }
            if (isset($_SESSION['gio_hang']) && is_array($_SESSION['gio_hang']) && !empty($_SESSION['gio_hang'])) {
                $tong = 0;
                $i = 0;
                foreach ($_SESSION['gio_hang'] as $giohang) {
                    $hinhxuat = $img_path . $giohang[2];
                    $tong_tien = number_format($giohang[5], 0, ',', '.');
                    $gia_tien = number_format($giohang[3], 0, ',', '.');
                    $product_id = 'updates_' . $i;
                    $xoa_giohang = "index.php?act=xoa_giohang&id=" . $i;
                    if ($giohang[6] == $ma_kh1) {
            ?>
                    <div class="cart-row">
                        <div class="item-remove">
                            <a href="<?php echo $xoa_giohang; ?>">xóa</a>
                            <!-- <a href="<?php echo $xoa_giohang; ?>" onclick="if(confirm('Bạn muốn xóa ?')){ document.querySelector('.loading-overlay').style.display = 'block'; delCart(82); }return false;">Xóa</a> -->
                        </div>
                        <div class="table-cart">
                            <div class="item-img">
                                <a href="">
                                    <img src="<?php echo $hinhxuat; ?>" alt="hinhsp">
                                </a>
                            </div>
                            <div class="item-info">
                                <h3 class="item--title"><a href=""><?php echo $giohang[1]; ?></a></h3>
                                <p>
                                    <span class="item-price"><?php echo $gia_tien; ?> ₫</span>

                                </p>
                            </div>
                            <div>
                                <span class="qty-btn">số lượng</span>
                                <input type="text" size="4" id="<?php echo $product_id; ?>" value="<?php echo $giohang[4]; ?>" class="item-quantity" onchange="updateCart(this)">
                            </div>
                            <div class="item-total-price">
                                <div class="price">
                                    <span class="line-item-total"><?php echo $tong_tien; ?> ₫</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    // Cập nhật tổng giá trị tổng cộng
                    $tong += $giohang[5];
                }$i++;}
                $tong_dinh_dang = number_format($tong, 0, ',', '.');
                ?>
        </div>
        <div class="right-div">
            <from class="frombenphai">
                <span class="tongtien">Tổng tiền:</span><span class="tien"><?php echo $tong_dinh_dang; ?> đ</span>
                <br>
                <li>Đổi hàng miễn phí trong vòng 15 ngày.</li>
                <li>Đổi hàng miễn phí trong vòng 15 ngày.</li>
                <div class="dathang">
                   <a href="index.php?act=dat_hang"><input type="submit" name="dat_hang" value="ĐẶT HÀNG"></a>
                </div>
            </from>
        </div>
    </div>
<?php
            } else {
                echo "giỏ hàng trống";
            }
?>
</body>

</html>