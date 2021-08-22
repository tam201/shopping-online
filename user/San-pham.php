<?php
session_start();
?>
<?php
include("../connect/open.php");
$limit = 12;
$start = 0;
$sqlDemSp =  "SELECT COUNT(*) as tongSp FROM `san_pham`";
$resultDemSp = mysqli_query($con, $sqlDemSp);
$demSp = mysqli_fetch_array($resultDemSp);
$tongSoSp = $demSp["tongSp"];

$soTrang = ceil($tongSoSp / $limit);

if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    $start = ($trang - 1) * $limit;
}
$sql = "SELECT * FROM `san_pham` ORDER BY `san_pham`.`maSanPham` DESC LIMIT $start,$limit";
$result = mysqli_query($con, $sql);
include("../connect/close.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .hr {
            /* border-top: 4px solid red; */
            width: 100%;
            /* margin: 76px 0; */
            padding: 1em;
            margin-top: 96px;
            float: left;
        }

        .item {
            width: 294px;
            text-align: center;
            margin: 3px;
            /* border: 1px solid; */
            height: 410px;
            margin-left: 32px;
            /* position: absolute; */
            /* order: -3; */
            font-family: 'Quicksand', sans-serif !important;
        }

        .button {
            width: 169px;
            height: 40px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: #45a049;
            color: white;
            text-align: center;
        }

        .button:hover {
            font-size: 15px;
        }

        button {
            width: 169px;
            height: 40px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: #45a049;
            color: white;
            text-align: center;
        }

        button:hover {
            font-size: 15px;
        }

        .row {
            width: 100%;
            /* height: 100%; */
            position: relative;
            display: flex;
            flex-direction: row;
            margin-top: 50px;
        }

        .btn {
            background: #2b89c8;
            color: white !important;
            padding: 20px 10px;
            display: inline-block;
            border-radius: 20px;
            cursor: pointer;
            line-height: 0px;
        }

        .btn:hover {
            background-color: #46a7e8;
        }

        ul {
            list-style: none;
            float: initial;
        }

        ul li {
            display: inline-block;
        }


        ul li a {
            text-decoration: none;
            color: black;
            font-size: 15px;
            padding: 5px 0px;

        }

        .header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0px;
            background: #eee;
            height: 130px;
            top: 0px;
        }

        .tt {
            width: 100%;
            height: 80px;
            background-color: silver;
            position: relative;
            margin-top: 5%;
        }

        a:link,
        a:visited {
            color: black;
            text-decoration: none;
        }

        /* .banner img {
            width: 100%;
            height: 518px;
            float: left;
            /* margin-top: -54px; */


        .h3 {
            margin-top: 142px;
            margin-left: 78px;
        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>
    <div class="banner" style="height: 415px; margin-top:73px">
        <img src="../user/img/4.webp">
    </div>
    <h3 class="h3">Sản phẩm mới về</h3>
    <div class="row">

        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            if ($i % 4 == 0) {
        ?>
    </div>
    <div class="row">
    <?php
            }
    ?>
    <div class="item">
        <div>
            <a href="chi-tiet-sp1.php?maSanPham=<?php echo $row["maSanPham"] ?>">
                <img src="<?php echo $row["hinhAnh"] ?>" width="250px" height="300px" alt="">
                <h3><?php echo $row["tenSanPham"] ?></h3>

                <p class="costs">Giá: <?php echo $row["giaTien"] ?>VNĐ</p>
            </a>
        </div>

        <!-- <div><a href="chi-tiet-sp1.php?maSanPham=<?php echo $row["maSanPham"] ?>" class="btn">Xem sản phẩm</a></div> -->

    </div>
<?php
            $i++;
        }
?>
    </div>
    <?php
    for ($j = 1; $j <= $soTrang; $j++) {

    ?>
        <a href="?trang=<?php echo $j; ?> "><?php echo $j ?></a>
    <?php
    }
    ?>

    <?php
    include("footer.php");
    ?>
</body>

</html>