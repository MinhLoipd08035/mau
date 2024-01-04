<?php
function them_sanpham($ten_hh, $don_gia, $giam_gia, $con_hh, $newFilePath, $ngay_nhap, $mota, $thong_tin_hh, $ma_loai)
{
    $sql = "INSERT INTO hang_hoa (ten_hh, don_gia, giam_gia, con_hh, hinh, ngay_nhap, mo_ta, thong_tin_hh, ma_loai) 
            VALUES ('$ten_hh', '$don_gia', '$giam_gia', '$con_hh', '$newFilePath', '$ngay_nhap', '$mota', '$thong_tin_hh', '$ma_loai')";
    pdo_execute($sql);
}
function lay_id_moinhat()
{
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC LIMIT 0, 1";
    //số sp lấy ra
    $lay_id_moinhat = pdo_query($sql);
    foreach ($lay_id_moinhat as $id) {
        extract($id);
        $lay_id_moinhat = $ma_hh;
    }
    return $lay_id_moinhat;
}
function them_anhsanpham($newName, $id_sanpham)
{
    $sql = "INSERT INTO img_chitietsanpham (idma_sp, hinh_chi_tiet) 
            VALUES ('$id_sanpham', '$newName')";
    pdo_execute($sql);
}
function capnhat_anhsanpham($newName, $id)
{
    $sql = "UPDATE img_chitietsanpham SET hinh_chi_tiet = '$newName' WHERE idma_sp = '$id'";
    pdo_execute($sql);
}
function xoa_anhchitiet($xoaId)
{
    $sql = "DELETE FROM img_chitietsanpham WHERE idma_sp = $xoaId";
    pdo_execute($sql);
}
function xoa_sanpham($xoaId)
{
    $sql = "DELETE FROM img_chitietsanpham WHERE idma_sp = $xoaId";
    pdo_execute($sql);
    $sql = "DELETE FROM binh_luan WHERE ma_hh = $xoaId";
    pdo_execute($sql);
    $sql = "DELETE FROM chi_tiet_don_hang WHERE ma_sp_donhang = $xoaId";
    pdo_execute($sql);
    $sql = "DELETE FROM hang_hoa WHERE ma_hh = $xoaId";
    pdo_execute($sql);
}
function list_sanpham()
{
    $sql = "SELECT * FROM hang_hoa order by ma_hh desc ";
    $result = pdo_query($sql);
    return $result;
}
function list_sanphamloc($tim_loc, $ma_loai)
{
    $sql = "SELECT * FROM hang_hoa where 1";
    if ($tim_loc != "") {
        $sql .= " and ten_hh like '%" . $tim_loc . "%'";
    }
    if ($ma_loai > 0) {
        $sql .= " and ma_loai ='" . $ma_loai . "' ";
    }
    $sql .= " order by ma_hh desc ";
    $result = pdo_query($sql);
    return $result;
}
function sua_sanpham($id)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_sanpham($ten_hh, $don_gia, $giam_gia, $con_hh, $newFilePath, $ngay_nhap, $mo_ta, $thong_tin_hh, $ma_loai, $id)
{
    if ($newFilePath != "") {
        $sql = "UPDATE hang_hoa SET ten_hh='$ten_hh', don_gia='$don_gia', giam_gia='$giam_gia', con_hh='$con_hh', hinh='$newFilePath' , ngay_nhap='$ngay_nhap', mo_ta='$mo_ta',thong_tin_hh='$thong_tin_hh',ma_loai='$ma_loai' WHERE ma_hh= '$id'";
    } else {
        $sql = "UPDATE hang_hoa SET ten_hh='$ten_hh', don_gia='$don_gia', giam_gia='$giam_gia', con_hh='$con_hh',ngay_nhap='$ngay_nhap', mo_ta='$mo_ta',thong_tin_hh='$thong_tin_hh',ma_loai='$ma_loai' WHERE ma_hh= '$id'";
    }
    pdo_execute($sql);
}

function check_sanpham($ten_hh)
{
    $ten_hh = addslashes($ten_hh);
    $sql = "SELECT count(*) FROM hang_hoa WHERE ten_hh = '$ten_hh'";
    return pdo_query_value($sql, $ten_hh) > 0;
}
function layTenLoaiBangMaLoai($ma_loai)
{
    $sql = "SELECT loai_hang.ten_loai
            FROM loai_hang
            INNER JOIN hang_hoa ON loai_hang.ma_loai = hang_hoa.ma_loai
            WHERE hang_hoa.ma_loai = :ma_loai";

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":ma_loai", $ma_loai, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["ten_loai"];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function layHinhChiTietBangMaHang($ma_hh)
{
    $sql = "SELECT img_chitietsanpham.hinh_chi_tiet
            FROM img_chitietsanpham
            INNER JOIN hang_hoa ON img_chitietsanpham.idma_sp = hang_hoa.ma_hh
            WHERE hang_hoa.ma_hh = :ma_hh";

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":ma_hh", $ma_hh, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function list_sanpham_trangchu()
{
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC LIMIT 0, 12";
    //số sp lấy ra
    $sanpham_trangchu = pdo_query($sql);
    return $sanpham_trangchu;
}
function list_sanpham_yeuthich()
{
    $sql = "SELECT * FROM hang_hoa WHERE 1 ORDER BY so_luot_xem DESC LIMIT 0, 8";
    //số sp lấy ra
    $sanpham_yeuthich = pdo_query($sql);
    return $sanpham_yeuthich;
}
function list_hinhtheoma_hh($id)
{
    $sql = "SELECT * FROM img_chitietsanpham where 1";
    if ($id > 0) {
        $sql .= " and idma_sp ='" . $id . "' ";
    }
    $sql .= " order by idma_sp desc ";
    $result = pdo_query($sql);
    return $result;
}
function sp_lienquan($id, $ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai = $ma_loai AND ma_hh <> '$id' LIMIT 4";
    $result = pdo_query($sql);
    return $result;
}
function load_ten_dm($ma_loai)
{
    $sql = "SELECT * FROM loai_hang WHERE ma_loai=" . $ma_loai;
    $loai_hang = pdo_query_one($sql);
    extract($loai_hang);
    return $ten_loai;
}
function tim_sanpham($tim_loc)
{
    $sql = "SELECT * FROM hang_hoa where 1";
    if ($tim_loc != "") {
        $sql .= " and ten_hh like '%" . $tim_loc . "%'";
    }
    $sql .= " order by ma_hh desc ";
    $result = pdo_query($sql);
    return $result;
}
function capnhat_luotxem($luotxem, $id)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = '$luotxem' WHERE ma_hh = '$id'";
    pdo_execute($sql);
}
