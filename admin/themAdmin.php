<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .err {
            color: red;
        }

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
    </style>
</head>

<body>
    <?php
    include("side-bar.php");
    include("header.php");
    ?>
    <div class="tt">
        <form action="themAd-process.php">
            <table>

                <tr>
                    <td>Tên Admin</td>
                    <td><input type="text" name="tenAdmin" id="tenad" required></td>
                    <td><span class="err" id="err-tenad"></span></td>
                </tr>
                <tr>
                    <td>UserName</td>
                    <td><input type="text" name="username" id="tkad"></td>
                    <td><span class="err" id="err-tkad"></span></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" id="mkad"></td>
                    <td><span class="err" id="err-mkad"></span></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="ngaySinh" id="ngaySinh"></td>
                    <td><span class="err" id="err-nsad"></span></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="Email" id="emailad"></td>
                    <td><span class="err" id="err-emailad"></span></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" name="sdt" id="sdtad"></td>
                    <td><span class="err" id="err-sdtad"></span></td>
                </tr>
                <tr>
                    <td>Quyền:</td>
                    <td><select name="quyen" id="quyen">
                            <option disabled selected>Chọn quyền</option>
                            <option value="0">
                                Admin
                            </option>
                            <option value="1">SuperAdmin</option>
                        </select></td>
                    <td><span class="err" id="errquyenad"></span></td>
                </tr>
            </table>
            <button onclick="return kiemTra()">Thêm</button>
        </form>
    </div>
    <script>
        function kiemTra() {
            var dem = 0;
            var tenad = document.getElementById("tenad").value;
            var tkad = document.getElementById("tkad").value;
            var mkad = document.getElementById("mkad").value;
            var nsad = document.getElementById("ngaySinh").value;
            var emailad = document.getElementById("emailad").value;
            var sdtad = document.getElementById("sdtad").value;

            var quyen = document.getElementById("quyenad").value;
            var errtenad = document.getElementById("err-tenad");
            var errtkad = document.getElementById("err-tkad");
            var errmkad = document.getElementById("err-mkad");
            var errns = document.getElementById("err-nsad");
            var erremailad = document.getElementById("err-emailad");
            var errsdtad = document.getElementById("err-sdtad");

            var errquyenad = document.getElementById("errquyenad");
            if (tenad === "") {
                errtenad.innerHTML = "Nhập tên admin";
            } else {
                errtenad.innerHTML = "";
                dem++; //1
            }
            if (tkad === "") {
                errtkad.innerHTML = "Nhập username";
            } else {
                errtkad.innerHTML = "";
                dem++; //2
            }
            if (mkad === "") {
                errmkad.innerHTML = "Nhập password";
            } else {
                errmkad.innerHTML = "";
                dem++ //3
            }
            if (nsad === "") {
                errns.innerHTML = "Nhập ngày sinh admin";
            } else {
                errns.innerHTML = "";
                dem++; //4
            }
            if (emailad === "") {
                erremailad.innerHTML = "Nhập email admin";
            } else {
                erremailad.innerHTML = "";
                dem++; //5
            }
            if (sdtad === "") {
                errsdtad.innerHTML = "Nhập số điện thoại admin";
            } else {
                errsdtad.innerHTML = "";
                dem++; //6
            }
            if (quyen === "") {
                errquyenad.innerHTML = "Nhập quyền ad";
            } else {
                errquyenad.innerHTML = "";
                dem++; //8
            }
            if (dem == 7) {
                return true;
            }
            return false;
        }
    </script>
</body>

</html>