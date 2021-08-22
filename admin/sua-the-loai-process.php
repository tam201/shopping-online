<?php
if (isset($_GET["maTheLoai"]) && isset($_GET["tenTheLoai"])) {
    $matl = $_GET["maTheLoai"];
    $tentl = $_GET["tenTheLoai"];
    include("../connect/open.php");
    $sql = "UPDATE the_loai set tenTheLoai='$tentl' where maTheLoai = '$matl'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("location: theloai.php");
} else {
    header("location: theloai.php");
}
