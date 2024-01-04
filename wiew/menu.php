<div class="loai_sp">
    <ul class="memu">
        <?php foreach ($loai_hang as $list_loaihang) { ?>
            <li>
                <?php $link_loaihang = "index.php?act=sanpham&ma_loai=" . $list_loaihang['ma_loai']; ?>
                <a class="" href="<?php echo $link_loaihang; ?>"><?php echo $list_loaihang['ten_loai']; ?></a>
            </li>
        <?php } ?>
    </ul>
</div>