
<?php
if (
    isset($_POST["ma-khach-hang"])
    && isset($_POST["password"])
) {
    $maKhachHang = $_POST["ma-khach-hang"];
    $pass = $_POST["password"];
    include("../connect/open.php");
    $sql = "UPDATE `khach_hang` SET `password` = '$pass' WHERE `khach_hang`.`maKhachHang` = $maKhachHang";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: index.php");
} else {
    header("Location: index.php");
}
