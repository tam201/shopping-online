<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="icon/font-awesome/css/font-awesome.min.css">
        <style>
            * {

                box-sizing: border-box;
            }

            body {
                font-family: Times New Roman;
                line-height: 25px;
                margin: 0px;
                padding: 100px;
                color: blueviolet;
                position: relative;
                /* background-image: linear-gradient(rgba(247, 243, 243, 0.7),rgba(255, 255, 255, 0.7)), url(../img/anhDong.gif);
    background-size: 150px; 
	background-position: center; */
            }

            a {
                text-decoration: none;
                transition: all 1.5s;
            }

            a:hover {
                color: red;
            }

            .div {
                /* padding-left: 100px; */
                position: relative;
                left: 0px;
                width: 100%;
                font-size: 14px;

            }

            /* sizebar */



            /* header */

            .div1 {
                background-image: linear-gradient(rgba(247, 243, 243, 0.7), rgba(255, 255, 255, 0.7)), url(../img/anh.jpg);
                position: fixed;
                height: 100px;
                top: 0px;
                position: absolute;
                top: 0px;
                left: 0px;
                display: inline-flex;
                width: 100%;
                border-bottom: 1px solid white;
            }

            .div1 {
                position: fixed;
                height: 100px;
                top: 0px;
                z-index: 2;
            }
        </style>
    </head>

    <body>
        <div class="div">
            <div class="div1" style="margin-top: 20px; width:100px;height:30px">
                <?php
                include("menu.php");
                ?>
            </div>


            <h1>Lịch SỬ Mua Hàng</h1>
            <table>
                <table border="1">
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>

                        <th>Ảnh</th>
                        <th>Địa chỉ</th>
                        <th>Ngày mua</th>
                        <th>Ghi chú</th>
                        <th>Trạng Thái</th>

                    </tr>
                    <?php
                    include("../connect/open.php");
                    $limit = 15;
                    $start = 0;
                    $sqlDem = "SELECT COUNT(*) as tong FROM `hoa_don`";
                    $resultDem = mysqli_query($con, $sqlDem);
                    $dem = mysqli_fetch_array($resultDem);
                    $tong = $dem["tong"];
                    $soTrang = ceil($tong / $limit);
                    if (isset($_GET["trang"])) {
                        $trang = $_GET["trang"];
                        $start = ($trang - 1) * $limit;
                    }
                    $sqlHd = "SELECT * FROM `hoa_don_chi_tiet` 
                                    INNER JOIN hoa_don ON hoa_don.maHoaDon = hoa_don_chi_tiet.maHoaDon
                                    INNER JOIN khach_hang ON khach_hang.maKhachHang = hoa_don.maKhachHang
                                    INNER JOIN san_pham ON san_pham.maSanPham = hoa_don_chi_tiet.maSanPham
                                    INNER JOIN thuong_hieu ON thuong_hieu.maThuongHieu = san_pham.maThuongHieu
                                    INNER JOIN the_loai ON the_loai.maTheLoai = san_pham.maTheLoai
                                    WHERE khach_hang.email = '$email'";
                    $resultHd = mysqli_query($con, $sqlHd);

                    $result = mysqli_query($con, $sqlHd);
                    include("../connect/close.php");
                    $dem = 0;
                    while ($ad = mysqli_fetch_array($result)) {
                        $dem++;
                        $maHoaDon = $ad["maHoaDon"];
                    ?>
                        <tr>
                            <th><?php echo $dem; ?></th>
                            <th><?php echo $ad["hoTen"] ?></th>
                            <th><?php echo $ad["dienThoai"] ?></th>
                            <th><img src="<?php echo $ad["hinhAnh"] ?>" width="100px" height="100px"></th>
                            <th><?php echo $ad["diaChi"] ?></th>
                            <th><?php echo $ad["ngayXuatHoaDon"] ?></th>
                            <th><?php echo $ad["ghiChu"] ?></th>
                            <?php
                            include("../connect/open.php");
                            $sqlHoaDon = "SELECT hoa_don.trangThai AS trangthaidonhang FROM `hoa_don`INNER JOIN khach_hang 
                            ON khach_hang.maKhachHang=hoa_don.maKhachHang 
                            WHERE khach_hang.email='$email' AND hoa_don.maHoaDon=$maHoaDon";
                            $result1 = mysqli_query($con, $sqlHoaDon);
                            include("../connect/close.php");
                            while ($hoaDon = mysqli_fetch_array($result1)) {
                                if ($hoaDon["trangthaidonhang"] == "") { ?>
                                    <th><?php echo "dang cho duyet"; ?></th>
                                <?php
                                } else if ($hoaDon["trangthaidonhang"] == 1) { ?>
                                    <th><?php echo "Đang vận chuyển"; ?></th>
                                <?php
                                } else { ?>
                                    <th><?php echo "Đã hủy"; ?></th>
                            <?php
                                }
                            }
                            ?>

                        </tr>
                    <?php
                    }
                    // echo $sqlHoaDon;
                    ?>
                </table>
                <ul>
                    <?php
                    for ($j = 1; $j <= $soTrang; $j++) {
                    ?>
                        <li><a href="?trang=<?php echo $j; ?>" class="trang<?php if ($trang == $j) {
                                                                                echo " a";
                                                                            } ?>"><?php echo $j; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
        </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("location: form-dang-nhap.php");
}
?>