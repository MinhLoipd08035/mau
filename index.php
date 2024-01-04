
<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/loaihang.php";
include "model/taikhoan.php";
include "model/giohang.php";
include "giohang1.php";
if (!isset($_SESSION['gio_hang'])) {
    $_SESSION['gio_hang'] = [];
}
$sanpham_trangchu = list_sanpham_trangchu();
$loai_hang = list_loaihang();
$sanpham_yeuthich = list_sanpham_yeuthich();
include "wiew/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanphamchitiet':
            include "wiew/menu.php";
            if (isset($_GET['ma_hh']) && ($_GET['ma_hh'] > 0)) {
                $id = $_GET['ma_hh'];
                $chitietsp = sua_sanpham($id);
                $lay_hinh = list_hinhtheoma_hh($id);
                extract($chitietsp);
                $luotxem = $so_luot_xem + 1;
                capnhat_luotxem($luotxem, $id);
                $sp_cungloai = sp_lienquan($id, $ma_loai);
                include "wiew/sanphamchitiet.php";
                include "wiew/footer.php";
            } else {
                include "wiew/home.php";
                include "wiew/footer.php";
            }
            break;
            //tăng lượt xem
        case 'sanpham':
            include "wiew/menu.php";
            if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
                $ma_loai = $_GET['ma_loai'];
                $danhsach_sanpham = list_sanphamloc("", $ma_loai);
                $ten_sp = load_ten_dm($ma_loai);
                include "wiew/sanphamloaihang.php";
                include "wiew/footer.php";
            } else {
                include "wiew/home.php";
            }
            break;
        case 'sanpham1':
            include "wiew/menu.php";
            if (isset($_POST['tim_kiemsp']) && ($_POST['tim_kiemsp'] != "")) {
                # code...
                $tim_kiem = $_POST['tim_kiemsp'];
            } else {
                $tim_kiem = "";
            }
            $tim_sp = tim_sanpham($tim_kiem);
            include "wiew/sanphamchitiet2.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $ma_kh = $_POST['ten_dn'];
                $mat_khau = $_POST['mat_khau'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $target_dir = "upload/";
                $hinh = basename($_FILES["hinh"]["name"]);
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (!empty($hinh)) {
                    // Hình không rỗng, có tệp đã tải lên
                    if (file_exists($target_file)) {
                        $hinh = basename($_FILES["hinh"]["name"]);
                    } else {
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // Tải lên tệp tin mới thành công
                            $newFileName = basename($_FILES["hinh"]["name"]);
                            $hinh = $newFileName;
                        } else {
                            $loi["loianh"] = "Xin lỗi, tải ảnh lên không thành công.";
                        }
                    }
                } else {
                    // Hình rỗng, không có tệp đã tải lên
                    $hinh = "anhdaidien.jpg";
                }
                if (check_tendangnhap($ma_kh)) {
                    $loi["ten"] = "Tên đăng nhập đã tồn tại.";
                    $loi["ten1"] = "Đăng ký không thành công.";
                }
                if (empty($loi)) {
                    them_tai_khoan($ma_kh, $mat_khau, $ho_ten, $hinh, $email);
                    $loi["ten1"] = "Đăng ký thành công.";
                }
            }
            //dăng nhập
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $ma_kh1 = $_POST['ten_dndn'];
                $mat_khau1 = $_POST['mat_khaudn'];
                $trang_thai1 = 0;
                $check_dn = check_taikhoan($ma_kh1, $mat_khau1, $trang_thai1);
                if (is_array($check_dn)) {
                    $_SESSION['khach_hang'] = $check_dn;
                    echo '<meta http-equiv="refresh" content="0;url=index.php">';
                } else {
                    $loi["ten1"] = "Đăng Nhập Không Thành Công.";
                }
            }
            include "wiew/taikhoan/dangnhap.php";
            break;
        case 'quen_mk':
            if (isset($_POST['quen_mk']) && ($_POST['quen_mk'])) {
                $email = $_POST['email'];
                $check_email = check_email($email);
                if (is_array($check_email)) {
                    $thong_bao1 = "Tên đăng nhập của bạn là: " . $check_email['ma_kh'] . " Mật khẩu của bạn là: " . $check_email['mat_khau'];
                    // include "wiew/taikhoan/dangnhap.php";
                } else {
                    $thong_bao = "Email chưa đăng ký tài khoản.";
                }
            }
            include "wiew/taikhoan/quenmatkhau.php";
            break;
        case 'thoat':
            if (isset($_SESSION['khach_hang'])) {
                unset($_SESSION['khach_hang']);
            }
            echo '<meta http-equiv="refresh" content="0;url=index.php">';
            break;
        case 'capnhat_kh':
            if (isset($_POST['capnhatthongtin']) && ($_POST['capnhatthongtin'])) {
                $id = $_POST['id'];
                $ma_kh = $_POST['ten_dn'];
                $mat_khau = $_POST['mat_khau'];
                $sdt = $_POST['phone'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $target_dir = "upload/";
                $hinh = basename($_FILES["hinh"]["name"]);
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (!empty($hinh)) {
                    // Hình không rỗng, có tệp đã tải lên
                    if (file_exists($target_file)) {
                        $hinh = basename($_FILES["hinh"]["name"]);
                    } else {
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // Tải lên tệp tin mới thành công
                            $newFileName = basename($_FILES["hinh"]["name"]);
                            $hinh = $newFileName;
                        } else {
                            $loi["loianh"] = "Xin lỗi, tải ảnh lên không thành công.";
                        }
                    }
                } else {
                    // Hình rỗng, không có tệp đã tải lên
                    $hinh = "";
                }
                if ($id == $ma_kh) {
                    capnhat_khachhang($ma_kh, $mat_khau, $ho_ten, $hinh, $email, $id, $sdt);
                    $_SESSION['khach_hang'] = check_taikhoan1($ma_kh, $mat_khau);
                    $loi["thanhcong"] = "Cập nhật thành công.";
                    echo '<meta http-equiv="refresh" content="0;url=index.php">';
                } else {
                    if (check_tendangnhap($ma_kh)) {
                        $loi["loi2"] = "Tên đăng nhập đã tồn tại.";
                        include "wiew/taikhoan/capnhatthongtin.php";
                    }
                    if (empty($loi)) {
                        capnhat_khachhang($ma_kh, $mat_khau, $ho_ten, $hinh, $email, $id, $sdt);
                        $_SESSION['khach_hang'] = check_taikhoan1($ma_kh, $mat_khau);
                        $loi["thanhcong"] = "Cập nhật thành công.";
                        echo '<meta http-equiv="refresh" content="0;url=index.php">';
                    }
                }
            }
            include "wiew/taikhoan/capnhatthongtin.php";
            break;
        case 'themvaogiohang':
            //đskda
            if (isset($_SESSION['khach_hang'])) {
                $ma_kh = $_SESSION['khach_hang']['ma_kh'];
            } else {
                $ma_kh = "nguoi_ngoai";
            }
            if (isset($_POST['themvao_gio']) && $_POST['themvao_gio']) {
                $ma_sp = $_POST['ma_hh'];
                $tim_thay = false;
                foreach ($_SESSION['gio_hang'] as &$sanpham) {
                    if ($sanpham[0] == $ma_sp && $sanpham[6] == $ma_kh) {
                        $sanpham[4]++; // Tăng số lượng sản phẩm lên 1
                        $sanpham[5] = $sanpham[3] * $sanpham[4]; // Cập nhật tổng giá tiền
                        $tim_thay = true;
                        break;
                    }
                }
                // Nếu sản phẩm chưa tồn tại, thêm nó vào giỏ hàng
                if (!$tim_thay) {
                    $ma_kh = $_POST['ma_kh'];
                    $ten_hh = $_POST['ten_hh'];
                    $hinh = $_POST['hinh'];
                    $gia = $_POST['gia'];
                    $soluong = 1;
                    $gia_tien = $gia * $soluong;
                    $sanpham_giohang = [$ma_sp, $ten_hh, $hinh, $gia, $soluong, $gia_tien, $ma_kh];
                    array_push($_SESSION['gio_hang'], $sanpham_giohang);
                }
            }
            include "wiew/giohang/giohang2.php";
            break;
        case 'muahang':
            if (!isset($_SESSION['mua_hang'])) {
                $_SESSION['mua_hang'] = array();
            }
            $_SESSION['mua_hang'] = [];
            if (isset($_POST['mua_hang']) && $_POST['mua_hang']) {
                $ma_sp = $_POST['ma_hh'];
                $ma_kh = $_POST['ma_kh'];
                $ten_hh = $_POST['ten_hh'];
                $hinh = $_POST['hinh'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $gia_tien = $gia * $soluong;
                $sanpham_muahang = [$ma_sp, $ten_hh, $hinh, $gia, $soluong, $gia_tien, $ma_kh];
                array_push($_SESSION['mua_hang'], $sanpham_muahang);

                include "wiew/giohang/dathangtructiep.php";
            }
            break;
        case 'bill_muahang':
            $dat_hangok = false;
            if (isset($_POST['ok_dathang']) && $_POST['ok_dathang']) {
                if (isset($_SESSION['khach_hang'])) {
                    $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
                } else {
                    $ma_kh1 = "nguoi_ngoai";
                }
                $ten_dat_hang = $_POST['ten'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $dia_chi = $_POST['dia_chi'];
                $ghichu = $_POST['ghichu'];
                $tinh = $_POST['tinh'];
                $huyen = $_POST['huyen'];
                $xa = $_POST['xa'];
                $dia_chi_day_du = $dia_chi . ', ' . $xa . ', ' . $huyen . ', ' . $tinh;
                $phuong_thuc = $_POST['thanh_toan'];
                $ngay_dathang = date('h:i:s d/m/Y');
                $tong_tatca = $_POST['tongtienall'];
                $id_donhang = them_donhang($ten_dat_hang, $email, $phone, $dia_chi_day_du, $phuong_thuc, $ngay_dathang, $ghichu, $tong_tatca, $ma_kh1);
                foreach ($_SESSION['mua_hang'] as $muahang) {
                    if ($muahang[6] == $ma_kh1) {
                        them_chitiet_donhang($muahang[6], $muahang[0], $muahang[2], $muahang[1], $muahang[3], $muahang[4], $muahang[5], $id_donhang);
                    }
                }
                $_SESSION['mua_hang'] = [];
                $dat_hangok = true;
            }
            // $bill_donhang = bill_donhang($id_donhang);
            include "wiew/giohang/bill_donhang.php";
            break;
        case 'xoa_giohang':
            if (isset($_GET['id']) && isset($_SESSION['gio_hang'][$_GET['id']])) {
                unset($_SESSION['gio_hang'][$_GET['id']]);
                $_SESSION['gio_hang'] = array_values($_SESSION['gio_hang']);
            } else {
                $_SESSION['gio_hang'] = [];
            }
            // header('Location:index.php?act=xoa_giohang');
            include "wiew/giohang/giohang2.php";
            break;
        case 'dat_hang':
            include "wiew/giohang/dathang.php";
            break;
        case 'giohang':
            include "wiew/giohang/giohang2.php";
            break;
        case 'bill_dathang':
            $dat_hangok = false;
            if (isset($_POST['ok_dathang']) && $_POST['ok_dathang']) {
                if (isset($_SESSION['khach_hang'])) {
                    $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
                } else {
                    $ma_kh1 = "nguoi_ngoai";
                }
                $ten_dat_hang = $_POST['ten'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $dia_chi = $_POST['dia_chi'];
                $ghichu = $_POST['ghichu'];
                $tinh = $_POST['tinh'];
                $huyen = $_POST['huyen'];
                $xa = $_POST['xa'];
                $dia_chi_day_du = $dia_chi . ', ' . $xa . ', ' . $huyen . ', ' . $tinh;
                $phuong_thuc = $_POST['thanh_toan'];
                $ngay_dathang = date('h:i:s d/m/Y');
                $tong_tatca = $_POST['tongtienall'];
                $id_donhang = them_donhang($ten_dat_hang, $email, $phone, $dia_chi_day_du, $phuong_thuc, $ngay_dathang, $ghichu, $tong_tatca, $ma_kh1);
                foreach ($_SESSION['gio_hang'] as $giohang) {
                    if ($giohang[6] == $ma_kh1) {
                        them_chitiet_donhang($giohang[6], $giohang[0], $giohang[2], $giohang[1], $giohang[3], $giohang[4], $giohang[5], $id_donhang);
                    }
                }
                $_SESSION['gio_hang'] = [];
                $dat_hangok = true;
            }
            // $bill_donhang = bill_donhang($id_donhang);
            include "wiew/giohang/bill_donhang.php";
            break;
        case 'donhang':
            if (isset($_SESSION['khach_hang'])) {
                $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
            } else {
                $ma_kh1 = "nguoi_ngoai";
            }
            $list_donhang = list_donhang($ma_kh1);
            include "wiew/giohang/donhang.php";
            break;
        case 'xemchitiet':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $list_chitietdh = list_chi_tiet_donhang($id);
                $list_donhang_id = list_donhang_id($id);
            }
            include "wiew/giohang/chitietdonhang.php";
            break;
        case 'huydonhang':
            if (isset($_POST['huy_donhang']) && $_POST['huy_donhang']) {
                $trang_thai = 4;
                $id = $_POST['id'];
                capnhat_trangthai($trang_thai, $id);
            }
            if (isset($_SESSION['khach_hang'])) {
                $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
            }
            $list_donhang = list_donhang($ma_kh1);
            include "wiew/giohang/donhang.php";
            break;
        case 'datlaidonhang':
            if (isset($_POST['datlai_donhang']) && $_POST['datlai_donhang']) {
                $trang_thai = 0;
                $id = $_POST['id'];
                capnhat_trangthai($trang_thai, $id);
            }
            if (isset($_SESSION['khach_hang'])) {
                $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
            }
            $list_donhang = list_donhang($ma_kh1);
            include "wiew/giohang/donhang.php";
            break;
        case 'xacnhan':
            if (isset($_POST['da_nhan']) && $_POST['da_nhan']) {
                $trang_thai = 3;
                $id = $_POST['id'];
                capnhat_trangthai($trang_thai, $id);
            }
            if (isset($_SESSION['khach_hang'])) {
                $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
            }
            $list_donhang = list_donhang($ma_kh1);
            include "wiew/giohang/donhang.php";
            break;
        case 'datlai':
            if (isset($_POST['dat_lai']) && $_POST['dat_lai']) {
                $trang_thai = 0;
                $id = $_POST['id'];
                capnhat_trangthai($trang_thai, $id);
            }
            if (isset($_SESSION['khach_hang'])) {
                $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
            }
            $list_donhang = list_donhang($ma_kh1);
            include "wiew/giohang/donhang.php";
            break;
        case 'doidiachi':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $list_donhang_id = list_donhang_id($id);
            }
            include "wiew/giohang/doidiachi.php";
            break;
        case 'capnhatdiachi':
            if (isset($_POST['capnhat_diachi']) && $_POST['capnhat_diachi']) {
                $id = $_POST['id'];
                $dia_chi = $_POST['diachi'];
                capnhat_diachi($dia_chi, $id);
            }
            if (isset($_SESSION['khach_hang'])) {
                $ma_kh1 = $_SESSION['khach_hang']['ma_kh'];
            }
            $list_donhang = list_donhang($ma_kh1);
            include "wiew/giohang/donhang.php";
            break;
        case 'lienhe':
            include "wiew/lienhe.php";
            break;
        case 'gioithieu':
            include "wiew/gioithieu.php";
            include "wiew/footer.php";
            break;
        default:
            include "wiew/menu.php";
            include "wiew/home.php";
            include "wiew/footer.php";
            break;
    }
} else {
    include "wiew/menu.php";
    include "wiew/home.php";
    include "wiew/footer.php";
}
?>