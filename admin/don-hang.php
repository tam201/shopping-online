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
        $limit = 10;
        $start = 0;
        $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM `hoa_don`";
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
        $sql = "SELECT * FROM hoa_don LIMIT $start,$limit";
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");
        ?>
        <table border="1" class="table table-striped">
            <tr class="a">
                <td colspan="7">
                    <h2>Quản lý đơn hàng</h2>
                </td>
            </tr>
            <tr class="a">
                <th>Mã đơn hàng</th>
                <th>Họ tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ nhận hàng</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
                <th></th>
            </tr>
            <?php while ($donhang = mysqli_fetch_array($result)) { ?>
                <tr class="a">
                    <td><?php echo $donhang["maHoaDon"] ?></td>
                    <td><?php echo $donhang["hoTen"] ?></td>
                    <td><?php echo $donhang["dienThoai"] ?></td>
                    <td><?php echo $donhang["diaChi"] ?></td>
                    <td><?php echo $donhang["ngayXuatHoaDon"] ?></td>
                    <td><?php
                        if ($donhang["trangThai"] == "") {
                            echo "Chưa xác nhận";
                        } else if ($donhang["trangThai"] == 1) {
                            echo "Đã xác nhận";
                        } else {
                            echo "Hủy";
                        }
                        ?></td>
                    <td>
                        <?php
                        if ($donhang["trangThai"] == "") {

                        ?>
                            <a href="xac-nhan-don.php?ma=<?php echo $donhang["maHoaDon"] ?>">Xác nhận</a>

                            <a href="huy-don.php?ma=<?php echo $donhang["maHoaDon"] ?>">Hủy</a>
                        <?php
                        } else {
                            echo "";
                        }
                        ?>
                    </td>
                    <td><a href="don-hang-chi-tiet.php?ma=<?php echo $donhang["maHoaDon"] ?>">Chi tiết</a></td>

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