<?php
session_start();
include("../connect/open.php");
$email = $_SESSION["email"];
$sql = "SELECT * FROM `khach_hang` WHERE email='$email'";
$result = mysqli_query($con, $sql);
$khachHang = mysqli_fetch_array($result);
include("../connect/close.php");
if (!isset($_SESSION["email"])) {
    header("Location: form-dang-nhap.php");
}
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



    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>
    <?php
    include("../connect/open.php");


    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
        $gioHang =  $_SESSION["cart"];
    }
    $error = false;

    if (isset($_GET["action"])) {
        function update_cart($add = false)
        {
            foreach ($_POST['quantity'] as $maSanPham => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION["cart"][$maSanPham]);
                } else {
                    if ($add) {
                        $_SESSION["cart"][$maSanPham] += $quantity;
                    } else {
                        $_SESSION["cart"][$maSanPham] = $quantity;
                    }
                }
            }
        }

        switch ($_GET['action']) {
            case "add":
                update_cart(true);

                header("Location: ./gio-hang.php");
                break;

            case "delete":

                if (isset($_GET['maSanPham'])) {
                    unset($_SESSION["cart"][$_GET['maSanPham']]);
                }
                header("Location: ./gio-hang.php");
                break;

            case "submit":

                if (isset($_POST['update_click'])) {
                    update_cart();

                    header("Location: ./gio-hang.php");
                } elseif (isset($_POST['oder_click'])) {
                    update_cart();
                    if (empty($_POST["hoTen"])) {
                        $error = "Bạn chưa nhập đủ thông tin";
                    } else if (empty($_POST["dienThoai"])) {
                        $error = "Bạn chưa nhập đủ thông tin";
                    } else if (empty($_POST["diaChi"])) {
                        $error = "Bạn chưa nhập đủ thông tin";
                    } else if (empty($_POST['quantity'])) {
                        $error = "Giỏ hàng rỗng";
                    }
                    if ($error == false && !empty($_POST['quantity'])) {
                    }
                    // echo $error;
                    // exit;
                }
                break;
        }
    }
    if (!empty($_SESSION["cart"])) {
        $sql = "SELECT * FROM `san_pham` WHERE maSanPham IN(" . implode(",", array_keys($_SESSION["cart"])) . ")";
        $result = mysqli_query($con, $sql);
    }
    ?>
    <div class="cart">
        <?php if (!empty($error)) { ?>
            <div id="notity-msg">
                <?= $error ?>.<a href="javascript:history.back()"><u>Quay lại</u></a>
            </div>
        <?php } else { ?>
            <h1><b>Giỏ hàng</b></h1>

            <form id="cart-form" action="gio-hang.php?action=submit" method="post">
                <table>
                    <tr>
                        <th class="stt">STT</th>
                        <th class="ten">Tên sản Phầm</th>
                        <th class="hinhAnh"> Ảnh sản phẩm</th>
                        <th class="gia">Giá</th>
                        <th class="number">Số lượng</th>
                        <th class="tong-tien">Thành tiền</th>
                        <th class="product-delete">Xóa</i></th>
                    </tr>
                    <?php
                    if (!empty($result)) {
                        $num = 1;
                        $tongtien = 0;
                        while ($row = mysqli_fetch_array($result)) {
                    ?>


                            <tr>
                                <td class="stt"><?= $num++; ?></td>
                                <td class="ten"><?= $row['tenSanPham'] ?></td>
                                <td class="hinhAnh"><img src="<?= $row['hinhAnh'] ?>" width="100px" height="100px"></td>
                                <td class=" gia"><?= $row['giaTien'] ?></td>
                                <td class="number"><input type="number" name="quantity[<?= $row['maSanPham'] ?>]" value="<?= $_SESSION["cart"][$row['maSanPham']] ?>" size="2"></td>

                                <td class="tong-tien"><?= $thanhtien = $row['giaTien'] * $_SESSION["cart"][$row['maSanPham']] ?></td>
                                <td class="product-delete"><a href="gio-hang.php?action=delete&maSanPham=<?= $row['maSanPham'] ?>">Xóa</a></td>
                            </tr>
                        <?php
                            $num++;
                            // $tongtien = $thanhtien + $tongtien;
                            $tongtien += $thanhtien;
                        }
                        ?>

                        <tr>
                            <th class="">&nbsp;</th>
                            <th class="">Tổng tiền:</th>
                            <th class="">&nbsp;</th>
                            <th class="">&nbsp;</th>
                            <th class="">&nbsp;</th>
                            <th class="money"><?= $tongtien ?></th>
                            <th class="">&nbsp;</th>
                        </tr>
                    <?php
                    }
                    ?>

                </table>

                <div id="form-button">
                    <input type="submit" name="update_click" value="Cập nhập">
                </div>


            </form>

            <a href="San-pham.php"><button class="">Tiếp tục mua hàng</button></a>
        <?php } ?>
        <hr>
        </hr>
        <form action="dat-hang-process.php" method="post">
            <input type="hidden" name="maKhachHang" value="<?php echo $khachHang["maKhachHang"] ?>">
            <div class="dat-hang">Người nhận:<input type="text" value="<?php echo $khachHang["tenKhachHang"] ?>" name="name" id="name"> </div>
            <div class="dat-hang">Điện thoại:<input type="text" value="<?php echo $khachHang["dienThoai"] ?>" name="phone" id="phone"></div>
            <div class="dat-hang">Địa chỉ:<input type="text" value="<?php echo $khachHang["diaChi"] ?>" name="address" id="address"></div>
            <!-- <div class="dat-hang">Ngày xuất hóa đơn:<input type="date" value="" name="date" name="date"></div> -->
            <div class="dat-hang">Ghi chú:<textarea type="text" name="note" cols="50" rows="7"></textarea></div>
            <input type="submit" name="oder_click" value="Đặt hàng" class="button1">

        </form>
        <form action="lich-su-mua-hang.php">
            <input type="submit" name="oder_click" value="Lich su mua hang" class="button1">
        </form>
    </div>


    <?php
    include("footer.php");
    ?>
</body>

</html>