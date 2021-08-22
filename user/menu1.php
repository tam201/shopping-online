<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<div class="header">
    <div class="logo" style="margin-top: 30px;"> <a href="index.php">ASTOR</a><label> </label></div>
    <div class="menu">

        <li class="dropdown"><a href="index.php">Trang chủ</a>


        <li class="dropdown1"><a href="gioi-thieu.php">Giới thiệu</a>
            <!-- <ul class="features-menu">
                <li><a href="#">Ipad</a></li>
                <li><a href="#">Samsung Galaxy Tab</a></li>
            </ul> -->
        </li>

        <!-- <li class="dropdown"><span><a href="thuong-hieu.php">Thương hiệu</a> &#9662;</span>
            <ul class="features-menu">
                <li><a href="#">hà nội</a></li>
                <li><a href="#">Gucchi</a></li>
                <li><a href="#">Cani FA</a></li>
                <li><a href="#">MT wo</a></li>
                <li><a href="#">Lem</a></li>
                <li><a href="#">Uniqno</a></li>
            </ul> -->

        <li class="dropdown2"><a href="San-pham.php">Sản phẩm</a>
            <!-- <ul class="features-menu">
                <li><a href="#">Ipad</a></li>
                <li><a href="#">Samsung Galaxy Tab</a></li>
        </ul> -->
        </li>

        <li> <a href="Tim-kiem.php">tk<i class='fas fa-search'></i></a></li>
        <li><a href="form-dang-nhap.php">dn<i class="fas fa-user"></i></a></li>
        <?php if (isset($_SESSION["email"])) {

        ?>
            <li><a href="dang-xuat.php">dx<i class="fas fa-sign-out-alt"></i></a></li>
            <li><a href="gio-hang.php"><i class="fas fa-cart-plus"></i></a></li>
        <?php
        }
        ?>
    </div>
</div>