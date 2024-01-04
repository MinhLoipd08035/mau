<?php
function them_loaihang($ten_lh)
{
    $sql = "INSERT INTO loai_hang (ten_loai) VALUES ('$ten_lh')";
    pdo_execute($sql);
}
function xoa_loaihang($xoaId)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai='$xoaId'";
    $result = pdo_query_one($sql);
    extract($result);
    $sql = "DELETE FROM img_chitietsanpham WHERE idma_sp = $ma_hh";
    pdo_execute($sql);
    $sql = "DELETE FROM binh_luan WHERE ma_hh = $ma_hh";
    pdo_execute($sql);
    $sql = "DELETE FROM chi_tiet_don_hang WHERE ma_sp_donhang  = $ma_hh";
    pdo_execute($sql);
    $sql = "DELETE FROM hang_hoa WHERE ma_loai = $xoaId";
    pdo_execute($sql);
    $sql = "DELETE FROM loai_hang WHERE ma_loai = $xoaId";
    pdo_execute($sql);
}
function list_loaihang()
{
    $sql = "SELECT * FROM loai_hang order by ma_loai desc ";
    $result = pdo_query($sql);
    return $result;
}
function sua_loaihang($id)
{
    $sql = "SELECT * FROM loai_hang WHERE ma_loai='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_loaihang($ma_lh, $ten_lh, $id)
{
    $sql = "UPDATE loai_hang SET ma_loai='$ma_lh',ten_loai='$ten_lh' WHERE ma_loai= '$id'";
    pdo_execute($sql);
}

function check_loaihang($ten_lh)
{
    $ten_lh = addslashes($ten_lh);
    $sql = "SELECT count(*) FROM loai_hang WHERE ten_loai = '$ten_lh'";
    return pdo_query_value($sql, $ten_lh) > 0;
}
