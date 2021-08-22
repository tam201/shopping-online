â
<?php
if (isset($_FILES["image"])) {
    //B1: Lấy ảnh về
    $image = $_FILES["image"];
    print_r($image);
    //B2: Tạo folder và lấy đường dẫn về
    $folder = "../image/";
    //B3: Lấy tên về
    $imageName = $image["name"];
    //B4: Tạo đường dẫn
    $direction = $folder . $imageName;
    echo $direction;
    //B5: Di chuyển từ tmp_file đến file upload
    move_uploaded_file($image["tmp_name"], $direction);
    //B6: Lưu trữ vào DB
    include("../connect/open.php");
    $sql = "INSERT INTO san_pham(hinhAnh) values('$direction')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
}
header("location: sanPhamChiTiet.php");
