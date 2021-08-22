<?php
session_start();
if (isset($_SESSION["user"])) {
} else {
    $check = false;
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        $pass = $_COOKIE["pass"];
        $check = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../icon/font-awesome/svgs/">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </link>
    <style>
        .tt {
            position: absolute;
            height: 80%;
            width: 85%;
            left: 15%;
            top: 20%;
            font-size: 20px;
            padding: 0px 10px;
            background-color: #E0E0F8;
        }

        .a {
            text-decoration: none;
            font-size: 25px;
            color: blue;
            display: block;
        }

        .a:hover {
            color: black;
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    include("side-bar.php");
    $b = 1;
    include("../connect/open.php");
    $maAd = $_SESSION["ma"];
    if (isset($_GET["search"])) {
        $search = $_GET["search"];
        $sql = "SELECT * FROM admin WHERE tenAdmin LIKE '%$search%'";
    }
    if ($_SESSION["quyen"] == "Admin") {
        $sql = "SELECT * FROM admin where maAdmin ='$maAd'";
    } else {
        $sql = "SELECT * FROM admin where quyen = 0";
    }
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");

    ?>
    <div class="tt">

        <?php if ($_SESSION["quyen"] == "Superadmin") {
        ?>
            <a href="../admin/themAdmin.php" class="a"><i class="fas fa-user-plus"></i> Thêm Nhân Viên</a>
        <?php }   ?>
        <form align="center">
            <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                                        echo $_GET["search"];
                                                    } ?>">
            <button>Tìm kiếm</button>
        </form>
        <table border="1" align="center">
            <tr>
                <th>Tên admin</th>
                <th>Ngày sinh</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Số điện thoại</th>
            </tr>
            <?php
            while ($ad = mysqli_fetch_array($result)) {
            ?>
                <tr>

                    <td><?php echo $ad["tenAdmin"] ?></td>
                    <td><?php echo $ad["ngaySinh"] ?></td>
                    <td><?php echo $ad["email"] ?></td>
                    <td><?php echo $ad["username"] ?></td>
                    <td><?php echo $ad["password"] ?></td>
                    <td><?php echo $ad["email"] ?></td>
                    <td><?php echo $ad["sdt"] ?></td>
                    <td><a href="suaAdmin.php?maAdmin=<?php echo $ad["maAdmin"] ?>" class="a"><i class="fas fa-edit"></i></a></td>
                    <td>
                        <?php if ($_SESSION["quyen"] == "Superadmin") {
                        ?>
                            <a href="xoaAdmin.php?maAdmin=<?php echo $ad["maAdmin"] ?>" onclick="return confirm('Bạn có muốn xóa không?')" class="a"><i class="fas fa-user-times"></i> </a>
                    </td>
                    <td><a href="resetpass.php?maAdmin=<?php echo $ad["maAdmin"] ?>" onclick="return confirm('Reset password ?')" class="a">ResetPass</a></td>
                <?php
                        }
                ?>

                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
</body>

</html>