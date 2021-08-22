<?php
session_start();
if (isset($_SESSION["email"])) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <style>
        #sua1 {
            height: 550px;
            border: 1px solid grey;
            border-radius: 10px;
            text-align: end;
            /* float: right; */
            margin-left: 480px;
            margin-top: 50px;
            /* background-image: url(../user/img/4.jpg); */
            color: black;
            width: 398px;
        }


        input {
            width: 200px;
            height: 40px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid grey;
            padding-left: 20px;
            font-size: 15px;
            margin-top: 34px;
            margin-right: 10px;
        }

        button {
            width: 220px;
            height: 40px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: #45a049;
            color: white;
            margin-top: 17px;
        }

        button:hover {
            font-size: 15px;
        }

        ul {
            list-style: none;
            float: initial;
        }

        ul li {
            display: inline-block;
        }


        ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 15px;
            padding: 5px 0px;

        }

        body {
            background-image: url(img/anh4.jpg);
            background-size: 100%;
        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>


    <?php

    include("../connect/open.php");
    $email = $_SESSION["email"];
    $sql = "SELECT * FROM `khach_hang` WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");

    ?>
    <h2 align="center">Thông tin cá nhân</h2>
    <form action="sua-tt.php" method="post">
        <?php
        while ($khach_hang = mysqli_fetch_array($result)) {
        ?>

            <div id="sua1">
                <input type="hidden" name="maKhachHang" id="maKhachHang" value="<?php echo $khach_hang["maKhachhang"]; ?>" readonly>
                Tên của bạn:
                <input type="text" name="tenKhachHang" class="sua" value="<?php echo $khach_hang["tenKhachHang"] ?>" readonly><br>
                Địa chỉ:
                <input type="text" name="diaChi" class="sua" value="<?php echo $khach_hang["diaChi"] ?>" readonly><br>
                Ngày sinh:
                <input type="date" name="ntn" id="ntn" value="<?php echo $khach_hang["ngaySinh"] ?>" readonly><br>
                Giới tính:
                <input name="gioiTinh" value="<?php if ($khach_hang["gioiTinh"] == 1) {
                                                    echo "Nam";
                                                } else {
                                                    echo "Nữ";
                                                } ?>" readonly><br>
                Số điện thoại:
                <input type="text" id="sdt" name="sdt" readonly value="<?php echo $khach_hang["dienThoai"] ?>">
            <?php
        }
            ?>
            <a href="sua-tt.php"><button>Sửa thông tin cá nhân</button></a><br>
            <a href="thong-tin-tai-khoan.php" style="float: left;margin-top:25px" class=""><u>Đổi mật khẩu</u></a><br>

            <a href="javascript:history.back()"><u>Quay lại</u></a>
            <a href="dang-xuat.php">Đăng xuất</a>


            </div>


    </form>
    <?php
    include("footer.php");
    ?>
    </div>



</body>

</html>