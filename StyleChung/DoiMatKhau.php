<!DOCTYPE html>
<?php
    session_start();    
    require 'site.php';
    load_menu();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styleDMK.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<body>
    <div class="home">
        <div class="home-items">
        <?php
            $kn = mysqli_connect("localhost", "root", "", "stsv") or die("chưa kết nối");
            $sql1 = "SELECT * from sinh_vien INNER JOIN lop ON sinh_vien.MaLop = lop.MaLop where MaSinhVien='".$_SESSION['msv']."'";
            $kq1 = mysqli_query($kn,$sql1);
            $row = mysqli_fetch_array($kq1);
            $txtMaSV = $row['MaSinhVien'];
        ?>
        <div class="container">
            <form action="DoiMatKhau.php" method="POST" class="container-items">
                <table>
                    <tr>
                        <td><input class="text" type="text" name="txtUserName" value="<?php echo $txtMaSV; ?>"></td>
                    </tr>
                    <tr>
                        <td><input class="text" type="password" name="txtMKMoi" placeholder="Nhập mật khẩu mới"></td>
                    </tr>
                    <tr>
                        <td><input class="text" type="password" name="txtNhapLaiMK" placeholder="Nhập lại mật khẩu mới"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            <button class="btn_submit" name="btn_DMK" value="btn_DMK" style="vertical-align:middle">
                                <span> Đổi mật khẩu </span>
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
    $pass = array_key_exists('txtMKMoi', $_POST) ? $_POST['txtMKMoi'] : null;
    $repass = array_key_exists('txtNhapLaiMK', $_POST) ? $_POST['txtNhapLaiMK'] : null;
    $user = $_SESSION['msv'];
    
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
                $kn = mysqli_connect("localhost", "root", "", "stsv")or die("Chưa kết nối");
                //câu lệnh truy vấn
                $sql = "UPDATE sinh_vien set MatKhau = '".$pass."' where MaSinhVien='".$user."'";
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