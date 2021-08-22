<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    include("../connect/open.php");
    $sql = "UPDATE hoa_don SET trangThai = 0 WHERE maHoaDon = $ma";
    mysqli_query($con, $sql);
    $sqldhct = "SELECT * FROM hoa_don_chi_tiet where maHoaDon = $ma ";
    $resultdhct = mysqli_query($con, $sqldhct);
    $hdct = mysqli_fetch_array($resultdhct);
    $soluongdat = $hdct["soLuong"];
    $masp = $hdct["maSanPham"];
    $sqlsp = "SELECT * FROM san_pham where maSanPham = $masp";
    $resultsp = mysqli_query($con, $sqlsp);
    $sp = mysqli_fetch_array($resultsp);
    $soluongSpCon = $sp["soLuong"];
    $soluong = $soluongSpCon + $soluongdat;
    $sqlupdatesp = "UPDATE san_pham set soLuong = '$soluong' where maSanPham = '$masp'";
    mysqli_query($con, $sqlupdatesp);
    include("../connect/close.php");
    header("location: don-hang.php");
}
