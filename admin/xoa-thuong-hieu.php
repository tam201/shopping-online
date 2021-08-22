<?php
if (isset($_GET["maThuongHieu"])) {
    $math = $_GET["maThuongHieu"];
    include("../connect/open.php");
    $sql = "DELETE FROM `thuong_hieu` WHERE `thuong_hieu`.`maThuongHieu` = '$math'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: thuonghieu.php");
} else {
    header("Location: thuonghieu.php");
}
