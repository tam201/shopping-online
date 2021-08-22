<?php
if (
    isset($_GET["tenAdmin"]) && isset($_GET["username"]) && isset($_GET["password"])
    && isset($_GET["ngaySinh"]) && isset($_GET["Email"]) && isset($_GET["sdt"]) && isset($_GET["quyen"])
) {
    $tenad = $_GET["tenAdmin"];
    $username = $_GET["username"];
    $password = $_GET["password"];
    $ngaySinh = $_GET["ngaySinh"];
    $email = $_GET["Email"];
    $sdt = $_GET["sdt"];
    $quyen = $_GET["quyen"];
    include("../connect/open.php");
    $sqlad = "INSERT INTO admin(tenAdmin,username,password,ngaySinh, email, sdt,quyen)
    VALUES ('$tenad','$username','$password','$ngaySinh','$email','$sdt','$quyen')";

    mysqli_query($con, $sqlad);
    include("../connect/close.php");
    header("Location:thong-tin.php");
} else {
    echo "Không có dữ liệu";
}
