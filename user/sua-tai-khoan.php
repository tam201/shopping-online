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
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            .login1 {
                width: 500px;
                height: 480px;
                border: 1px solid grey;
                border-radius: 10px;
                text-align: center;
                /* float: right; */
                padding: 20px;
                margin: 9px;
                padding-left: 34px;
                margin-left: 450px;

                margin-top: 100px;

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
            <h2 aligh="center"> Sửa thông tin email,mật khẩu</h2>
            <form action="sua-tk-process.php" method="post">
                <div class="login1">
                    <input type="hidden" name="ma-khach-hang" value="<?php echo $khach_hang["maKhachHang"] ?>">
                    email:
                    <input type="text" class="nentext" value="<?php echo $khach_hang["email"] ?>" name="email" id="email" readonly><br>

                    Mật khẩu cũ: <input type="text" class="nentext" name="pass" id="pass" value="<?php echo $khach_hang["password"] ?>"><br>

                    Nhập mật khẩu mới:
                    <input type="text" class="nentext" name="password" id="password"><br>
                    <span id="err-pass"></span>
                    Nhập lại mật khẩu mới:
                    <input type="text" name="password" class="nentex" id="repass">
                    <span id="err-repass"></span>
                    <button onclick="return kiemTra()">Cập nhập</button>

                <?php
            }
                ?><br>
                <a href="javascript:history.back()"><u>Quay lại</u></a>
                </div>
            </form>
            <script>
                function kiemTra() {
                    var dem = 0;

                    // var regexPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/gm;
                    var password = document.getElementById("password").value;
                    var errPass = document.getElementById("err-pass");
                    // var checkPass = regexPass.test(password);
                    // if (checkPass) {
                    //     errPass.innerHTML = "";
                    //     dem++;
                    // } else {
                    //     errPass.innerHTML = "Nhập password mới !";
                    // }
                    if (password === "") {
                        errPassword.innerHTML = "Phai nhap pass";
                    } else {
                        errPass.innerHTML = "";
                        dem++;
                    }

                    var rePass = document.getElementById("repass").value;
                    var errRepass = document.getElementById("err-repass");
                    if (rePass === "" | rePass !== password) {
                        errRepass.innerHTML = "Password không khớp !";
                    } else {
                        errRepass.innerHTML = "";
                        dem++;
                    }
                    if (dem == 2) {
                        return true;
                    }
                    return false;
                }
            </script>
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