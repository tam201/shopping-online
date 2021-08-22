<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </link>
    <title>Document</title>
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

        .tt1 {
            width: 70%;
        }

        .a {
            text-decoration: none;
            font-size: 25px;
            color: blue;
            display: block;
            font-size: 20px;
        }

        .a:hover {
            color: black;
        }
    </style>
</head>

<body>
    <?php

    $a = 1;
    include("header.php");
    include("side-bar.php");
    include("../connect/open.php");
    if (isset($_GET["search"])) {
        $search = $_GET["search"];
        $sql = "SELECT * FROM khach_hang where email LIKE '$search'";
    } else {
        $sql = "SELECT * FROM khach_hang";
    }
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");
    ?>
    <div class="tt">
        <form action="" align="center">
            <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                                        echo $_GET["search"];
                                                    } ?>">
            <button>Tìm kiếm</button><br>
        </form>
        <table class="tt1" border="1" align="center">
            <tr>
                <th>Mã Khách Hàng</th>
                <th>Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            <?php while ($kh = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $a++ ?></td>
                    <td><?php echo $kh["tenKhachHang"] ?></td>
                    <td><?php
                        if ($kh["gioiTinh"] == 1) {
                            echo "Nam";
                        } else {
                            echo "Nữ";
                        }
                        ?></td>
                    <td><?php echo $kh["email"] ?></td>
                    <td><?php echo $kh["dienThoai"] ?></td>
                    <td><?php echo $kh["diaChi"] ?></td>
                    <td>
                        <?php
                        if ($kh["trangThai"] == 0) {
                            echo "Deactivate";
                        } else {
                            echo "Active";
                        }
                        ?>
                    </td>
                    <?php
                    if ($kh["trangThai"] == 0) {
                    ?>
                        <td align="center"><a class="a" href="khoatkkh.php?maKhachHang=<?php echo $kh["maKhachHang"] ?>" onclick="return confirm('Bạn có muốn khóa tài khoản này ?')"><i class="fas fa-user-lock"></i></a></td>
                    <?php
                    } else {
                    ?>
                        <td align="center"><a class="a" href="motkkh.php?maKhachHang=<?php echo $kh["maKhachHang"] ?>" onclick="return confirm('Bạn có muốn mở tài khoản này')"><i class="fas fa-unlock-alt"></i></a></td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            } ?>
        </table>
    </div>
</body>

</html>