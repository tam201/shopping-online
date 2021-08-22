<?php
session_start();
if ($_SESSION["user"]) {
    if (isset($_GET["maSanPham"])) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                .main {
                    position: absolute;
                    height: 80%;
                    width: 85%;
                    left: 15%;
                    top: 20%;
                    font-size: 20px;
                    padding: 0px 10px;
                    background-color: #E0E0F8;
                }

                .tt1 {
                    width: 100%;
                }
            </style>
        </head>

        <body>
            <?php
            $a = 1;
            include("header.php");
            $id = $_GET["maSanPham"];
            include("../connect/open.php");
            $sql = "SELECT *FROM `san_pham` WHERE san_pham.maSanPham=$id";
            $result = mysqli_query($con, $sql);
            include("../connect/close.php");
            ?>
            <?php
            include("side-bar.php");
            ?>
            <div class="main">
                <table class="tt1" align="center">
                    <th class="t">Mã sản phẩm</th>
                    <th class="t">Tên Sản Phẩm</th>
                    <th class="t">Mã thể loại</th>
                    <th class="t">Mã thương hiệu</th>
                    <th class="t">Giá</th>
                    <th class="t">Mô Tả</th>
                    <th class="t">Số Lượng</th>
                    <th class="t">Ảnh</th>
                    <?php
                    $q = mysqli_fetch_array($result)
                    ?>
                    <tr>
                        <td class="t"><?php echo $q["maSanPham"] ?></td>
                        <td class="t"><?php echo $q["tenSanPham"] ?></td>
                        <td class="t"><?php echo $q["maTheLoai"] ?></td>
                        <td class="t"><?php echo $q["maThuongHieu"] ?></td>
                        <td class="t"><?php echo $q["giaTien"] ?></td>
                        <td class="t"><?php echo $q["moTa"] ?></td>
                        <td class="t"><?php echo $q["soLuong"] ?></td>
                        <td class="t"><img src="<?php echo $q["hinhAnh"] ?>" width="150" height="200"></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </body>

        </html>
    <?php } else {
    header("Location: trangql.php");
} ?>