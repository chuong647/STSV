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
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styleDMK.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
        integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<body>
    <?php
    load_menu();
    ?>
    <div class="home">
        <div class="home-items">
            <?php
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
            $sql1 = "select * from sinh_vien INNER JOIN lop ON sinh_vien.MaLop = lop.MaLop where MaSinhVien='".$_SESSION['Username']."'";
            $pass = md5($pass);
            $repass= md5($repass);
            $kq1 = mysqli_query($kn,$sql1);
            $row = mysqli_fetch_array($kq1);
            $txtMaSV = $row['MaSinhVien'];
        ?>
            <div class="container">
                <br>

                <form action="DoiMatKhau.php" method="POST" class="container-items">
                    <table>
                        <tr>
                            <td>
                                <h1 style="text-align: center">ĐỔI MẬT KHẨU</h1>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="text" type="text" name="txtUserName" value="<?php echo $txtMaSV; ?>"></td>
                        </tr>
                        <tr>
                            <td><input class="text" type="password" name="txtMKMoi" placeholder="Nhập mật khẩu mới">
                            </td>
                        </tr>
                        <tr>
                            <td><input class="text" type="password" name="txtNhapLaiMK"
                                    placeholder="Nhập lại mật khẩu mới"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center">
                                <button class="btn btn-primary" name="btn_DMK" value="btn_DMK"
                                    style="margin: 5px auto 5px 420px;font-size: 24px;cursor: pointer;text-align: center;text-decoration: none;outline: none">
                                    <span> Đổi mật khẩu </span>
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
                <br>
            </div>
            <?php
            load_footer();
        ?>
        </div>
    </div>
</body>
<?php
    $pass = array_key_exists('txtMKMoi', $_POST) ? $_POST['txtMKMoi'] : null;
    $repass = array_key_exists('txtNhapLaiMK', $_POST) ? $_POST['txtNhapLaiMK'] : null;
    $user = $_SESSION['Username'];
    function doimatkhau($user, $pass, $repass)
    {
        if($pass == "" and $repass == "")
        {
            echo '<script>alert("Đổi mật khẩu không thành công");</script> ';
        }
        else
        {
            if($pass == $repass)
            {
                $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt")or die("Chưa kết nối");
                //câu lệnh truy vấn
                $sql = "update sinh_vien set MatKhau = '".$pass."' where MaSinhVien='".$user."'";
                //thực hiện truy vấn	  
                $kq = mysqli_query($kn, $sql) or die("lỗi truy vấn");
                //echo "Đổi mật khẩu thành công";
                echo '<script>alert("Đổi mật khẩu thành công");</script> ';
            }
            else
            {
                echo '<script>alert("Mật khẩu mới và nhập lại mật khẩu không khớp");</script> ';
            }
        }
    }
    
    //Nếu có dữ liệu được truyền về phía sever
    if($_POST)
    {
        if(isset($_POST['btn_DMK']) and $_SERVER['REQUEST_METHOD'] == "POST"){
            doimatkhau($user, $pass, $repass);
        }
    }

?>

</html>