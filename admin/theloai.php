<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
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

            z-index: 1;
        }

        .tt1 {
            width: 50%;
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
    $c = 1;
    include("../connect/open.php");
    $sql = "SELECT * FROM the_loai";
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");
    ?>
    <div class="tt">
        <form class="">
            <a href="themtheloai.php" class="a">Thêm Thể Loại</a>
            <table border="1" class="tt1" align="center">
                <tr>
                    <td>
                        Mã Thể Loại
                    </td>
                    <td>Tên Thể Loại</td>
                </tr>
                <?php
                while ($tl = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $c++ ?></td>
                        <td><?php echo $tl["tenTheLoai"] ?></td>
                        <td><a href="sua-the-loai.php?maTheLoai=<?php echo $tl["maTheLoai"] ?>" class="a"><i class="fas fa-edit"></i> Sửa</a></td>
                        <td><a href="xoa-the-loai.php?maTheLoai=<?php echo $tl["maTheLoai"] ?>" onclick="return confirm('Bạn có muốn xóa không ?')" class="a"><i class="fas fa-trash-alt"></i> Xóa</a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
    </div>
    </form>
</body>

</html>