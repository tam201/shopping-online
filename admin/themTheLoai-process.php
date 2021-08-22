<?php
if (isset($_GET["tenTheLoai"])) {
    $tenTheLoai = $_GET["tenTheLoai"];
    include("../connect/open.php");
    $sql = "INSERT INTO the_loai(tenTheLoai) VALUES ('$tenTheLoai')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("location:theloai.php");
} else {
    echo "Không có dữ liệu";
}
