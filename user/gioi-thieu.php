<?php
session_start();

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
        #main {
            width: 100%;
            height: 100%;
            background-color: #939;

        }

        .header h2 {
            font-family: sans-serif;
            color: black;
            /* position: absolute; */
            width: 100%;
            height: 150px;
            margin-top: 100px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0px;
            background: #eee;
            height: 130px;
        }

        .banner img {
            width: 100%;
            height: 518px;
            float: left;
            margin-top: -39px;
        }

        .h2 {
            font-size: 70px;
            margin-top: 200px;
        }
    </style>
</head>

<body>
    <?php
    include("menu.php");
    ?>
    <div class="banner">
        <img src="../user/img/7.jpg">
    </div>
    <!-- <h2 class="h2">Giới thiệu</h2> -->
    <p>
    <h4>Xin chào Khách Hàng Thân yêu</h4>
    ASTOR.COM – Shop Thời Trang Hàn Quốc xách tay Hàng Đầu Việt Nam. Chúng tôi ra đời từ 2011 với mong muốn
    mang đến những sản phẩm thời trang Hàn Quốc tốt nhất tới người tiêu dùng Việt Nam.
    Với phương châm khách hàng là người được hưởng lợi cao nhất nên bằng tất cả niềm đam mê và tận tâm chúng tôi luôn nỗ
    lực và phấn đấu không ngừng nghỉ
    để mang lại những sản phẩm chất lượng cùng dịch vụ tốt nhất cho khách hàng.DEGREY
    mang trong mình phong cách cổ điển hòa quyện cùng kiểu dáng hiện đại đã thổi một làn gió mới vào thị trường thời trang Việt Nam luôn biến đổi không ngừng.

    Cái tên Degrey được tạo ra rất ngẫu hứng, xuất phát từ “Chuỗi ngày u buồn về sự nghiệp, tương lai trong quá khứ của chính mình” – theo lời chia sẻ của Degrey’s founder. Là một local brand mang khuynh hướng Á Đông, kết hợp giữa hai yếu tố truyền thống và hiện đại, Degrey luôn cố gắng mang đến những thông điệp văn hoá ý nghĩa qua từng đường nét thiết kế. Tiếp theo đó sự sang trọng, thanh lịch cũng là những yếu tố tạo nên một Degrey đầy sức hút, sự lựa chọn hoàn hảo dành cho các bạn trẻ yêu thích phong cách hoài cổ nhưng vẫn muốn thoát xác trong những bộ cánh mới mẻ hơn.

    thị hiếu của số đông. Cứ sáng tạo và tự do theo cách của mình muốn. Đó cũng chính là thông điệp của Koo và Degrey muốn gửi gắm cho các bạn thông qua sự kết hợp này.....</p>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>