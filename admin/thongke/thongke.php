<div class="form-container1">
    <h1 class="admin__list-title">THỐNG KÊ SẢN PHẨM</h1>
    <div class="admin__list-table">
        <table class="admin__table">
            <tr>
                <th>MÃ LOẠI HÀNG</th>
                <th>TÊN LOẠI HÀNG</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT </th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>
            <?php foreach ($list_thongke as $thongke) {
                extract($thongke);
                $gia_cao_nhat_dinh_dang = number_format($gia_cao_nhat, 0, ',', ',');
                $gia_thap_nhat_dinh_dang = number_format($gia_thap_nhat, 0, ',', ',');
                $gia_trung_binh_dinh_dang = number_format($gia_trung_binh, 0, ',', ',');
            ?>
                <tr>
                    <td><?php echo $ma_loaihang; ?></td>
                    <td><?php echo $ten_loaihang; ?></td>
                    <td><?php echo $so_luong_sp; ?></td>
                    <td><?php echo $gia_cao_nhat_dinh_dang; ?></td>
                    <td><?php echo $gia_thap_nhat_dinh_dang; ?></td>
                    <td><?php echo $gia_trung_binh_dinh_dang; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <a href="index.php?act=xembieudo">XEM BIỂU ĐỒ</a>
</div>