<?php
if (
    isset($_GET["maSanPham"]) && isset($_GET["tenSanPham"]) && isset($_GET["maTheLoai"]) && isset($_GET["maThuongHieu"])
    && isset($_GET["giaTien"]) && isset($_GET["moTa"]) && isset($_GET["soLuong"])
) {
    $id = $_GET["maSanPham"];
    $ten = $_GET["tenSanPham"];
    $idtl = $_GET["maTheLoai"];
    $idth = $_GET["maThuongHieu"];
    $gt = $_GET["giaTien"];
    $moTa = $_GET["moTa"];
    $solg = $_GET["soLuong"];
    include("../connect/open.php");
    $sql = "UPDATE san_pham SET tenSanPham='$ten',maTheLoai='$idtl',maThuongHieu='$idth',giaTien ='$gt',moTa='$moTa',soLuong ='$solg' WHERE maSanPham=$id";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location:trangql.php");
} else {
    header("Location:trangql.php");
}
