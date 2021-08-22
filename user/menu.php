<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="assets/css/style.css">
<style>
    #menu {
        display: flex;
        /* margin-left: 569px; */
    }

    ul {
        /* mat cham */
        list-style: none;
        padding: 0;
        margin: 0;

    }

    a {
        text-decoration: none;
        color: black;
    }

    #menu li {
        background-color: #919191;
        padding: 21px 10px 0 10px;
        border-right: 1px solid;
        transition: all 1s;
    }

    #menu li:hover {
        background-color: #EF4A43;
    }

    .cha {
        position: relative;
    }

    .con {
        position: absolute;
        left: 0;
        top: 55px;
        display: none;
    }

    .con li {
        min-width: 140px;
        height: 50px;
        line-height: 0px;
        border-top: 1px solid;
        z-index: 1;
    }




    .cha:hover .con {
        display: block;
    }
</style>
<div class="header">
    <div class="logo" style="margin-top: 20px; width:250px;height:30px"> <a href="index.php"><i class="fab fa-artstation"></i>ASTOR - NOW ONLINE </a><label> </label></div>
    <ul id="menu">
        <li><a class="aa" href="index.php" style="font-size: 21px">Trang chủ</a></li>

        <li class="cha">
            <a class="aa" href="San-pham.php">Sản phẩm</a>
            <ul class="con">
                <li><a class="aa" href="index.php?search=SHIRT">T-SHIRT</a></li>
                <li><a class="aa" href="index.php?search=HOODIE">HOODIE</a></li>
                <li><a class="aa" href="index.php?search=SHORTS">SHORTS</a></li>

            </ul>
        </li>

        <li> <a href="Tim-kiem.php"><i class='fas fa-search'></i></a></li>
        <li><a href="form-dang-nhap.php"><i class="fas fa-user"></i></a></li>



        <li><a href="gio-hang.php"><i class="fas fa-cart-plus"></i></a></li>

    </ul>
</div>