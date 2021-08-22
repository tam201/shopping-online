<?php
if (isset($_GET["maTheLoai"])) {
    $matl = $_GET["maTheLoai"];
    include("../connect/open.php");
    $sql = "DELETE FROM `the_loai` WHERE `the_loai`.`maTheLoai` = '$matl'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: theloai.php");
} else {
    header("Location: theloai.php");
}
