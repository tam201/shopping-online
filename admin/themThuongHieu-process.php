<?php
if (isset($_GET["tenThuongHieu"])) {
    $tenThuongHieu = $_GET["tenThuongHieu"];
    include("../connect/open.php");
    $sql = "INSERT INTO thuong_hieu(tenThuongHieu) VALUES ('$tenThuongHieu')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("location:thuonghieu.php");
} else {
    echo "Không có dữ liệu";
}
