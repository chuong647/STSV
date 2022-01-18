<!DOCTYPE html>
<?php
     require 'site.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="home">
        <div class="home-items home-ad">
        <?php           
             load_menuAD();
        ?>
            <div class="container-ad">
                <div class="container-ad-items" style="height:500px">
                    <img style="height:120%; width:100%;" src="image/anh4.jpg" alt="">
                </div>

            </div>          
        </div>
        <?php
            load_footer();
            ?>
    </div>
</body>

</html>