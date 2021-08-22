<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
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
    include("../connect/open.php");
    $sql = "SELECT * FROM `san_pham` INNER JOIN the_loai ON san_pham.maTheLoai 
    = the_loai.maTheLoai INNER JOIN thuong_hieu ON san_pham.maThuongHieu = 
    thuong_hieu.maThuongHieu";
    $sql1 = "SELECT * FROM the_loai";
    $sql2 = "SELECT * FROM thuong_hieu";
    $result1 = mysqli_query($con, $sql1);
    $result2 = mysqli_query($con, $sql2);
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");
    ?>
    <div class="tt">
        <h1>Thêm Sản Phẩm</h1>
        <form action="themSp-process.php" method="post" class="t1" enctype="multipart/form-data">
            <table>
                Tên sản phẩm:<input type="text" name="tenSanPham" id="tensp">
                <span class="err" id="errtensp"></span><br>
            </table>
            Mã thể loại:<select name="maTheLoai" id="maTheLoai">
                <?php while ($tl = mysqli_fetch_array($result1)) {
                ?>
                    <option value="<?php echo $tl["maTheLoai"] ?>"><?php echo $tl["tenTheLoai"] ?></option>
                <?php
                }
                ?>
            </select>
            <span class="err" id="errtl"></span><br>
            Mã thương hiệu:
            <select name="maThuongHieu" id="maThuongHieu">
                <?php while ($th = mysqli_fetch_array($result2)) {
                ?>
                    <option value="<?php echo $th["maThuongHieu"] ?>"><?php echo $th["tenThuongHieu"] ?></option>
                <?php
                }
                ?>
            </select>
            <span class="err" id="errth"></span><br>
            Giá tiền:<input type="text" name="giaTien" id="giaTien">
            <span class="err" id="errgt"></span><br>
            Mô Tả:<textarea name="moTa" cols="15" rows="10" id="moTa"></textarea>
            <span class="err" id="errmoTa"></span><br>
            Số Lượng:<input type="text" name="soLuong" id="soLuong">
            <span class="err" id="errsoLuong"></span><br>
            Hình Ảnh: <input type="file" name="hinhAnh" id="hinhAnh">
            <span class="err" id="errhinhAnh"></span><br>
            <button onclick="return kiemTra()">Thêm</button>
            </table>
        </form>
    </div>
    <script>
        function kiemTra() {
            var dem = 0;
            var tensp = document.getElementById("tensp").value;
            var matl = document.getElementById("matl").value;
            var math = document.getElementById("math").value;
            var giatien = document.getElementById("giaTien").value;
            var mota = document.getElementById("moTa").value;
            var sl = document.getElementById("soLuong").value;
            var ha = Document.getElementById("hinhAnh").value;
            var errtensp = document.getElementById("errtensp");
            var errmatl = document.getElementById("errtl");
            var errmath = document.getElementById("errth");
            var errgiatien = document.getElementById("errgt");
            var errmota = document.getElementById("errmoTa");
            var errsl = document.getElementById("errsoLuong");
            var errha = Document.getElementById("errhinhAnh");
            if (tensp === "") {
                errtensp.innerHTML = "Thêm tên sản phẩm";
            } else {
                errtensp.innerHTML = "";
                dem++;
            }
            if (matl === "") {
                errmatl.innerHTML = "Nhập mã thể loại";
            } else {
                errmatl.innerHTML = "";
                dem++;
            }
            if (math === "") {
                errmath.innerHTML = "Nhập mã thương hiệu";
            } else {
                errmath.innerHTML = "";
                dem++;
            }
            if (giatien === "") {
                errgiatien.innerHTML = "Nhập giá tiền";
            } else {
                errgiatien.innerHTML = "";
                dem++
            }
            if (mota === "") {
                errmota.innerHTML = "Nhập mô tả sản phẩm";
            } else {
                errmota.innerHTML = "";
                dem++;
            }
            if (sl === "") {
                errsl.innerHTML = "Nhập số lượng";
            } else {
                errsl.innerHTML = "";
                dem++;
            }
            if (ha === "") {
                errha.innerHTML = "Chèn hình ảnh";
            } else {
                errha.innerHTML = "";
                dem++;
            }
            if (dem = 7) {
                return true;
            }
            return false;
        }
    </script>
</body>

</html>