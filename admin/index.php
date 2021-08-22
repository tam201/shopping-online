<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: trangql.php");
} else {
    $check = false;
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
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
    <style>
        .login {
            padding-top: 40px;
            width: 400px;
            height: 400px;
            border: 5px solid white;
            border-radius: 5px;
            text-align: center;
            margin-top: 200px;
            margin-left: 600px;
        }

        .login h2 {
            color: #ff0000;
            display: inline-block;
        }

        .login input {
            width: 300px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid white;
            margin-bottom: 20px;
            margin-top: 5px;
            padding-left: 10px;
        }

        .nentext:hover {
            background-color: #eee6ff;
        }

        .login button {
            width: 200px;
            height: 30px;
            border-radius: 5px;
            border: none;
            background-color: #4d94ff;
            color: white;
            font-weight: bold;
            margin-top: 30px;
        }

        .nentext {
            background-color: #ffe6f7;
        }

        .quenmk {
            float: right;
            padding-right: 50px;
            text-decoration: none;
            margin-top: 10px;
            color: #0099ff;
        }

        .quenmk:hover {
            color: red;
        }

        #checkbox {
            float: left;
        }

        p {
            color: red;
            float: left;
        }
    </style>
</head>

<body>
    <div class="login">
        <h2>Đăng Nhập Tài Khoản</h2>

        <form action="dang-nhap-process.php" method="post">
            Username: <input type="text" class="nentext" placeholder="Nhập tên đăng nhập" id="user" name="user" value="<?php if ($check) {
                                                                                                                            echo $user;
                                                                                                                        } ?>">

            <br>
            Password: <input type="password" class="nentext" placeholder="Nhập mật khẩu" id="pass" name="pass" value="<?php if ($check) {
                                                                                                                            echo $pass;
                                                                                                                        } ?>"> <br>
            <span id="err-pass"></span>
            <p> <input type="checkbox" name="check" id="checkbox" <?php if ($check) {
                                                                        echo "checked";
                                                                    } ?>></p>
            Ghi nhớ
            <br>

            <?php
            if (isset($_GET["error"])) {
            ?>
                <p>Sai tên đăng nhập hoặc mật khẩu</p>
            <?php

            }
            ?>
            <br><button class="dn" onclick="return kiemTra()">Đăng nhập</button>
    </div>
    </form>

</body>

</html>