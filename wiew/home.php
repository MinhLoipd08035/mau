<div class="containerslide">


    <div class="mySlides">
        <div class="numbertext">1 / 6</div>
        <img src="wiew/img/slide1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">2 / 6</div>
        <img src="wiew/img/slide2.jpg" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">3 / 6</div>
        <img src="wiew/img/slide3.jpg" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">4 / 6</div>
        <img src="wiew/img/slide1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">5 / 6</div>
        <img src="wiew/img/slide2.jpg" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">6 / 6</div>
        <img src="wiew/img/slide3.jpg" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

    <div class="caption-container">
        <p id="caption"></p>
    </div>
</div>
<h2 class="cuoih2">Sản Phẩm Yêu Thích</h2>
<div class="containersanpham">
    <?php foreach ($sanpham_yeuthich as $sp_yeuthich) {
        extract($sp_yeuthich);
        $gia = number_format((int)$con_hh, 0, '.', '.');
        $giagiam = number_format((int)$don_gia, 0, '.', '.');
        $link_sp = "index.php?act=sanphamchitiet&ma_hh=" . $ma_hh;
        if (is_file("upload/" . $hinh)) {
            $hinhxuat = "<img src='upload/" . $hinh . " '>";
        } else {
            $hinhxuat = "no photo";
        }
    ?>
        <div class="boxsp">
            <a href="<?php echo $link_sp; ?>">
                <div style="margin-bottom: 10px;"><?php echo $hinhxuat; ?></div>
            </a>
            <a href="<?php echo $link_sp; ?>"><?php echo $ten_hh; ?></a>
            <p style="margin-top: 10px;"><span style="color: red; font-weight: bold;"><?php echo $gia; ?>đ</span><del><?php echo $giagiam; ?>đ</del></p>
        </div>

    <?php } ?>
</div>
<h2 class="cuoih2">Sản Phẩm</h2>
<div class="containersanpham">
    <?php foreach ($sanpham_trangchu as $sp_trangchu) {
        extract($sp_trangchu);
        $gia = number_format((int)$con_hh, 0, '.', '.');
        $giagiam = number_format((int)$don_gia, 0, '.', '.');
        $link_sp = "index.php?act=sanphamchitiet&ma_hh=" . $ma_hh;
        if (is_file("upload/" . $hinh)) {
            $hinhxuat = "<img src='upload/" . $hinh . " '>";
        } else {
            $hinhxuat = "no photo";
        }
    ?>
        <div class="boxsp">
            <a href="<?php echo $link_sp; ?>">
                <div style="margin-bottom: 10px;"><?php echo $hinhxuat; ?></div>
            </a>
            <a href="<?php echo $link_sp; ?>"><?php echo $ten_hh; ?></a>
            <p style="margin-top: 10px;">
                <span style="color: red; font-weight: bold;"><?php echo $gia; ?>đ</span>
                <del><?php echo $giagiam; ?>đ</del>
            </p>
            <!-- Add the shopping cart icon and link -->
            <div class="shopping-cart">
                <form action="index.php?act=themvaogiohang" method="post">
                    <?php
                    if (isset($_SESSION['khach_hang'])) {
                        $ma_kh = $_SESSION['khach_hang']['ma_kh'];
                    } else {
                        $ma_kh = "nguoi_ngoai";
                    }
                    ?>
                    <input type="hidden" name="ma_kh" value="<?php echo $ma_kh; ?>">
                    <input type="hidden" name="ma_hh" value="<?php echo $ma_hh; ?>">
                    <input type="hidden" name="ten_hh" value="<?php echo $ten_hh; ?>">
                    <input type="hidden" name="hinh" value="<?php echo $hinh; ?>">
                    <input type="hidden" name="gia" value="<?php echo $con_hh; ?>">
                    <input type="submit" name="themvao_gio" value="🛒" class="themvaogiohang">
                </form>
            </div>
        </div>
    <?php } ?>
</div>