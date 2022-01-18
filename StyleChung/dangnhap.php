<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Đăng nhập sổ tay sinh viên</title>
    <link rel="stylesheet" href="StyleChung/styledangnhap.css">
    <link rel="stylesheet" href="StyleChung/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1 align="center">TRƯỜNG ĐẠI HỌC QUY NHƠN</h1>
            <h2 align="center">CỔNG THÔNG TIN KHOA CÔNG NGHỆ THÔNG TIN<h2>
                    <br>
        </div>
    </header>
    <div class="dangnhap">
        <div class="container">
            <div id="formdangnhap">
                <form method="post" name="dangnhap-form">
                    <h3>Đăng nhập</h3>
                    <table>
                        <tr height="30px">
                            <td>
                                Mã sinh viên:
                            </td>
                            <td>
                                <input type="text" name="masv">
                            </td>
                        </tr>
                        <tr>
                            <td> Mật khẩu: </td>
                            <td>
                                <input id="submit" type="password" name="matkhau">
                            </td>
                        </tr>
                    </table>
                    <div class="check" align="center">
                        <input type="checkbox"> Quản lý
                    </div>
                    <input id="btndangnhap" type="submit" name="dangnhap" value="Đăng nhập">
                </form>
                <?php
                            $link = new mysqli('localhost','root','','du_an_cong_thong_tin_sinh_vien_khoa_cntt') or die('Kết nối thất bại');
                            mysqli_query($link, 'SET NAMES UTF8');
                            if(isset($_POST['dangnhap'])){
                                if( empty($_POST['masv']) or empty($_POST['matkhau'])) {
                                    echo '</br> <p style="color:red"> Vui lòng nhập đầy đủ mã sinh viên và mật khẩu! </p>';
                                }
                                else
                                {
                                    $msv= $_POST['masv'];
                                    $mk=$_POST['matkhau'];
                                    $query="SELECT *FROM sinh_vien where MaSinhVien='$msv' and MatKhau='$mk'";
                                    $result= mysqli_query($link, $query);
                                    $num= mysqli_num_rows($result);
                                    if($num==0)
                                        {
                                            echo'</br> <p style="color:red"> Sai mã sinh viên hoặc mật khẩu ! </p>';
                                        }
                                    else{
                                        $_SESSION ['msv'] = $msv;
                                        header('location: Trangchu.php');

                                    }
                                }
                            } 
                        ?>
            </div>
        </div>
    </div>
</body>

</html>