<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ĐĂNG NHẬP QUẢN LÝ SINH VIÊN</title>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styledangnhap.css">
</head>

<body>
    <div class="containerv" style="justify-content: center; display: block;">
        <img src="https://hoitinhoc.binhdinh.gov.vn/wp-content/uploads/2019/04/image001-300x300.png" alt=""
            style="width: 100px; height: 100px">
        <div class="w3-panel w3-amber" style="margin: auto;">
            <h1 class="w3-text-orange" style="text-shadow:1px 1px 0 #444">
                <b>TRƯỜNG ĐẠI HỌC QUY NHƠN <br>
                    <marquee direction="right">CỔNG THÔNG TIN KHOA CÔNG NGHỆ THÔNG TIN
                </b> </marquee>
            </h1>
        </div>
    </div>
    <div class="dangnhap">
        <div class="container">
            <div id="formdangnhap">
                <form method="post" name="dangnhap-form" action="dangnhap.php" method="POST">
                    <div class="imgcontainer">
                        <img src="image/team.png" alt="Avatar" class="avatar">
                    </div>

                    <h2>ĐĂNG NHẬP</h2>

                    <div class="container">
                        <input type="text" name="Username" placeholder="Nhập tên đăng nhập">

                        <input id="submit" type="password" name="Password" placeholder="Nhập mật khẩu">

                        <label>
                            <input class="chon" type="checkbox" name="chonThongTin" value="GiangVien"><span
                                style="color: rgb(155, 147, 147); font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 15px;">
                                Bạn là cán bộ giảng viên</span>
                        </label>

                        <button type="submit" name="btn_submit">Login</button>

                    </div>
                </form>
                <?php   
                    
                          if (isset($_POST["btn_submit"])) {
                            $_SESSION['Username'] = $_POST["Username"]; 
                            $pass =md5($_POST["Password"]);
                            $chon = array_key_exists('chonThongTin', $_POST) ? $_POST['chonThongTin'] : null;
                
                            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt")or die("chưa kết nối");
                            $sql1 = "select * from sinh_vien where MaSinhVien='".$_SESSION['Username']."'";
                            $sql2 = "select * from giang_vien where MaGiangVien='".$_SESSION['Username']."' or HoTen='".$_SESSION['Username']."' ";
                            $kq1 = mysqli_query($kn,$sql1);
                            $kq2 = mysqli_query($kn,$sql2);
                            if($chon == "GiangVien")
                            {
                                if(!($row1 = mysqli_fetch_array($kq2))){
                                    echo "Tên đăng nhập không tồn tại";
                                }
                                else
                                {
                                    if($pass != $row1['MatKhau']){
                                        echo "Sai mật khẩu";
                                    }
                                    else
                                    {
                                        //echo "Đăng nhập thành công";
                                        header("Location: TrangchuAD.php");
                                    }
                                }
                            }
                            else
                            {
                                if(!($row2 = mysqli_fetch_array($kq1))){
                                    echo "Tên đăng nhập không tồn tại";
                                }
                                else
                                {
                                    if($pass != $row2['MatKhau']){
                                        echo "Sai mật khẩu";
                                    }
                                    else
                                    {
                                        //echo "Đăng nhập thành công";
                                        header("Location: Trangchu.php");
                                    }
                                }
                            }
                        }
                        ?>
            </div>
        </div>
    </div>

</body>

</html>