<?php
if (isset($_GET["maThuongHieu"]) && isset($_GET["tenThuongHieu"])) {
    $math = $_GET["maThuongHieu"];
    $tenth = $_GET["tenThuongHieu"];
    include("../connect/open.php");
    $sql = "UPDATE thuong_hieu set tenThuongHieu='$tenth' where maThuongHieu = '$math'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("location: thuonghieu.php");
} else {
    header("location: thuonghieu.php");
}
