<?php
if (isset($_GET["maTheLoai"])) {
    $matl = $_GET["maTheLoai"];
    include("../connect/open.php");
    $sqltl = "SELECT * FROM the_loai WHERE maTheLoai=$matl";
    $resulttl = mysqli_query($con, $sqltl);
    $tl = mysqli_fetch_array($resulttl);
    include("../connect/close.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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
        include("side-bar.php");
        include("header.php");
        ?>
        <div class="tt">
            <form action="sua-the-loai-process.php">
                <input type="hidden" name="maTheLoai" value="<?php echo $tl["maTheLoai"] ?>">
                Tên thể loại: <input type="text" name="tenTheLoai" id="suatheloai" value="<?php echo $tl["tenTheLoai"] ?>"><br>
                <span class="err" id="errsuatl"></span>
                <button onclick="return kiemTra()">Cập nhật</button>
            </form>
        </div>
    <?php
}
    ?>
    <script>
        function kiemTra() {
            var suatl = document.getElementById("suatheloai").value;
            var errsuatl = document.getElementById("errsuatl");
            if (suatl === "") {
                errsuatl.innerHTML = "Nhập tên thể loại";
                return false;
            } else {
                errsuatl.innerHTML = "";
                return true;
            }
            return false;
        }
    </script>
    </body>

    </html>