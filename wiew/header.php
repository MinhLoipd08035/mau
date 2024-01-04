<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a1d476d54a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="wiew/css/header.css">
    <link rel="stylesheet" href="wiew/css/home.css">
    <link rel="stylesheet" href="wiew/css/spchitiet.css">
    <link rel="stylesheet" href="wiew/css/from.css">
    <title>Document</title>
</head>

<body>
    <!-- Navigation -->
    <div class="">
        <header class="topbar">
            <div class="container">
                <div class="row">
                    <!-- social icon-->
                    <div class="col-sm-12">
                        <ul class="social-network">
                            <li>
                                <div class="search">
                                    <form action="index.php?act=sanpham1" method="post">
                                        <input placeholder="Search..." name="tim_kiemsp" type="text">
                                        <input type="submit" name="tim_sp" value="Tìm">
                                    </form>
                                </div>
                            </li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
            <div class="container">
                <a class="navbar-brand" rel="nofollow" target="_blank" href="#" style="text-transform: uppercase;">Shop Minh Lợi</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=gioithieu"><i class="fas fa-leaf"></i> Giới Thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=lienhe"><i class="fas fa-pencil-alt"></i> Liên Hệ</a>
                        </li>
                       
                        <?php
                        if (isset($_SESSION['khach_hang'])) {
                        ?>
                            <li class="nav-item">
                                <a style="color:#FF6600	;" class="nav-link" href="index.php?act=donhang"><i class="fa-solid fa-truck"></i>Đơn hàng</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a style="color:#FF6600	;" class="nav-link" href="index.php?act=giohang"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
                        </li>
                        <?php
                        if (isset($_SESSION['khach_hang'])) {
                            $ten = $_SESSION['khach_hang']['ho_ten'];
                            $hinhanh = $_SESSION['khach_hang']['hinh'];
                            $vai_tro = $_SESSION['khach_hang']['vai_tro'];
                        ?>
                            <img src="upload/<?= $hinhanh ?>" alt="hinh" class="round-image">
                            <span class="xinchao"> <?= $ten ?></span>
                            <a class="sua_taikhoan" href="index.php?act=capnhat_kh">Sửa</a>
                            <?php
                            if ($vai_tro == 1) { ?>
                                <a class="vaoquantri" href="admin/index.php" target="_blank">Quản trị</a>
                            <?php }
                            ?>
                            <a class="thoat_taikhoan" href="index.php?act=thoat"><i class="fas fa-sign-out-alt"></i></a>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=dangnhap"><i class="fa-solid fa-user"></i>Đăng nhập</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>