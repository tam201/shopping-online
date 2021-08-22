<?php
if (isset($_GET["maSanPham"])) {
    $maSp = $_GET["maSanPham"];
    include("../connect/open.php");
    $sql = "DELETE FROM san_pham WHERE san_pham.maSanPham = '$maSp'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: trangql.php");
} else {
    header("Location: trangql.php");
}
