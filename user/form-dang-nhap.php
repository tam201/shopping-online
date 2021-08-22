<?php
session_start();
if (isset($_SESSION["email"])) {
    header("Location: thong-tin-ca-nhan.php");
} else {
    $check = false;
    if (isset($_COOKIE["email"])) {
        $email = $_COOKIE["email"];
        $pass = $_COOKIE["pass"];
        $check = true;
    }
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
        .header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0px;
            background: #e5e6e6;
            height: 130px;
            top: 0px;
        }

        body {
            background-image: url(img/anh4.jpg);
            background-size: 100%;
        }

        #main {
            width: 100%;
            /* height: 100%; */
        }

        .tt {
            width: 100%;
            height: 80px;
            background-color: silver;
            position: relative;
            margin-top: -153px;
        }

        .login h2 {
            font-family: sans-serif;
            color: black;
            margin-top: -6px;
        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>
    <div id="main">
        <!-- <div id="left">
            <ul>
                <li><a href="#">Đăng nhập</a></li>
            </ul>
        </div> -->
        <div id="right">
            <form action="dang-nhap-process.php" method="post">
                <div class="login">
                    <h2>Member login</h2>
                    <input type="text" placeholder="email" id="email" name="email" value="<?php if ($check) {
                                                                                                echo $email;
                                                                                            } ?>">



                    <span class="error" id="err-email"></span>
                    <input type="password" placeholder="password" id="pass" name="pass" value="<?php if ($check) {
                                                                                                    echo $pass;
                                                                                                } ?>">


                    <span class="error" id="err-pass"></span>
                    <br>
                    <span class="error" id="err-pass"><?php if (isset($_GET["err"])) {
                                                            echo "tai khoan ban da bi khoa";
                                                        } ?></span>
                    <br>


                    <div class="check">
                        <input type="checkbox" name="check" <?php if ($check) {
                                                                echo "checked";
                                                            } ?>>Ghi nhớ đăng nhập


                        <?php
                        if (isset($_GET["error"])) {
                            echo "sai tên đang nhập hoạc mật khẩu";
                        }
                        ?>
                    </div>
                    <button onClick="return kiemTra()">Login</button><br>
                    <!-- <a href="#">
                        forgot pasword
                    </a> -->
                    <a href="form-dang-ky.php">
                        Bạn chưa có tài khoản
                    </a>
                    <a href="javascript:history.back()"><u>Quay lại</u></a>

                </div>
            </form>
            <script>
                function kiemTra() {
                    var dem = 0;
                    var email = document.getElementById("email").value;
                    var password = document.getElementById("pass").value;

                    var emailErr = document.getElementById("err-email");
                    var passErr = document.getElementById("err-pass");

                    if (password === "") {
                        passErr.innerHTML = "Phai nhap pass";
                    } else {
                        passErr.innerHTML = "";
                        dem++;
                    }


                    if (email === "") {
                        emailErr.innerHTML = "Phai nhap email";
                    } else {
                        emailErr.innerHTML = "";
                        dem++;
                    }
                    if (dem === 2) {
                        return true;
                    }

                    return false;
                }
            </script>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>