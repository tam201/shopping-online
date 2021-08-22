    <?php
    if (
        isset($_POST["tenSanPham"]) && isset($_POST["maTheLoai"]) && isset($_POST["maThuongHieu"])
        && isset($_POST["giaTien"]) && isset($_POST["moTa"])
        && isset($_POST["soLuong"]) && isset($_FILES["hinhAnh"])
    ) {
        if (isset($_FILES["hinhAnh"])) {
            $hinhAnh1 = $_FILES["hinhAnh"];
            $folder = "../image/";
            $imagename = $hinhAnh1["name"];
            $direction = $folder . $imagename;
            move_uploaded_file($hinhAnh1["tmp_name"], $direction);
        }

        $tenSp = $_POST["tenSanPham"];
        $maTheLoai = $_POST["maTheLoai"];
        $maThuongHieu = $_POST["maThuongHieu"];
        $giaTien = $_POST["giaTien"];
        $moTa = $_POST["moTa"];
        $soLuong = $_POST["soLuong"];
        $hinhAnh = $_FILES["hinhAnh"];
        include("../connect/open.php");
        $sqlsp = "INSERT INTO san_pham(tenSanPham,maTheLoai,maThuongHieu,giaTien,moTa,soLuong,hinhAnh)
    VALUES ('$tenSp','$maTheLoai','$maThuongHieu','$giaTien','$moTa','$soLuong','$direction')";
        mysqli_query($con, $sqlsp);
        header("Location: trangql.php");
        include("../connect/close.php");
    }
