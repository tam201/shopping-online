<?php
if (isset($_GET["maAdmin"])) {
    $maAd = $_GET["maAdmin"];
    include("../connect/open.php");
    $sql = "SELECT * FROM admin WHERE maAdmin=$maAd";
    $result = mysqli_query($con, $sql);
    $ad = mysqli_fetch_array($result);
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

    <body class="">
        <?php include("side-bar.php");
        include("header.php");
        ?>
        <div class="tt">
            <form action="suaAdmin-process.php">
                <table class="" border="1" align="center">
                    <td><input type="hidden" name="ma" value="<?php echo $ad["maAdmin"] ?>"></td>
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" id="email" name="email" value="<?php echo $ad["email"] ?>"></td>
                        <td><span class="err" id="errsuaAdEmail"></span></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><input type="text" id="sdt" name="sdt" value="<?php echo $ad["sdt"] ?>"></td>
                        <td><span class="" id="errsuaAdSdt"></span></td>
                    </tr>
                    <tr>
                        <td><button onclick="return kiemTra()">Cập Nhật</button></td>
                    </tr>
                </table>

        </div>

        </form>



    </body>
<?php
} else {
    header("location: thong-tin.php");
}
?>

    </html>