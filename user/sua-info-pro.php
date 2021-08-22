<?php
if (
    isset($_GET["maKhachHang"])
    && isset($_GET["tenKhachHang"])
    && isset($_GET["diaChi"])
    && isset($_GET["gioiTinh"])
    && isset($_GET["ntn"])
    && isset($_GET["sdt"])

) {
    $maKhachHang = $_GET["maKhachHang"];
    $tenKhachHang = $_GET["tenKhachHang"];
    $diaChi = $_GET["diaChi"];
    $ngaySinh = $_GET["ntn"];
    $gioiTinh = $_GET["gioiTinh"];
    $dienThoai = $_GET["sdt"];

    //Mở kết nối
    include("../connect/open.php");
    $sql = "UPDATE khach_hang SET tenKhachHang='$tenKhachHang',diaChi='$diaChi',
        ngaySinh='$ngaySinh',gioiTinh='$gioiTinh',dienThoai='$dienThoai'
        WHERE maKhachHang='$maKhachHang'";
    mysqli_query($con, $sql);
    // echo $sql;
    //Đóng kết nối
    include("../connect/close.php");
    header("Location: index.php");
} else {
    header("Location: index.php");
    // echo ("12");
}
