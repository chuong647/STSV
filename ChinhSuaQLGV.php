<!DOCTYPE html>
<?php
     require 'site.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleChung/styleChinhSuaQLGiangVien.css">
    <script src="chonkhoa.js"></script>
</head>
<?php 
    $MaGiangVien = array_key_exists('txtMaGiangVien', $_POST) ? $_POST['txtMaGiangVien']: null;
    $HoTen = array_key_exists('txtHoTen', $_POST) ? $_POST['txtHoTen']: null;
    $NgaySinh = array_key_exists('NgaySinh', $_POST) ? $_POST['NgaySinh']: null;
    $GioiTinh = array_key_exists('GioiTinh', $_POST) ? $_POST['GioiTinh']: null;
    $DanToc = array_key_exists('txtDanToc', $_POST) ? $_POST['txtDanToc']: null;
    $SoCMND = array_key_exists('txtCMND', $_POST) ? $_POST['txtCMND']: null;
    $TonGiao = array_key_exists('txtTonGiao', $_POST) ? $_POST['txtTonGiao']: null;
    $QueQuan = array_key_exists('cboQueQuan', $_POST) ? $_POST['cboQueQuan']: null;
    $SDT = array_key_exists('txtSDT', $_POST) ? $_POST['txtSDT']: null;
    $Email = array_key_exists('txtEmail', $_POST) ? $_POST['txtEmail']: null;
    $ChucVu = array_key_exists('txtChucVu', $_POST) ? $_POST['txtChucVu']: null;
    $CoVanHocTap = array_key_exists('txtCoVanHocTap', $_POST) ? $_POST['txtCoVanHocTap']: null;
    $MatKhau = array_key_exists('txtPass', $_POST) ? $_POST['txtPass']: null;
    $txtTimkiem = array_key_exists('txtTimkiem', $_POST) ? $_POST['txtTimkiem']: null;

    $key = $_GET['ma'];
    function Capnhat($key, $HoTen, $NgaySinh, $GioiTinh, $DanToc, $SoCMND, $TonGiao, $QueQuan, $SDT, $Email, $ChucVu, $CoVanHocTap, $MatKhau)
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $sql4 = "update giang_vien set HoTen = '".$HoTen."', 
                                    NgaySinh = '".$NgaySinh."', 
                                    GioiTinh = '".$GioiTinh."', 
                                    DanToc  = '".$DanToc."', 
                                    SoCMND = '".$SoCMND."', 
                                    TonGiao = '".$TonGiao."', 
                                    QueQuan = '".$QueQuan."', 
                                    SDT = '".$SDT."', 
                                    Email = '".$Email."', 
                                    ChucVu = '".$ChucVu."', 
                                    CoVanHocTap = '".$CoVanHocTap."', 
                                    MatKhau= '".$MatKhau."'
                                    where MaGiangVien = '".$key."'";
        $kq4 = mysqli_query($kn, $sql4);
        echo '<script>alert("Cập nhật thành công");</script> ';
    } 
?>

<body>
    <form action="" method="post">
        <div class="home">
            <div class="home-items home-ad">
                <?php           
             load_menuAD();
        ?>
                <div class="container-ad">
                    <div class="container-ad-items">
                        <h1 style="text-align: center;">THÔNG TIN GIẢNG VIÊN</h1>
                        <div>
                            <?php 
                        if($_GET['ma'])
                        {
                            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt")or die("chưa kết nối");
                            $sql1 = "select * from giang_vien where MaGiangVien='".$key."'";
                            $kq1 = mysqli_query($kn,$sql1);
                            $row2 = mysqli_fetch_array($kq1);
                        }
                    ?>
                            <table class="tbsv">
                                <tr>
                                    <td>
                                        <h4>Mã giảng viên</h4><input class="text" type="text" disabled readonly
                                            name="txtMaGiangVien" value="<?php echo $row2['MaGiangVien']; ?>">
                                    </td>
                                    <td>
                                        <h4>Họ tên giảng viên</h4><input class="text" type="text" name="txtHoTen"
                                            value="<?php echo $row2['HoTen']; ?>">
                                    </td>
                                    <td>
                                        <h4>Email</h4><input class="text" type="text" name="txtEmail"
                                            value="<?php echo $row2['Email']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Giới tính</h4>
                                        <div class="wrapper">
                                            <input type="radio" name="GioiTinh" id="option-1" value="Nam">
                                            <input type="radio" name="GioiTinh" id="option-2" value="Nữ">
                                            <label for="option-1" class="option option-1">
                                                <div class="dot"></div>
                                                <span>Nam</span>
                                            </label>
                                            <label for="option-2" class="option option-2">
                                                <div class="dot"></div>
                                                <span>Nữ</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <select class="drop" name="cboQueQuan">
                                            <option selected="selected">-Chọn quê quán-</option>
                                            <option value="Bình Định">Bình Định</option>
                                            <option value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                                            <option value="Hà Nội">Hà Nội</option>
                                            <option value="Đà Nẵng">Đà Nẵng</option>
                                            <option value="Phú Yên">Phú Yên</option>
                                            <option value="Quãng Ngãi">Quãng Ngãi</option>
                                        </select>
                                    </td>
                                    <td>
                                        <h4>Ngày sinh</h4>
                                        <input type="datetime-local" class="text" name="NgaySinh"
                                            style="margin-bottom: 10px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Số CMND</h4><input class="text" type="text" name="txtCMND"
                                            value="<?php echo $row2['SoCMND']; ?>">
                                    </td>
                                    <td>
                                        <h4>Tôn giáo</h4><input class="text" type="text" name="txtTonGiao"
                                            value="<?php echo $row2['TonGiao'];?>">
                                    </td>
                                    <td>
                                        <h4>Dân tộc</h4><input class="text" type="text" name="txtDanToc"
                                            value="<?php echo $row2['DanToc']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Số điện thoại</h4><input class="text" type="text" name="txtSDT"
                                            value="<?php echo $row2['SDT']; ?>">
                                    </td>
                                    <td>
                                        <h4>Chức vụ</h4><input class="text" type="text" name="txtChucVu"
                                            value="<?php echo $row2['ChucVu']; ?>">
                                    </td>
                                    <td>
                                        <h4>Cố vấn học tập</h4><input class="text" type="text" name="txtCoVanHocTap"
                                            value="<?php echo $row2['CoVanHocTap']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <h4>Mật khẩu</h4><input class="text" type="password" name="txtPass"
                                            value="<?php echo $row2['MatKhau']; ?>">
                                    </td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td colspan=3 style="text-align: center;">
                                        <input class="btn1" type="submit" name="btnUpdate" value="Cập nhật">
                                        <?php 
                                        if($_POST){
                                            if(isset($_POST['btnUpdate']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                Capnhat($key, $HoTen, $NgaySinh, $GioiTinh, $DanToc, $SoCMND, $TonGiao, $QueQuan, $SDT, $Email, $ChucVu, $CoVanHocTap, $MatKhau);
                                            }
                                        }
                                    ?>
                                        <input class="btn1" type="submit" name="btnTroVe" value="Trở về">
                                        <?php 
                                        if($_POST){
                                            if(isset($_POST['btnTroVe']) and $_SERVER['REQUEST_METHOD'] == "POST")
                                            {
                                                echo'<script>window.location.replace("http://localhost/STSV/QuanLyGiangVien.php");</script>';
                                                
                                            }
                                        }
                                    ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            load_footer();
        ?>
        </div>
    </form>
</body>

</html>