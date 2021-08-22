<?php
if (isset($_GET["maSanPham"])) {
    $maSp = $_GET["maSanPham"];
    include("../connect/open.php");
    $sqlSp = "SELECT * FROM san_pham WHERE maSanPham=$maSp";
    echo $sqlSp;
    $resultSp = mysqli_query($con, $sqlSp);
    $sp = mysqli_fetch_array($resultSp);
    include("../connect/close.php");
?>
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
            <form action="suaSp-process.php">
                <table>
                    <tr>
                        <input type="hidden" name="maSanPham" value="<?php echo $maSp ?>">
                        <td> Tên sản phẩm : <input type="text" name="tenSanPham" id="suaTensp" value="<?php echo $sp["tenSanPham"] ?>"></td>
                        <span class="err" id="errsuaTensp"></span>
                        <td> Mã thể loại : <select name="maTheLoai" id="matl">
                                <?php while ($tl = mysqli_fetch_array($result1)) {
                                ?>
                                    <option value="<?php echo $tl["maTheLoai"] ?>"><?php echo $tl["tenTheLoai"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <span class="err" id="errsuaMatl"></span>
                        <td>Mã thương hiệu : <select name="maThuongHieu" id="math">
                                <?php while ($th = mysqli_fetch_array($result2)) {
                                ?>
                                    <option value="<?php echo $th["maThuongHieu"] ?>"><?php echo $th["tenThuongHieu"] ?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                        <span class="err" id="errsuaMath"></span>
                        <td>Giá Tiền : <input type="text" name="giaTien" id="suaGiaTien" value="<?php echo $sp["giaTien"] ?>"></td>
                        <span class="err" id="errsuaGiaTien"></span>
                        <td>Mô tả : <input type="text" name="moTa" id="suaMoTa" value="<?php echo $sp["moTa"] ?>"></td>
                        <span class="err" id="errsuaMoTa"></span>
                        <td>Số lượng : <input type="text" name="soLuong" id="suaSoLuong" value="<?php echo $sp["soLuong"] ?>"></td>
                        <span class="err" id="errsuaSoLuong"></span>
                        <br>
                    </tr>
                </table>
                <button onclick="return kiemTra()">Cập nhật</button>
            </form>
        </div>
        <script>
            function kiemTra() {
                var suaTensp = document.getElementById("suaTensp").value;
                var suamaTheLoai = document.getElementById("suamaTheLoai").value;
                var suamaThuongHieu = document.getElementById("suamaThuongHieu").value;
                var suaGiaTien = document.getElementById("suaGiaTien").value;
                var suaMoTa = document.getElementById("suaMoTa").value;
                var suaSoLuong = document.getElementById("suaSoLuong").value;
                var errsuaTenSp = document.getElementById("errsuaTensp");
                var errsuaMatl = document.getElementById("errsuaMatl");
                var errsuaMath = document.getElementById("errsuaMath");
                var errsuaGiaTien = document.getElementById("errsuaGiaTien");
                var errsuaMoTa = document.getElementById("errsuaMoTa");
                var errsuaSoLuong = document.getElementById("errsuaSoLuong");
                var dem = 0;
                if (suaTensp === "") {
                    errsuaTenSp.innerHTML = "Nhập tên sản phẩm";

                } else {
                    errsuaTenSp.innerHTML = "";
                    dem++; //1
                }
                if (suamaTheLoai === "") {
                    errsuaMatl.innerHTML = "Nhập Mã thể loại";

                } else {
                    errsuaMatl.innerHTML = "";
                    dem++; //2
                }
                if (suamaThuongHieu === "") {
                    errsuaMath = "Nhập mã thương hiệu";

                } else {
                    errsuaMath = "";
                    dem++; //3
                }
                if (suaGiaTien === "") {
                    errsuaGiaTien.innerHTML = "Nhập giá tiền";

                } else {
                    errsuaGiaTien.innerHTML = "";
                    dem++; //3
                }
                if (suaMoTa === "") {
                    errsuaMoTa.innerHTML = "Nhập giá tiền";

                } else {
                    errsuaMoTa.innerHTML = "";
                    dem++; //4
                }
                if (suaSoLuong === "") {
                    errsuaSoLuong.innerHTML = "Nhập vào số lượng";

                } else {
                    errsuaSoLuong.innerHTML = "";
                    dem++; ///6
                }
                if (dem == 6) {
                    return true;
                }
                return false;
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: trangql.php");
}
?>