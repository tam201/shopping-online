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
    include("../connect/open.php");
    $maAd = $_SESSION["ma"];
    $sql = "SELECT * FROM admin where maAdmin ='$maAd'";
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");
    ?>
    <div class="tt">
        <form action="">
            <table border="1" align="center" class="table table-striped">
                <tr>
                    <th>Tên admin</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                </tr>
                <?php $ad = mysqli_fetch_array($result) ?>
                <tr>
                    <td><?php echo $ad["tenAdmin"] ?></td>
                    <td><?php echo $ad["ngaySinh"] ?></td>
                    <td><?php echo $ad["email"] ?></td>
                    <td><?php echo $ad["username"] ?></td>
                    <td><?php echo $ad["password"] ?></td>
                    <td><?php echo $ad["email"] ?></td>
                    <td><?php echo $ad["sdt"] ?></td>
                    <td><a href="suaAdmin.php?maAdmin=<?php echo $ad["maAdmin"] ?>" class="a"><i class="fas fa-edit"></i> Sửa</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>