<?php
session_start();
if (!isset($_GET["maSanPham"])) {
    header("Location: san-pham.php");
}
$maSanPham = $_GET["maSanPham"];
include("../connect/open.php");
$sql = "SELECT * FROM san_pham
            INNER JOIN thuong_hieu ON thuong_hieu.maThuongHieu = san_pham.maThuongHieu
            INNER JOIN the_loai ON the_loai.maTheLoai = san_pham.maTheLoai
            WHERE san_pham.maSanPham='$maSanPham'";
// var_dump($sanpham);
// exit;
$result = mysqli_query($con, $sql);
$sanpham = mysqli_fetch_array($result);
include("../connect/close.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        #product-img {
            width: 30%;
            height: 100px;
            float: left;

        }

        #froduct-info {
            float: right;
            width: 70%;
            text-align: left;
            padding-left: 30px;
        }

        #product-sp {
            border-top: 1px solid black;
            padding: 15px 0 0 0;
            display: block;
        }

        #product-img img {
            max-width: 76%;
            padding: 5px;
            border: 1px solid black;
            background: #eee;

        }

        label.add-to-cart {
            background: #000;
            border: 1px solid #000;
            margin-top: 15px;
            padding: 15px;
            display: inline-block;
            margin-left: 397px;

        }

        a:link,
        a:visited {
            color: aqua;
            text-decoration: none;
        }

        label a {
            color: wheat;
            text-decoration: none;

        }

        #gallery {
            margin-top: 10px;

        }

        #gallery ul {
            margin: 0;
            padding: 0;
        }

        #gallery ul li {
            width: 150px;
            float: left;
            list-style: none;
            margin-right: 5px;
            margin-bottom: 5px;
            height: 100px;
            text-align: center;
            padding: 0px;
            border: 1px solid #000;
            background: #eee;
            margin-left: 600px;
        }

        #gallery ul li img {
            max-width: 76%;
            max-height: 100%;
            vertical-align: middle;

        }

        .clear-both {
            clear: both;
        }

        a {
            text-decoration: none;
        }

        #product-price {
            color: red;
            font-weight: bold;
        }

        /* .product-items {
            border: 1px solid #ccc;
            padding: 30px;
        } */

        .container {
            width: 1000px;
            margin: 0 auto;
            /* border: 1px solid #000; */
            padding: 15px;
            margin-top: 70px;
            margin-bottom: 291px;
        }

        * {
            box-sizing: border-box;
        }

        #add-to-cart-form {
            margin-left: 373px;
            margin-bottom: 15px;
        }

        .button {
            width: 169px;
            height: 40px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: #45a049;
            color: white;
            text-align: center;
        }

        .button:hover {
            font-size: 15px;
        }

        #add-to-cart-form input.sl {
            margin-bottom: 10px;

        }

        #product-img {
            width: 302px;
            height: 288px;
            margin-left: 59px;
        }

        h2 {
            font-family: sans-serif;
            color: black;
            margin-top: 71px;
        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>
    <div class="container">
        <h2>Chi tiết sản phẩm</h2>
        <hr>
        <!-- <div id="product-sp"> -->
        <div id="product-img">
            <img src="<?= $sanpham['hinhAnh']; ?>">
        </div>
        <div id="product-info">
            <h1><?php echo $sanpham["tenSanPham"]; ?></h1><br>


            <p>Giá: <?php echo $sanpham["giaTien"]; ?><span class="product-price"> VND</span></p><br>
            <p>Thuong hieu: <?php echo $sanpham["tenThuongHieu"] ?></p><br>
            <p>The loai: <?php echo $sanpham["tenTheLoai"] ?></p><br><br>
            <!-- <p>Tình trạng: <span class="glyphicon glyphicon-ok"></span>Có hàng</p> -->
            <form id="add-to-cart-form" action="gio-hang.php?action=add" method="POST">
                Số lượng: <input type="number" class="sl" value="1" name="quantity[<?php echo $sanpham['maSanPham'] ?>]" size="1" /><br>
                <input type="submit" class="button" value="Mua sản phẩm">
                <input type="submit" class="button" value="Thêm vào giỏ hàng">

            </form>
            <!-- <div id="gallery">
                <ul>
                    <li><img src="<?php $row['hinhAnh']; ?>"></li>
                </ul>
            </div> -->
            <div class=" clear-both">
                <?php
                echo $sanpham["moTa"]
                ?>
            </div>

        </div>
    </div>

    <?php
    include("footer.php");
    ?>

</body>

</html>