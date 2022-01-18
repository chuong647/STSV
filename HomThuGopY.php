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
    <title>Hòm thư góp ý</title>
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styleDMK.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
        integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <?php
    load_menu();
    ?>
    <div class="home">
        <div class="home-items">
            <div class="container">
                <form action="" method="POST" class="container-items">
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <input class="text" type="text" name="tieude" placeholder="Nhập tiêu đề">
                            </td>
                        </tr>
                        <tr>
                            <td><textarea class="text" name="message" rows="10" cols="40"
                                    placeholder="Nhập nội dung góp ý"></textarea></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle">
                                <button class="btn btn-primary" name="submit" value="submit"
                                    style="margin: 10px auto; display: flex;">
                                    <span> Gửi ý kiến </span>
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
            load_footer();
        ?>
        </div>
    </div>
</body>
<?php 
    function GuiThongTin()
    {
        
        $MaSV = $_SESSION['Username'];
        $message = array_key_exists('message', $_POST) ? $_POST['message'] : null;
        $tieude = array_key_exists('tieude', $_POST) ? $_POST['tieude'] : null;
        $date = getdate();
        $ngay = $date['mday'];
        $thang = $date['mon'];
        $nam = $date['year'];
        $gio = $date['hours'];
        $phut = $date['minutes'];
        $giay = $date['seconds'];

        if($message == "" or $tieude == "")
        {
            echo '<script>alert("Không được bỏ trống tiêu đề hoặc nội dung");</script>';
        }
        else
        {
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt")or die("chưa kết nối");
            $sql = "insert into hom_thu_gop_y (ID, MaSinhVien, Ngay, Thang, Nam, Gio, Phut, Giay, NoiDung, TieuDe)
            values ('', '$MaSV', '$ngay', '$thang', '$nam', '$gio', '$phut', '$giay', '$message', '$tieude')";
            //Thực hiện câu lệnh truy vấn
            $kq = mysqli_query($kn,$sql);
            echo '<script>alert("Gửi thông tin góp ý thành công!");</script>';
        }
    }

    if($_POST){
        if(isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == "POST"){
            GuiThongTin();
        }
    }
?>

</html>