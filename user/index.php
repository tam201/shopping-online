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
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM `san_pham`  WHERE tenSanPham LIKE '%$search%' LIMIT $start,$limit";
} else {
    $sql = "SELECT * FROM `san_pham`";
}
$result = mysqli_query($con, $sql);
include("../connect/close.php");
$i = 0;
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
        /* .hr {
            border-top: 4px solid red;
            width: 100%;
            margin: 12px 0;
            padding: 1em;
        } */
        #main1 {
            width: 100%;
            /* height: 112%; */
        }

        /* .banner {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .banner1 {
            overflow: hidden;
            min-height: 130px;
        } */

        /* a.-link {
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 9;
        } */
        .info {
            padding: 30px;
            /* margin-bottom: 1000px; */
            /* margin-top: 151px; */
            position: absolute;
            bottom: 0px;
            left: 0px;
            /* right: 0px; */
            top: 450px;
        }

        /* .item0 {
            display: flex;
            /* position: absolute; */



        .item0 figure img {
            width: 326px;
            height: 260px;
            margin-left: 175px;
        }

        #row1 {
            /* flex-direction: row; */
            position: relative;
            display: flex;
        }

        .item1 figure img {
            width: 326px;
            height: 260px;
            margin-left: -326px;
            margin-top: 260px;
        }

        .item2 figure img {
            width: 326px;
            height: 260px;
            margin-left: 0px;
        }

        .item3 figure img {
            width: 326px;
            height: 260px;
            margin-left: -326px;
            margin-top: 260px;
        }


        .baner1 figure {
            position: relative;
            width: 520px;
            z-index: 0;
            height: 520px;
            float: left;
        }

        /* .baner1 figure img {
            width: 520px;
            height: auto;


        } */

        .header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0px;
            background: #eee;
            height: 60px;
        }

        /* .baner1 figure img:hover {
            left: 0px;
            z-index: 0;
            width: 600px;
            height: 520px;
            transition: all 3s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
            -webkit-transition: all 3s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
        } */

        .banner1 figure img {
            width: 700px;
            height: 520px;
            float: left;
        }

        .tt {
            width: 100%;
            height: 80px;
            background-color: silver;
            position: relative;
        }

        a:link,
        a:visited {
            color: black;
            text-decoration: none;
        }

        #slider {
            margin: 0px auto;
            width: 100%;
            height: 300px;
            border: 1px solid #333;

        }

        .slide {
            width: 100%;
            height: 300px;
        }

        a {

            top: 130px;
            left: 40px;


        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>
    <div class="banner">
        <div id="slider">
            <img src="../user/img/4.webp" class="slide">



        </div>

    </div>
    <h2>Tất cả sản phẩm</h2>
    <div id="main1">
        <div class="row">
            <?php
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
                    <p class="costs">Giá: <?php echo $row["giaTien"] ?>đ</p>
                </a>
            </div>

            <!-- <div><a href="chi-tiet-sp1.php?maSanPham=<?php echo $row["maSanPham"] ?>" class="btn">Xem sản phẩm</a></div> -->

        </div>
    <?php
                $i++;
            }
    ?>
        </div>
    </div>
    <div>
        <?php
        for ($j = 1; $j <= $soTrang; $j++) {

        ?>
            <a href="?trang=<?php echo $j; ?> "><?php echo $j ?></a>
        <?php
        }
        ?>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>