<?php
session_start();
if ($_SESSION["user"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        </link>
    </head>

    <body>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                .ql {
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
                    text-decoration: none;
                    font-size: 25px;
                    color: blue;
                    display: block;
                    z-index: 1;
                }

                .a:hover {
                    color: black;
                }
            </style>
        </head>

        <body>

            <?php
            include("header.php");
            include("side-bar.php");
            $a = 1;
            include("../connect/open.php");
            $limit = 10;
            $start = 0;
            // - Tìm tổng số sản phẩm 
            $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM `san_pham`";
            $resultDemBaiViet = mysqli_query($con, $sqlDemBaiViet);
            $demBaiViet = mysqli_fetch_array($resultDemBaiViet);
            $tongSoBaiViet = $demBaiViet["tongBaiViet"];
            // - Tính số trang
            $soTrang = ceil($tongSoBaiViet / $limit);
            // B2: Hiển thị danh sách trang
            // B3: Lấy số trang hiện tại
            if (isset($_GET["trang"])) {
                $trang = $_GET["trang"];
                // B4: Tìm start
                $start = ($trang - 1) * $limit;
            }
            if (isset($_GET["search"])) {
                $search = $_GET["search"];
                $sql = "SELECT * FROM san_pham WHERE tenSanPham LIKE '%$search%' LIMIT $start,$limit";
            } else {
                $sql = "SELECT * FROM `san_pham` INNER JOIN the_loai ON san_pham.maTheLoai = the_loai.maTheLoai 
                INNER JOIN thuong_hieu ON san_pham.maThuongHieu = thuong_hieu.maThuongHieu 
                ORDER BY `san_pham`.`maSanPham` DESC LIMIT $start,$limit";
            }
            $sql1 =  $sql1 = "SELECT * FROM the_loai";
            $sql2 = "SELECT * FROM thuong_hieu";
            $result = mysqli_query($con, $sql);
            $result1 = mysqli_query($con, $sql1);
            $result2 = mysqli_query($con, $sql2);
            include("../connect/close.php");
            $i = 0;
            ?>
            <div class="ql">

                <a href="themSp.php" class="a">Thêm Sản Phẩm</a>
                <form align="center">
                    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                                                echo $_GET["search"];
                                                            } ?>">
                    <button>Tìm kiếm</button><br>
                </form>
                <table border="1" align="center">
                    <tr>
                        <td align="center" colspan="9">Danh Sách Sản Phẩm</td>
                    </tr>
                    <tr>
                        <td class="text">Mã Sản Phẩm</td>
                        <td class="text">Tên Sản Phẩm</td>
                        <td class="text">Mã Thể Loại</td>
                        <td class="text">Mã Thương Hiệu</td>
                        <td class="text">Giá Tiền</td>
                        <td class="text">Số lượng</td>

                    </tr>
                    <?php

                    while ($sp = mysqli_fetch_array($result)) {
                        $i++;
                    ?>
                        <tr>
                            <td class="text"><?php echo $sp["maSanPham"] ?></td>
                            <td class="text"><?php echo $sp["tenSanPham"] ?></td>
                            <td class="text"><?php echo $sp["maTheLoai"] ?></td>
                            <td class="text"><?php echo $sp["maThuongHieu"] ?></td>
                            <td class="text"><?php echo $sp["giaTien"] ?></td>
                            <td class="text"><?php echo $sp["soLuong"] ?></td>
                            <td class="text"><a href="suaSp.php?maSanPham=<?php echo $sp["maSanPham"] ?>" class="a"><i class="fas fa-edit"></i> Sửa</a></td>
                            <td class="text"><a href="xoaSp.php?maSanPham=<?php echo $sp["maSanPham"] ?>" 
                                class="a" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fas fa-trash-alt"> Xóa</a></td>
                            <td class="text"><a href="sanPhamChiTiet.php?maSanPham=<?php echo $sp["maSanPham"] ?>" class="a"><i class="fas fa-info"></i> Chi tiết</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <?php
                for ($j = 1; $j <= $soTrang; $j++) {
                ?>
                    <a href="?trang=<?php echo $j; ?>"><?php echo $j; ?></a>
                <?php
                }
                ?>
            </div>
        </body>

        </html>
    </body>

    </html>
<?php
} else {
    header("Location: dang-nhap.php");
}
?>