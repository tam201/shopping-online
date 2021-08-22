<?php
if (isset($_GET["ma"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        </link>
    </head>
    <title>Document</title>
    <style>
        .tt {
            position: absolute;
            height: 80%;
            width: 85%;
            left: 15%;
            top: 20%;
            font-size: 20px;
            padding: 0px 10px;
            background-color: #E0E0F8;
        }

        .a {
            text-align: center;
        }

        .tong {
            position: absolute;
            top: 50%;
            right: 5%;
            font-family: Calibri;
        }
    </style>
    </head>

    <body>
        <?php
        include("side-bar.php");
        include("header.php");
        ?>
        <div class="tt">
            <?php
            include("../connect/open.php");
            $ma = $_GET["ma"];

            $sql = "SELECT * FROM hoa_don_chi_tiet
             INNER JOIN hoa_don on hoa_don_chi_tiet.maHoaDon = hoa_don.maHoaDon
             INNER JOIN san_pham on hoa_don_chi_tiet.maSanPham = san_pham.maSanPham  where hoa_don_chi_tiet.maHoaDon = '$ma'";
            $sql1 = "SELECT * FROM hoa_don_chi_tiet where maHoaDon = '$ma'";
            $result1 = mysqli_query($con, $sql1);
            $result = mysqli_query($con, $sql);
            include("../connect/close.php");
            $tong = 0;
            ?>
            <table border="1" class="table table-striped">
                <tr class="a">
                    <th>Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá Bán</th>
                </tr>
                <?php while ($donhang = mysqli_fetch_array($result)) {
                    $a = mysqli_fetch_array($result1)
                ?>
                    <tr class="a">
                        <td><img src="<?php echo $donhang["hinhAnh"] ?>" width="150" height="200"></td>
                        <td><?php echo $donhang["tenSanPham"] ?></td>
                        <td><?php echo $a["soLuong"] ?></td>
                        <td><?php echo $donhang["giaBan"] * $a["soLuong"] ?></td>
                        <?php $tong = $tong + ($donhang["giaBan"] * $a["soLuong"]); ?>
                    </tr>
                <?php
                }
                ?>
                <div class="tong">
                    <h2>
                        <?php
                        echo "Tổng Tiền:    " . $tong;
                        ?></h2>
                </div>
            <?php
        }
            ?>