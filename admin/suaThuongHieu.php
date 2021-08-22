<?php
if (isset($_GET["maThuongHieu"])) {
    $math = $_GET["maThuongHieu"];
    include("../connect/open.php");
    $sqlth = "SELECT * FROM thuong_hieu WHERE maThuongHieu=$math";
    $resultth = mysqli_query($con, $sqlth);
    $th = mysqli_fetch_array($resultth);
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
        include("side-bar.php");
        include("header.php");
        ?>
        <div class="tt">
            <form action="suaThuongHieu-process.php">
                <input type="hidden" name="maThuongHieu" value="<?php echo $th["maThuongHieu"] ?>">
                Tên thể loại: <input type="text" name="tenThuongHieu" id="suaThuongHieu" value="<?php echo $th["tenThuongHieu"] ?>"><br>
                <span id="errsuaThuongHieu" class="err"></span>
                <button onclick="return kiemTra()">Cập nhật</button>
            </form>
        </div>
    <?php
}
    ?>
    <script>
        function kiemTra() {
            var suath = document.getElementById("suaThuongHieu").value;
            var errsuath = document.getElementById("errsuaThuongHieu");
            if (suath === "") {
                errsuath.innerHTML = "Nhập tên thương hiệu";
            } else {
                errsuath.innerHTML = "";
            }
        }
    </script>
    </body>

    </html>