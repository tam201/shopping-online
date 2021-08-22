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
    include("header.php");
    include("side-bar.php");
    ?>
    <div class="tt">
        <form action="themThuongHieu-process.php">
            <table>
                <tr>
                    <td>Tên Thương Hiệu:</td>
                    <td><input type="text" name="tenThuongHieu" id="themThuongHieu"></td>
                    <td><span class="err" id="errthemThuongHieu"></span></td>
                </tr>
            </table>
            <button onclick="return kiemTra()">Thêm</button>
        </form>
    </div>
    <script>
        function kiemTra() {
            var tenth = document.getElementById("themThuongHieu").value;
            var errtenth = document.getElementById("errthemThuongHieu");
            if (tenth === "") {
                errtenth.innerHTML = "Nhập tên Thương Hiệu";
                return false;
            } else {
                errtenth.innerHTML = "";
            }
            return true;
        }
    </script>
</body>

</html>