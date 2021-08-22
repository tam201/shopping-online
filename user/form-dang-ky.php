<?php
session_start();
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
        body {
            background-image: url(img/anh3.jpg);
            background-size: 100%;

        }

        h2 {
            font-family: sans-serif;
            color: black;
            margin-top: 2px;
        }

        table tbody {
            margin-left: 11px;
            margin-top: -95px;
        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>


    <div id="main">

        <div id="right">
            <form action="dang-ky-process.php" method="GET">

                <div class="dangky">

                    <table align="center">

                        <center>
                            <h2>Thông tin cá nhân</h2>

                            <tr>
                                <td>Họ tên</td>
                                <td><input type="text" id="ho-ten" placeholder="Nhập họ tên" name="ten" /></td>

                                <td><span class="error" id="err-ten"></span></td>
                            </tr>
                            <tr>
                                <td> Ngày sinh</td>
                                <td>
                                    <input type="date" name="ntn" id="ntn">
                                </td>
                                <td><span id="err-ntn" class="error"></span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="text" id="email" placeholder="Nhập email" name="email">
                                </td>
                                <td><span id="err-email" class="error"></span></td>
                            </tr>
                            <tr>
                                <td> Số điện thoại</td>
                                <td>
                                    <input type="text" id="sdt" placeholder="Nhập số điện thoại" name="sdt">
                                </td> <br>
                                <td><span class="error" id="err-sdt"></span></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu:</td>
                                <td>
                                    <input type="password" id="password" placeholder="Nhập mật khẩu" name="password">
                                </td>
                                <td><span class="error" id="err-password"></span></td>
                            </tr>
                            <tr>
                                <td>Nhập lại mật khẩu:</td>
                                <td>
                                    <input type="password" id="re-password" placeholder="nhập lại mật khẩu" name="re-password">
                                </td>
                                <td> <span class="error" id="err-re-password"></span></td>
                            </tr>
                            <tr>
                                <td>Giới tính:</td>
                                <td>
                                    <div class="gioitinh">
                                        <input type="radio" name="gioi-tinh" value="1">Nam
                                        <input type="radio" name="gioi-tinh" value="0">Nữ
                                    </div>
                                </td>
                                <td> <span class="error" id="err-gioi-tinh"></span></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ: </td>
                                <td><input type="text" id="dia-chi" placeholder="Nhập địa chỉ" name="dia-chi" /></td>
                                <td><span class="error"></span></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <button onclick="return kiemTra()">Đăng ký</button>
                                </td>
                            </tr>
                        </center>

                    </table>
                    <a href="javascript:history.back()"><u>Quay lại</u></a>
                </div>
            </form>

            <script>
                function kiemTra() {

                    var dem = 0;
                    var demGioiTinh = 0;


                    var ngaySinh = document.getElementById("ntn").value;
                    var hoTen = document.getElementById("ho-ten").value;
                    var password = document.getElementById("password").value;
                    var rePassword = document.getElementById("re-password").value;
                    var email = document.getElementById("email").value;
                    var sdt = document.getElementById("sdt").value;
                    var gioiTinh = document.getElementsByName('gioi-tinh');
                    for (var i = 0; i < gioiTinh.length; i++) {
                        if (gioiTinh[i].checked) {
                            demGioiTinh++;
                        }
                    }


                    var errTen = document.getElementById("err-ten");
                    var errNTN = document.getElementById("err-ntn");
                    var errGioiTinh = document.getElementById("err-gioi-tinh");
                    var errPassword = document.getElementById("err-password");
                    var errRePassword = document.getElementById("err-re-password");
                    var erremail = document.getElementById("err-email");
                    var errSdt = document.getElementById("err-sdt");

                    var regexSdt = /^(\+84|0)[0-9]{9}$/;
                    var check = regexSdt.test(sdt);
                    if (check) {
                        errSdt.innerHTML = "";

                    } else {
                        errSdt.innerHTML = "Nhập lại số điện thoại";
                    }

                    var regexEmail = /^[A-Za-z0-9\.\_]+@[A-Za-z0-9\.]+$/
                    var check = regexEmail.test(email);

                    if (check) {
                        erremail.innerHTML = "";
                        dem++;
                    } else {
                        erremail.innerHTML = "phai nhap email";
                    }



                    if (demGioiTinh === 0) {
                        errGioiTinh.innerHTML = "Phải chọn giới tính";
                    } else {
                        errGioiTinh.innerHTML = "";
                        dem++;
                    }

                    if (password === "") {
                        errPassword.innerHTML = "Phai nhap pass";
                    } else {
                        errPassword.innerHTML = "";
                        dem++;
                    }


                    if (hoTen === "") {
                        errTen.innerHTML = "Phai nhap họ tên";
                    } else {
                        errTen.innerHTML = "";
                        dem++;
                    }

                    if (rePassword === "") {
                        errRePassword.innerHTML = "Phai nhap lai pass";
                    } else if (password !== rePassword) {
                        errRePassword.innerHTML = "Khong khop";
                    } else {
                        errRePassword.innerHTML = "";
                        dem++;
                    }
                    if (ngaySinh === "") {
                        errNTN.innerHTML = "Phai nhap ngày sinh";
                    } else {
                        errNTN.innerHTML = "";
                        dem++;
                    }
                    if (dem === 6) {
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