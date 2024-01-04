<?php
function them_donhang($ten_dat_hang, $email, $phone, $dia_chi_day_du, $phuong_thuc, $ngay_dathang, $ghichu, $tong_tatca, $ma_kh1)
{
    $sql = "INSERT INTO don_hang (ten_kh, email, phone, dia_chi_day_du, phuong_thuc, ngay_dathang, ghichu ,tong_tatca,ma_kh_dh) 
            VALUES ('$ten_dat_hang', '$email', '$phone', '$dia_chi_day_du', '$phuong_thuc', '$ngay_dathang','$ghichu', '$tong_tatca', '$ma_kh1')";
    return pdo_execute_last_id($sql);
}
function them_chitiet_donhang($ma_kh_donhang, $ma_sp_donhang, $hinh, $ten_sp_donhang, $gia, $so_luong, $thanh_tien, $id_donhang)
{
    $sql = "INSERT INTO chi_tiet_don_hang (ma_kh_donhang , ma_sp_donhang , hinh, ten_sp_donhang, gia, so_luong, thanh_tien ,id_donhang ) 
            VALUES ('$ma_kh_donhang ', '$ma_sp_donhang ', '$hinh', '$ten_sp_donhang', '$gia', '$so_luong','$thanh_tien', '$id_donhang ')";
    return pdo_execute_last_id($sql);
}

function list_donhang($ma_kh)
{
    $sql = "SELECT * FROM don_hang WHERE ma_kh_dh='$ma_kh'";
    $result = pdo_query($sql);
    return $result;
}
function layTongSoLuongChiTietDonHang($idDonHang)
{
    $sql = "SELECT SUM(so_luong) AS tong_so_luong
            FROM chi_tiet_don_hang
            WHERE id_donhang = :id_donhang";

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id_donhang", $idDonHang, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["tong_so_luong"];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function layTrangThaiDonHang($trangThai)
{
    switch ($trangThai) {
        case 0:
            return "Chờ xác nhận";
        case 1:
            return "Đã xác nhận";
        case 2:
            return "Đang giao";
        case 3:
            return "Đã nhận hàng";
        case 4:
            return "Đã hủy";
        default:
            return "Trạng thái không xác định";
    }
}
function list_chi_tiet_donhang($id)
{
    $sql = "SELECT * FROM chi_tiet_don_hang WHERE id_donhang='$id'";
    $result = pdo_query($sql);
    return $result;
}
function list_donhang_id($id)
{
    $sql = "SELECT * FROM don_hang WHERE id='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function capnhat_trangthai($trangthai, $id)
{
    $sql = "UPDATE don_hang SET trang_thai_don_hang = '$trangthai' WHERE id = '$id'";
    pdo_execute($sql);
}
function capnhat_diachi($diachi, $id)
{
    $sql = "UPDATE don_hang SET dia_chi_day_du = '$diachi' WHERE id = '$id'";
    pdo_execute($sql);
}
function list_donhang_admin()
{
    $sql = "SELECT * FROM don_hang order by id desc ";
    $result = pdo_query($sql);
    return $result;
}