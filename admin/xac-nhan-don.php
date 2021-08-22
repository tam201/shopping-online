<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    include("../connect/open.php");
    $sql = "UPDATE hoa_don SET trangThai = 1 WHERE maHoaDon = $ma";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: don-hang.php");
}
