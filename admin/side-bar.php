<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    </link>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        .menu {
            height: 100%;
            width: 15%;
            position: fixed;
            z-index: 1;
            top: 20%;
            left: 0;
            background-color: #FA58AC;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .menu a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: white;
            display: block;
        }

        .menu a:hover {
            color: black;
        }
    </style>

</head>

<body>


    <div class="menu" id="sidebar">
        <a href="#"><i class="fas fa-bars"></i> MENU</a>
        <a href="thong-tin.php"><?php if ($_SESSION["quyen"] == "Superadmin") { ?><i class="fas fa-users"></i> Quản lý nhân viên
            <?php
                                } ?></a>
        <?php if ($_SESSION["quyen"] == "Superadmin") { ?>
            <a href="spad.php"><i class="fas fa-user"></i> Thông tin cá nhân</a>
        <?php
        } else {
        ?>
            <a href="thong-tin.php"><i class="fas fa-user"></i> Thông tin cá nhân</a>
        <?php
        }
        ?>
        <a href="thuonghieu.php"><i class="fas fa-trademark"></i> Thương Hiệu</a>
        <a href="theloai.php"><i class="fas fa-vest-patches"> </i> Thể Loại</a>
        <a href="don-hang.php"><i class="fas fa-money-bill"></i> Đơn Hàng</a>
        <a href="khachHang.php"><i class="far fa-user"> </i> Khách hàng</a>
        <a href="trangql.php"><i class="fab fa-product-hunt"></i> Sản Phẩm</a>
        <a href="dang-xuat.php"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
    </div>
</body>

</html>