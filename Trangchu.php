<!DOCTYPE html>
<?php
    require 'site.php';
    
?>
<html lang="en">
<head>
    <title>Trang chủ</title>
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <?php
    load_menu();
    ?>

    <div class="home">
        <div class="home-items">
            <div class="container-fluid">
                <div class="container-img">
                    <img src="./image/sumenh.jpg" alt="">
                </div>

                <h2 style="font-family: Bahnschrift; font-size: 45px">Sứ mệnh</h2>
                <p style="font-family: Bahnschrift">
                    Khoa Công nghệ thông tin Trường Đại học Quy Nhơn là trung tâm đào tạo đại học, sau đại học, cung cấp nguồn nhân lực chất lượng cao đáp ứng yêu cầu phát triển kinh tế - xã hội đất nước, 
                    đặc biệt là đào tạo nguồn nhân lực cho khu vực miền Trung - Tây Nguyên.
                Khoa cũng là đơn vị quan trọng trong nghiên cứu khoa học, phát triển ứng dụng và chuyển
                giao công nghệ thuộc lĩnh vực công nghệ thông tin.</p>
                <h2 style="font-family: Bahnschrift; font-size: 45px">Tầm nhìn</h2>
                <p style="font-family: Bahnschrift"> Đến năm 2030, Khoa Công nghệ thông tin Trường Đại học Quy Nhơn trở thành đơn vị đào tạo và nghiên cứu khoa học uy tín của cả nước, có vai trò nòng cốt trong đào tạo, nghiên cứu, 
                    và chuyển giao các sản phẩm đào tạo về Công nghệ thông tin của Trường Đại học Quy Nhơn.
                </p>
            </div>
        </div>
        <?php
            load_footer();
        ?>
       </div>
    </div>
</body>
</html>