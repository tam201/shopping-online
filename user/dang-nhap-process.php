<?php
session_start();
//Khởi tạo tại dòng 2
if (isset($_POST["email"]) && isset($_POST["pass"])) {
    //Mở kết nối
    include("../connect/open.php");
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $pass = mysqli_real_escape_string($con, $_POST["pass"]);

    $hashPass = md5($pass);
    //Câu query kiểm tra
    $sql = "SELECT * FROM `khach_hang` WHERE email='$email' AND password='$hashPass'";
    $result = mysqli_query($con, $sql);
    $check = mysqli_fetch_array($result);
    $demBanGhi = mysqli_num_rows($result);
    //Đếm số bản ghi
    if ($demBanGhi == 0) {
        header("Location: form-dang-nhap.php?error=1");
    } else {
        $_SESSION["email"] = $email;
        if (isset($_POST["check"])) {
            setcookie("email", $email, time() + 84600);
            setcookie("pass", $pass, time() + 84600);
        } else {
            setcookie("email", $email, time() - 1);
            setcookie("pass", $pass, time() - 1);
        }
    }
    if ($check["trangThai"] == 0) {
        setcookie("email", $email, time() - 1);
        setcookie("pass", $pass, time() - 1);
        unset($_SESSION["email"]);
        header("Location: form-dang-nhap.php?err=1");
    } else {
        header("Location: index.php");
    }
    include("../connect/close.php");
} else {
    header("Location: form-dang-nhap.php");
}
