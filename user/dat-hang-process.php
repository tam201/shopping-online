<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
if (
    isset($_POST["maKhachHang"])
    && isset($_POST["name"])
    && isset($_POST["phone"])
    && isset($_POST["address"])
    && isset($_POST["note"])
) {

    $maKhachHang = $_POST["maKhachHang"];
    $hoTen = $_POST["name"];
    $sdt = $_POST["phone"];
    $diaChi = $_POST["address"];
    $ghiChu = $_POST["note"];
    $ngayDat = date("Y-m-d H-i-s");
    include("../connect/open.php");
    //thêm duwxlieeuj vào bảng hooas đơn
    $sqlHoaDon = "INSERT INTO hoa_don (hoTen,dienThoai,diaChi,ghiChu,maKhachHang,ngayXuatHoaDon)
    VALUES('$hoTen','$sdt','$diaChi','$ghiChu','$maKhachHang','$ngayDat')";

    mysqli_query($con, $sqlHoaDon);

    //tìm dữ liệu mới nhất theem vào đơn hàng
    $sqlMax = "SELECT MAX(maHoaDon) AS maxMa FROM hoa_don";
    $resultMax = mysqli_query($con, $sqlMax);
    $maxMa = mysqli_fetch_array($resultMax);
    $maHoaDon = $maxMa["maxMa"];


    //thêm dữ liệu vào đơn hàng chi tiết mã sp, giá, số lượng
    $gioHang = $_SESSION["cart"];
    foreach ($gioHang as $maSanPham => $quantity) {

        //lấy giá thông qua sản phẩm
        $sqlSanPham = "SELECT * FROM san_pham WHERE maSanPham =$maSanPham";
        $resultSanPham = mysqli_query($con, $sqlSanPham);
        $sanPham = mysqli_fetch_array($resultSanPham);
        $gia = $sanPham["giaTien"];
        $sqlHoaDonChiTiet = "INSERT INTO hoa_don_chi_tiet(maHoaDon,maSanPham,giaBan,soLuong) 
        VALUES ($maHoaDon,$maSanPham,'$gia' ,'$quantity')";
        mysqli_query($con, $sqlHoaDonChiTiet);
        $soLuongKho = $sanPham["soLuong"];


        //số lượng còn lại =số lượng trong kho-số lường từ hóa đơn
        $soLuongConLai = $soLuongKho - $quantity;


        //update dữ liệu sản phẩm
        $sqlUpdateSanPham = "UPDATE san_pham SET soLuong=$soLuongConLai 
        WHERE maSanPham=$maSanPham";
        // echo $sql;
        mysqli_query($con, $sqlUpdateSanPham);
    }
    unset($_SESSION["cart"]);

    include("../connect/close.php");
    header("Location: index.php");
}
