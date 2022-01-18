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
    <title>Thông tin sinh viên</title>
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styleTTSV.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        h3{
            margin: 15px;
        }
    </style>
<body>
    <?php
        load_menu();
    ?>
    <div class="home">
       <div class="home-items">
       <?php 
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt")or die("chưa kết nối");
            $sql1 = "select * from sinh_vien INNER JOIN lop ON sinh_vien.MaLop = lop.MaLop where MaSinhVien='".$_SESSION['Username']."'";
            $kq1 = mysqli_query($kn,$sql1);
            $row = mysqli_fetch_array($kq1);
            $txtMaSV = $row['MaSinhVien'];
            $txtLop = $row['TenLop'];
            $txtKhoa = $row['MaKhoaHoc'];
            $txtTen = $row['HoTen'];
            $txtGioiTinh = $row['GioiTinh'];
            $txtNgaySinh = $row['NgaySinh'];
            $txtCMND = $row['SoCMND'];
            $txtQueQuan = $row['QueQuan'];
            $txtTonGiao = $row['TonGiao'];
            $txtJob = $row['Job'];
            $txtDanToc = $row['DanToc'];
            $txtSDT = $row['SDT'];
            $txtEmail = $row['Email'];
            $txtChucVu = $row['ChucVu'];
        ?> 
        <div class="container-fluid">
            
           <br>
            <form action="ThongTinSinhVien.php" method = "POST">
                <table>
                    <tr>
                        <td><h3 style="font-family: Bahnschrift" >Mã sinh viên:</h3> <input class="text" type="text" name="txtMaSV" placeholder="Mã Sinh viên" value="<?php echo $txtMaSV; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Lớp:</h3> <input class="text" type="text" name="txtLop" placeholder="Lớp" value="<?php echo $txtLop; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Khóa học: </h3><input class="text" type="text" name="txtKhoa" placeholder="Mã khóa Học" value="<?php echo $txtKhoa; ?>"></td>
                    </tr>
                    <tr>
                        <td> <h3 style="font-family: Bahnschrift">Họ tên sinh viên:</h3><input class="text" type="text" name="txtTen" placeholder="Họ và tên" value="<?php echo $txtTen; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Giới tính:</h3> <input class="text" type="text" name="txtGioiTinh" placeholder="Giới tính" value="<?php echo $txtGioiTinh; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Ngày sinh:</h3> <input type="text" class="text" name="txtNgaySinh" value="<?php echo $txtNgaySinh; ?>"></td>
                    </tr>
                    <tr>
                        <td><h3 style="font-family: Bahnschrift">Số CMND:</h3> <input class="text" type="text" name="txtCMND" placeholder="Số CMND" value="<?php echo $txtCMND; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Quê quán:</h3> <input class="text" type="text" name="txtQueQuan" placeholder="Quê quán" value="<?php echo $txtQueQuan; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Tôn giáo:</h3> <input class="text" type="text" name="txtTonGiao" placeholder="Tôn giáo" value="<?php echo $txtTonGiao; ?>"></td>
                    </tr>
                    <tr>
                        <td><h3 style="font-family: Bahnschrift">Nghề nghiệp:</h3> <input class="text" type="text" name="txtJob" placeholder="Nghề nghiệp" value="<?php echo $txtJob; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Dân tộc:</h3> <input class="text" type="text" name="txtDanToc" placeholder="Dân tộc" value="<?php echo $txtDanToc; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Số điện thoại:</h3> <input class="text" type="text" name="txtSDT" placeholder="Số điện thoại" value="<?php echo $txtSDT; ?>"></td>
                    </tr>
                    <tr>
                        <td><h3 style="font-family: Bahnschrift">Email:</h3> <input class="text" type="text" name="txtEmail" placeholder="Email" value="<?php echo $txtEmail; ?>"></td>
                        <td><h3 style="font-family: Bahnschrift">Chức vụ:</h3> <input class="text" type="text" name="txtChucVu" placeholder="Chức vụ" value="<?php echo $txtChucVu; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="vertical-align:middle">
                            <br>
                            <input class="btn btn-primary" type="submit" name="btnupdate" value="Cập nhật">
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
    if(isset($_POST)){
        $Email = array_key_exists('txtEmail', $_POST) ? $_POST['txtEmail'] : null;
        $SDT = array_key_exists('txtSDT', $_POST) ? $_POST['txtSDT'] : null;
        $CMND = array_key_exists('txtCMND', $_POST) ? $_POST['txtCMND'] : null;
        $QQ = array_key_exists('txtQueQuan', $_POST) ? $_POST['txtQueQuan'] : null;
        $NS = array_key_exists('txtNgaySinh', $_POST) ? $_POST['txtNgaySinh'] : null;
        $SDT = array_key_exists('txtSDT', $_POST) ? $_POST['txtSDT'] : null;
        $CV = array_key_exists('txtChucVu', $_POST) ? $_POST['txtChucVu'] : null;

        //$kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt")or die("Chưa kết nối");
        $tim_nguoi_dung = "select * from sinh_vien where MaSinhVien='".$_SESSION['Username']."'";
        $kq2 = mysqli_query($kn, $tim_nguoi_dung);
        if(!($row = mysqli_fetch_array($kq2)))
        {
            echo "Không tìm thấy tên tài khoản";
        }
        else
        {
            if (isset($_POST["btnupdate"])) {
                        //câu lệnh truy vấn
                        $sql = "update sinh_vien set Email = '".$Email."', SDT = '".$SDT."' , SoCMND = '".$CMND."' , QueQuan = '".$QQ."' , NgaySinh = '".$NS."' , SDT = '".$SDT."' , ChucVu = '".$CV."' where MaSinhVien='".$_SESSION['Username']."'";
                        //thực hiện truy vấn	  
                        $kq = mysqli_query($kn, $sql) or die("Không thêm được");
                        //echo "Đổi mật khẩu thành công";
                        echo '<script>alert("Cập nhật thông tin thành công");</script> ';
                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=ThongTinSinhVien.php\">";
            }
        }
    }
?>
</html>