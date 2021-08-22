<?php
session_start();
if (isset($_SESSION["email"])) {

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
                margin-right: 60px;
                margin-top: 13px;
            }

            button:hover {
                font-size: 15px;
            }

            #sua1 {
                height: 528px;
                border: 1px solid grey;
                border-radius: 10px;
                text-align: end;
                /* float: right; */
                margin-left: 480px;
                margin-top: 50px;
                /* background-image: url(../user/img/4.jpg); */
                color: black;
                width: 425px;
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
        $email = $_SESSION["email"];
        include("../connect/open.php");

        $sql = "SELECT * FROM `khach_hang` WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        $khach_hang = mysqli_fetch_array($result);
        include("../connect/close.php");

        ?>
        <form action="sua-info-pro.php" method="get">
            <div id="sua1">
                <input type="hidden" name="maKhachHang" id="maKhachHang" value="<?php echo $khach_hang["maKhachHang"]; ?>">
                Tên của bạn:
                <input type="text" name="tenKhachHang" class="sua" value="<?php echo $khach_hang["tenKhachHang"] ?>"><br>
                Địa chỉ:
                <input type="text" name="diaChi" class="sua" value="<?php echo $khach_hang["diaChi"] ?>"><br>
                Ngày sinh:
                <input type="date" name="ntn" id="ntn" value="<?php echo $khach_hang["ngaySinh"] ?>"><br>
                Giới tính:
                <input name="gioiTinh" value="<?php echo $khach_hang["gioiTinh"] ?>"><br>
                Số điện thoại:
                <input type="text" id="sdt" name="sdt" value="<?php echo $khach_hang["dienThoai"] ?>"><br>
                <button>Cập nhập</button><br>
                <a href="javascript:history.back()"><u>Quay lại</u></a>
            </div>

        </form>


        <?php
        include("footer.php");
        ?>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>