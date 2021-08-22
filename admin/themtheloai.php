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
        <form action="themTheLoai-process.php">
            <table>
                <tr>
                    <td>
                        Tên thể loại:
                    </td>
                    <td><input type="text" name="tenTheLoai" id="themtl"></td>
                    <td><span class="err" id="errthemtl"></span></td>
                </tr>
            </table>
            <button onclick="return kiemTra()">Thêm</button>
        </form>
    </div>
    <script>
        function kiemTra() {
            var themtl = document.getElementById("themtl").value;
            var errthemtl = document.getElementById("errthemtl");
            if (themtl === "") {
                errthemtl.innerHTML = "Nhập tên thể loại";
                return false
            } else {
                errthemtl.innerHTML = "";
                return true;
            }
            return false;
        }
    </script>
</body>

</html>