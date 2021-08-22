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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .login {
            height: 447px;
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
            width: 275px;
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
            margin-right: 81px;
        }

        button:hover {
            font-size: 15px;
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
    $sql = "SELECT * FROM `khach_hang` where email='$email'";
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");
    ?>
    <?php
    while ($khach_hang = mysqli_fetch_array($result)) {
    ?>
        <h2 aligh="center"> Thông tin email,mật khẩu</h2>
        <form action="sua-tai-khoan.php">
            <div class="login">

                email:
                <input type="text" name="email" class="nentext" disabled value="<?php echo $khach_hang["email"] ?>" readonly><br>
                Mật khẩu:
                <input type="text" name="pass" class="nentex" value="<?php echo $khach_hang["password"] ?>" readonly><br>

            <?php
        }
            ?><br>
            <a href="sua-tai-khoan.php"><button>Sửa tài khoản</button></a><br>
            <a href="javascript:history.back()"><u>Quay lại</u></a>
            </div>
        </form>
        <?php
        include("footer.php");
        ?>

</body>

</html>