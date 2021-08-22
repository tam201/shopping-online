<?php
session_start();
if (
    isset($_GET["ma"]) && isset($_GET["email"]) && isset($_GET["sdt"])
) {
    $id = $_GET["ma"];
    $email = $_GET["email"];
    $sdt = $_GET["sdt"];

    include("../connect/open.php");
    $sql = "UPDATE admin SET email='$email',sdt='$sdt' where maAdmin = '$id'";
    echo $sql;
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("location: thong-tin.php");
} else {
    header("location: thong-tin.php");
}
