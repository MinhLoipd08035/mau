<?php
if (is_array($list_donhang_id)) {
    $diachi = $list_donhang_id['dia_chi_day_du'];
    $id = $list_donhang_id['id'];
}
?>
<div class="diachiall">
    <form action="index.php?act=capnhatdiachi" method="post">
        <input type="text" name="diachi" value="<?= $diachi ?>">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="reset" value="Nhập lại">
        <input type="submit" name="capnhat_diachi" value="Cập nhật">
    </form>
</div>
<style>
    .diachiall {
        margin: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #f7f7f7;
    }

    .diachiall form {
        display: flex;
        align-items: center;
    }

    input[type="reset"] {
        background-color: #ff0000;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }

    input[type="reset"]:hover {
        background-color: #ff6666;
    }

    .diachiall input[type="text"] {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 10px;
        width: 100%;
        /* Đặt chiều rộng là 100% */
    }

    .diachiall input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .diachiall input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>