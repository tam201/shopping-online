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
            font-family: Tahoma;
            font-size: 15px;
            width: 1250px;
            height: 1200px;
            margin: 0px auto;
            text-align: center;
            /* background-image: url(../user/img/222.jpg); */

        }

        #main {
            width: 1200px;
            height: 700px;
            /* background-color: #939; */

        }



        input {
            width: 200px;
            height: 40px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid grey;
            padding-left: 20px;
        }

        button {
            width: 220px;
            height: 40px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: #45a049;
            color: white;
        }

        button:hover {
            font-size: 15px;
        }



        .dangky {
            width: 470px;
            height: 580px;
            border: 1px solid grey;
            border-radius: 10px;
            text-align: right;
            float: left;

        }

        .error {
            color: red;
        }

        h2 {
            color: id="868787";
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>
    <form action="#" method="get">
        <div id="tong">
            <div class="dangky">

                <table align="center">

                    <center>
                        <h2>Thanh toán</h2>
                    </center>

                    <tr>
                        <td>Mã hóa đơn</td>
                        <td><input type="text" id="ma" placeholder="mã hóa đơn" name="ma"></td>
                    </tr>
                    <tr>
                        <td>Họ tên</td>
                        <td><input type="text" id="ho-ten" placeholder="Nhập họ tên" name="ten" /></td>

                        <td><span class="error" id="err-ten"></span></td>
                    </tr>
                    <tr>
                        <td> Ngày xuất hóa đơn</td>
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
                        <td>Địa chỉ: </td>
                        <td><input type="text" id="dia-chi" placeholder="Nhập địa chỉ" name="dia-chi" /></td>
                        <td><span class="error"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button onclick="return kiemTra()">Thanh toán</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
    <script>
        function kiemTra() {

            var dem = 0;

            // var maHd = document.getElementById("ma").value;
            var email = document.getElementById("email").value;
            var ngayXuatHd = document.getElementById("ntn").value;
            var hoTen = document.getElementById("ho-ten").value;
            var sdt = document.getElementById("sdt").value;

            var errTen = document.getElementById("err-ten");
            var errXhd = document.getElementById("err-ntn");
            var erremail = document.getElementById("err-email");
            var errSdt = document.getElementById("err-sdt");

            var regexSdt = /^(\+84|0)[0-9]{9}$/;
            var check = regexSdt.test(sdt);
            if (check) {
                errSdt.innerHTML = "";
                dem++;
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
            if (hoTen === "") {
                errTen.innerHTML = "Phai nhap họ tên";
            } else {
                errTen.innerHTML = "";
                dem++;
            }
            if (ngaySinh === "") {
                errXhd.innerHTML = "Phai nhap ngày xuất";
            } else {
                errXhd.innerHTML = "";
                dem++;
            }
            if (dem === 4) {
                return true;
            }
        }
        return false;
    </script>

    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>