<?php
// if (isset($_SESSION['khach_hang'])) {
//     $vai_tro = $_SESSION['khach_hang']['vai_tro'];
//     if ($vai_tro == 1) {
include "connect.php";
include "../model/pdo.php";
include "../model/loaihang.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/giohang.php";
include "../model/thongke.php";
include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'name':
            include "loaihang/add.php";
            break;
        case 'sanpham':
            $result = list_loaihang();
            include "sanpham/add.php";
            break;
        case 'addloaihang':
            // kiểm tra người dùng có kick vào thêm hay o
            if (isset($_POST['addloaihang']) && ($_POST['addloaihang'])) {
                $ten_lh = $_POST['ten_lh'];

                if (check_loaihang($ten_lh)) {
                    $loi["loi2"] = "Tên Loại hàng đã tồn tại.";
                } else {
                    if (empty($loi)) {
                        them_loaihang($ten_lh);
                        $thongbao = 'Thêm thành công';
                    }
                }
            }
            $result = list_loaihang();
            include "loaihang/add.php";
            break;
        case 'listdanhmuc':
            $result = list_loaihang();
            include "loaihang/listl_loaihang.php";
            break;
        case 'xoa_loaihang':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $xoaId = $_GET['id'];
                xoa_loaihang($xoaId);
            }
            $result = list_loaihang();
            include "loaihang/listl_loaihang.php";
            break;
        case 'sua_loaihang':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $result = sua_loaihang($id);
            }
            include "loaihang/sua_loaihang.php";
            break;
        case 'capnhatloaihang':
            if (isset($_POST['capnhatloaihang']) && ($_POST['capnhatloaihang'])) {
                $id = $_POST["id"];
                $ma_lh = $_POST["ma_lh"];
                $ten_lh = $_POST["ten_lh"];

                if (empty($ma_lh)) {
                    $loi["loi1"] = "Nhập mã loại hàng";
                }
                if (empty($ten_lh)) {
                    $loi["loi2"] = "Nhập tên loại hàng";
                }
                if (empty($loi)) {
                    capnhat_loaihang($ma_lh, $ten_lh, $id);
                }
                $result = list_loaihang();
                include "loaihang/listl_loaihang.php";
            }
            break;
            /* sanpham */
        case 'addsanpham':
            // kiểm tra người dùng có kick vào thêm hay o
            $result = list_loaihang();
            if (isset($_POST['addsanpham']) && ($_POST['addsanpham'])) {
                $ma_loai = $_POST['ma_loai'];
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $thong_tin_hh = $_POST['thongtinsp'];
                $mota = $_POST['mota'];
                if (isset($don_gia)) {
                    if ($giam_gia >= 0 && $giam_gia <= 100) {
                        $con_hh = $don_gia - ($don_gia * ($giam_gia / 100));
                    } else {
                        $con_hh = $don_gia;
                    }
                }
                $ngay_nhap = date("y-m-d");
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if ($_FILES["hinh"]["size"] > 5000000) {
                    $uploadOk = 0;
                }
                if (
                    $imageFileType != "jpg" &&
                    $imageFileType != "png" &&
                    $imageFileType != "jpeg" &&
                    $imageFileType != "gif" &&
                    $imageFileType != "jfif"
                ) {
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    $loi["loianh"] = "Chưa có hình ảnh hoặc hình ảnh bị lỗi.";
                } else {
                    if (file_exists($target_file)) {
                        $newFilePath = basename($_FILES["hinh"]["name"]);
                    } else {
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            // Tải lên tệp tin mới thành công
                            $newFileName = basename($_FILES["hinh"]["name"]);
                            $newFilePath = $newFileName;
                        } else {
                            $loi["loianh"] = "Xin lỗi, tải ảnh lên không thành công.";
                        }
                    }
                }
                if (check_sanpham($ten_hh)) {
                    $loi["loi2"] = "Tên sản phẩm đã tồn tại.";
                } else {
                    if (empty($loi)) {
                        them_sanpham($ten_hh, $don_gia, $giam_gia, $con_hh, $newFilePath, $ngay_nhap, $mota, $thong_tin_hh, $ma_loai);
                        $thongbao = 'Thêm thành công';
                    }
                }
                $id_sanpham_moi = lay_id_moinhat();
                foreach ($_FILES['hinhmota']['name'] as $key => $name) {
                    $tmpName = $_FILES['hinhmota']['tmp_name'][$key];
                    $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                    $newName = basename($name); // Lấy tên gốc của tệp ảnh
                    $target_file1 = $target_dir . $newName;
                    // Di chuyển tệp ảnh vào thư mục tải lên trên máy chủ
                    if (file_exists($target_file1)) {
                        $newName = basename($name);
                    } else {
                        if (move_uploaded_file($tmpName, $target_dir . $newName)) {
                            $newName = basename($name);
                        } else {
                            $loi["loianh"] = "Xin lỗi, tải ảnh lên không thành công.";
                        }
                    }
                    them_anhsanpham($newName, $id_sanpham_moi);
                }
            }
            include "sanpham/add.php";
            break;
        case 'listsanpham':
            if (isset($_POST['locsp']) && ($_POST['locsp'])) {
                $tim_loc = $_POST["timloc"];
                $ma_loai = $_POST["sapxep"];
            } else {
                $tim_loc = "";
                $ma_loai = 0;
            }
            $result_loaihang = list_loaihang();
            $result = list_sanphamloc($tim_loc, $ma_loai);
            include "sanpham/listl_sanpham.php";
            break;
        case 'xoa_sanpham':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $xoaId = $_GET['id'];
                xoa_sanpham($xoaId);
            }
            $result_loaihang = list_loaihang();
            $result = list_sanpham();
            include "sanpham/listl_sanpham.php";
            break;
        case 'sua_sanpham':
            $result1 = list_loaihang();
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $result = sua_sanpham($id);
            }
            include "sanpham/sua_sanpham.php";
            break;
        case 'capnhatsanpham':
            if (isset($_POST['capnhatsanpham']) && ($_POST['capnhatsanpham'])) {
                $id = $_POST["id"];
                $ma_loai = $_POST['ma_loai'];
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                if (isset($don_gia)) {
                    if ($giam_gia >= 0 && $giam_gia <= 100) {
                        $con_hh = $don_gia - ($don_gia * ($giam_gia / 100));
                    } else {
                        $con_hh = $don_gia;
                    }
                }
                $ngay_nhap = date("y-m-d");
                $mo_ta = $_POST['mo_ta'];
                $thong_tin_hh = $_POST['thongtinsp'];

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $uploadOk = 1;

                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if ($imageFileType != "") {
                    if ($_FILES["hinh"]["size"] > 5000000) {
                        $uploadOk = 0;
                    }
                    if (
                        $imageFileType != "jpg" &&
                        $imageFileType != "png" &&
                        $imageFileType != "jpeg" &&
                        $imageFileType != "gif" &&
                        $imageFileType != "jfif"
                    ) {
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 0) {
                        $loi["loianh"] = " Hình ảnh bị lỗi.";
                    } else {
                        if (file_exists($target_file)) {
                            $newFilePath = $target_file;
                        } else {
                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                // Tải lên tệp tin mới thành công
                                $newFileName = basename($_FILES["hinh"]["name"]);
                                $newFilePath = $target_file;
                            } else {
                                $loi["loianh"] = "Xin lỗi, tải ảnh lên không thành công.";
                            }
                        }
                    }
                } else {
                    $newFilePath = "";
                }
                if (empty($loi)) {
                    capnhat_sanpham($ten_hh, $don_gia, $giam_gia, $con_hh, $newFilePath, $ngay_nhap, $mo_ta, $thong_tin_hh, $ma_loai, $id);
                }
                if (isset($_FILES['hinhmota'])) {
                    $ten_anh = $_FILES['hinhmota']['name'];
                    if (!empty($ten_anh[0])) {
                        xoa_anhchitiet($id);
                        foreach ($_FILES['hinhmota']['name'] as $key => $name) {
                            $tmpName = $_FILES['hinhmota']['tmp_name'][$key];
                            $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                            $newName = basename($name); // Lấy tên gốc của tệp ảnh
                            $target_file2 = $target_dir . $newName;
                            // Di chuyển tệp ảnh vào thư mục tải lên trên máy chủ
                            if (file_exists($target_file2)) {
                                $newName = basename($name);
                            } else {
                                if (move_uploaded_file($tmpName, $target_dir . $newName)) {
                                } else {
                                    $loi["loianh"] = "Xin lỗi, tải ảnh lên không thành công.";
                                }
                            }
                            them_anhsanpham($newName, $id);
                        }
                    }
                }

                $result_loaihang = list_loaihang();
                $result = list_sanpham();
                include "sanpham/listl_sanpham.php";
            }
            break;
        case 'khachhang':
            if (isset($_POST['them_tai_khoan']) && ($_POST['them_tai_khoan'])) {
                $ma_kh = $_POST['ten_dn'];
                $mat_khau = $_POST['mat_khau'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $kich_hoat = $_POST['kich_hoat'];
                $vai_tro = $_POST['vai_tro'];
                $target_dir = "../upload/";
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
                    $loi["ten1"] = "Thêm không thành công.";
                }
                if (empty($loi)) {
                    them_tai_khoan2($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
                    $loi["ten1"] = "Thêm thành công.";
                }
            }
            include "khachhang/add.php";
            break;
        case 'listkhachhang':
            $result = list_khachhang();
            include "khachhang/list_khachhang.php";
            break;
        case 'sua_khachhang':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $result = sua_khachhang($id);
            }
            include "khachhang/sua_khachhang.php";
            break;
        case 'capnhatkhachhang':
            if (isset($_POST['capnhatthongtin']) && ($_POST['capnhatthongtin'])) {
                $id = $_POST['id'];
                $ma_kh = $_POST['ten_dn'];
                $mat_khau = $_POST['mat_khau'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $kich_hoat = $_POST['kich_hoat'];
                $vai_tro = $_POST['vai_tro'];
                $target_dir = "../upload/";
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
                    capnhat_khachhang2($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro, $id);
                } else {
                    if (check_tendangnhap($ma_kh)) {
                        $loi["ten"] = "Tên đăng nhập đã tồn tại.";
                    }
                    if (empty($loi)) {
                        capnhat_khachhang2($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro, $id);
                    }
                }
            } 
            break;
        case 'binhluan':
            $list_binhluan = list_binhluan();
            include "binhluan/list_binhluan.php";
            break;
        case 'xoa_binhluan':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $xoaId = $_GET['id'];
                xoa_binhluan($xoaId);
            }
            $list_binhluan = list_binhluan();
            include "binhluan/list_binhluan.php";
            break;
        case 'donhang':
            $list_donhang = list_donhang_admin();
            include "donhang/list_donhang.php";
            break;
        case 'xac_nhan':
            if (isset($_POST['xac_nhan_donhang']) && $_POST['xac_nhan_donhang']) {
                $trang_thai = 1;
                $id = $_POST['id'];
                capnhat_trangthai($trang_thai, $id);
            }
            $list_donhang = list_donhang_admin();
            include "donhang/list_donhang.php";
            break;
        case 'van_chuyen':
            if (isset($_POST['ben_thu3']) && $_POST['ben_thu3']) {
                $trang_thai = 2;
                $id = $_POST['id'];
                capnhat_trangthai($trang_thai, $id);
            }
            $list_donhang = list_donhang_admin();
            include "donhang/list_donhang.php";
            break;
        case 'xemthem_donhang':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $list_chitietdh = list_chi_tiet_donhang($id);
            }
            include "donhang/xemthem_donhang.php";
            break;
        case 'thong_ke':
            $list_thongke = thongke();
            include "thongke/thongke.php";
            break;
        case 'xembieudo':
            $list_thongke = thongke();
            include "thongke/bieudo.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
// }else{
//     echo "BẠN KHÔNG CÓ VAI TRÒ QUẢN TRỊ";
// }
// }else{
//     echo "VUI LÒNG ĐĂNG NHẬP VỚI VAI TRÒ ADMIN";
// }