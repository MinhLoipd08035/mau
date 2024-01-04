<div class="tensp"><strong><?php echo $ten_sp ?></strong></div>
<div class="splienquan">
  <?php
  foreach ($danhsach_sanpham as $ds_sp) {
    extract($ds_sp);
    # code...
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