<?php
if (isset($_GET["maAdmin"])) {
    $maAd = $_GET["maAdmin"];
    include("../connect/open.php");
    $sql = "UPDATE admin set password = 1 where maAdmin = '$maAd'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("location: thong-tin.php");
}
