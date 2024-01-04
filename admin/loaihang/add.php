<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">THÊM LOẠI HÀNG</h1>
        <form action="index.php?act=addloaihang" method="POST" class="add-loai-hang-form">
            <div class="form-group">
                <input type="hidden" id="malh_bottom" name="ma_lh" class="form-input">
            </div>

            <div class="form-group">
                <label for="tenlh_bottom" class="form-label">Tên loại hàng:</label>
                <input type="text" id="tenlh_bottom" name="ten_lh" class="form-input" required>
                <span class="form-error"><?php echo isset($loi["loi2"]) ? $loi["loi2"] : "" ?></span>
            </div>
            <span> <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?></span> <br>
            <input type="submit" name="addloaihang" class="form-button" value="Lưu thông tin">

        </form>


        <p><a href="index.php?act=listdanhmuc" class="form-link">Xem danh sách Loại hàng</a></p>
    </div>
</main>