<?php
function them_tai_khoan($ma_kh, $mat_khau, $ho_ten, $hinh, $email)
{
    $sql = "INSERT INTO khach_hang (ma_kh, mat_khau,ho_ten,hinh,email) VALUES ('$ma_kh', '$mat_khau', '$ho_ten', '$hinh', '$email')";
    pdo_execute($sql);
}
function them_tai_khoan2($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro)
{
    $sql = "INSERT INTO khach_hang (ma_kh, mat_khau, ho_ten, kich_hoat, hinh, email, vai_tro)
            VALUES ('$ma_kh', '$mat_khau', '$ho_ten', '$kich_hoat', '$hinh', '$email', '$vai_tro')";
    pdo_execute($sql);
}
function list_khachhang()
{
    $sql = "SELECT * FROM khach_hang order by ma_kh desc ";
    $result = pdo_query($sql);
    return $result;
}
function sua_khachhang($id)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh='$id'";
    $result = pdo_query_one($sql);
    return $result;
}
function check_tendangnhap($ten_lh)
{
    $ten_lh = addslashes($ten_lh);
    $sql = "SELECT count(*) FROM khach_hang WHERE ma_kh = '$ten_lh'";
    return pdo_query_value($sql, $ten_lh) > 0;
}
function check_taikhoan($ma_kh1, $mat_khau1, $trangthai1)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh='" . $ma_kh1 . "' AND mat_khau ='" . $mat_khau1 . "' AND kich_hoat ='" . $trangthai1 . "'";
    $result = pdo_query_one($sql);
    return $result;
}
function check_taikhoan1($ma_kh1, $mat_khau1)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh='" . $ma_kh1 . "' AND mat_khau ='" . $mat_khau1 . "'";
    $result = pdo_query_one($sql);
    return $result;
}
function check_email($email)
{
    $sql = "SELECT * FROM khach_hang WHERE email='" . $email . "'";
    $result = pdo_query_one($sql); 
    return $result;
}
function capnhat_khachhang($ma_kh, $mat_khau, $ho_ten, $hinh, $email, $id,$sdt)
{
    // Check if $hinh is not empty
    if (!empty($hinh)) {
        $sql = "UPDATE khach_hang SET ma_kh='$ma_kh', mat_khau='$mat_khau', ho_ten='$ho_ten', hinh='$hinh', email='$email', sdt='$sdt' WHERE ma_kh='$id'";
    } else {
        $sql = "UPDATE khach_hang SET ma_kh='$ma_kh', mat_khau='$mat_khau', ho_ten='$ho_ten', email='$email', sdt='$sdt' WHERE ma_kh='$id'";
    }

    pdo_execute($sql);
}

function capnhat_khachhang2($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro, $id)
{
    // Kiểm tra xem $hinh có được cung cấp hay không
    if (!empty($hinh)) {
        $sql = "UPDATE khach_hang SET ma_kh='$ma_kh', mat_khau='$mat_khau', ho_ten='$ho_ten', kich_hoat='$kich_hoat', hinh='$hinh', email='$email', vai_tro='$vai_tro' WHERE ma_kh='$id'";
    } else {
        // Không cập nhật hình nếu $hinh là rỗng
        $sql = "UPDATE khach_hang SET ma_kh='$ma_kh', mat_khau='$mat_khau', ho_ten='$ho_ten', kich_hoat='$kich_hoat', email='$email', vai_tro='$vai_tro' WHERE ma_kh='$id'";
    }

    pdo_execute($sql);
}
