<?php
function them_binhluan($noi_dung, $ma_hh, $ma_kh, $ngay_bl,$ten_kh)
{
    $sql = "INSERT INTO binh_luan (noi_dung, ma_hh, ma_kh, ngay_bl, ten_kh) VALUES ('$noi_dung', '$ma_hh', '$ma_kh', '$ngay_bl', '$ten_kh')";
    pdo_execute($sql);
}
function list_binhluan()
{
    $sql = "SELECT * FROM binh_luan order by ma_bl desc ";
    $result = pdo_query($sql);
    return $result;
}
function list_binhluan_sp($ma_hh)
{
    $sql = "SELECT * FROM binh_luan WHERE ma_hh='".$ma_hh."' order by ma_bl desc ";
    $result = pdo_query($sql);
    return $result;
}
function xoa_binhluan($xoaId)
{
    $sql = "DELETE FROM binh_luan WHERE ma_bl = $xoaId";
    pdo_execute($sql);
}