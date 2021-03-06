<?php 
    session_start();
?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleChung/styleChinhSuaQLSV.css">
    <script src="chonkhoa.js"></script>
</head>
<?php 
    $MaSinhVien = array_key_exists('txtMaSinhVien', $_POST) ? $_POST['txtMaSinhVien']: null;
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
    $MaLop = array_key_exists('cboLop', $_POST) ? $_POST['cboLop']: null;
    $TinhTrangHoc = array_key_exists('txtTinhTrangHoc', $_POST) ? $_POST['txtTinhTrangHoc']: null;
    $MatKhau = array_key_exists('txtPass', $_POST) ? $_POST['txtPass']: null;
    $KhoaHoc = array_key_exists('cboKhoa', $_POST) ? $_POST['cboKhoa']: null;
    $txtTimkiem = array_key_exists('txtTimkiem', $_POST) ? $_POST['txtTimkiem']: null;

    $key = $_GET['ma'];

    function Capnhat($key, $HoTen, $NgaySinh, $GioiTinh, $DanToc, $SoCMND, $TonGiao, $QueQuan, $SDT, $Email, $ChucVu, $MaLop, $TinhTrangHoc, $MatKhau)
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("ch??a k???t n???i");
        $sql4 = "update sinh_vien set HoTen = '".$HoTen."', 
                                    NgaySinh = '".$NgaySinh."', 
                                    GioiTinh = '".$GioiTinh."', 
                                    DanToc  = '".$DanToc."', 
                                    SoCMND = '".$SoCMND."', 
                                    TonGiao = '".$TonGiao."', 
                                    QueQuan = '".$QueQuan."', 
                                    SDT = '".$SDT."', 
                                    Email = '".$Email."', 
                                    ChucVu = '".$ChucVu."', 
                                    MaLop = '".$MaLop."',
                                    TinhTrangHoc = '".$TinhTrangHoc."',  
                                    MatKhau= '".$MatKhau."'
                                    where MaSinhVien = '".$key."'";
        $kq4 = mysqli_query($kn, $sql4);
        echo '<script>alert("C???p nh???t th??nh c??ng");</script> ';
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
                <div class="containner-ad-text">
                        <h4>S??? TAY SINH VI??N ONLINE</h4>    
                        <hr> 
                </div>
                <div class="container-ad-items">
                <h1 style="text-align: center; margin-bottom: 30px;">TH??NG TIN SINH VI??N</h1>
                <div>
                    <?php 
                        if($_GET['ma'])
                        {
                            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt")or die("ch??a k???t n???i");
                            $sql1 = "select * from sinh_vien where MaSinhVien='".$key."'";
                            $kq1 = mysqli_query($kn,$sql1);
                            $row2 = mysqli_fetch_array($kq1);
                        }
                    ?> 
                    <table class="tbsv">
                        <tr>
                            <td> <h4>M?? sinh vi??n</h4> <input class="text" type="text"  disabled readonly name="txtMaSinhVien" value="<?php echo $row2['MaSinhVien']; ?>"></td>
                            <td> <h4>H??? t??n sinh vi??n</h4> <input class="text" type="text" name="txtHoTen" value="<?php echo $row2['HoTen']; ?>"></td>
                            <td> <h4>S??? ??i???n tho???i</h4> <input class="text" type="text" name="txtSDT" value="<?php echo $row2['SDT']; ?>"></td>
                        </tr>
                        <tr>
                            <td>
                                <select class="drop cboKhoa" name="cboKhoa">
                                    <option value="" selected="selected">-Ch???n kh??a h???c-</option>
                                    <?php
                                        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("ch??a k???t n???i");
                                        $sql2 = "select * from khoa_hoc";
                                        $kq2 = mysqli_query($kn, $sql2);
                                        while($row3 = mysqli_fetch_array($kq2)):
                                    ?>
                                    <option value="<?php echo htmlspecialchars($row3['MaKhoaHoc']) ?>"><?php echo htmlspecialchars($row3['MaKhoaHoc']) ?></option>
                                    <?php endwhile; ?>
                                </select>               
                            </td>
                            <td>
                                
                                <select class="drop cboLop" name="cboLop">
                                    <option value="" selected="selected"><b>-Ch???n l???p h???c-</b></option>
                                </select>
                            </td>
                            <td>
                                <select class="drop" name="cboQueQuan">
                                    <option selected="selected">-Ch???n qu?? qu??n-</option>
                                    <option value="B??nh ?????nh">B??nh ?????nh</option>
                                    <option value="TP.H??? Ch?? Minh">TP.H??? Ch?? Minh</option>
                                    <option value="H?? N???i">H?? N???i</option>
                                    <option value="???? N???ng">???? N???ng</option>
                                    <option value="Ph?? Y??n">Ph?? Y??n</option>
                                    <option value="Qu??ng Ng??i">Qu??ng Ng??i</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Gi???i t??nh</h4>
                                <div class="wrapper">
                                    <input type="radio" name="GioiTinh" id="option-1" value="Nam">
                                    <input type="radio" name="GioiTinh" id="option-2" value="N???">
                                    <label for="option-1" class="option option-1">
                                        <div class="dot"></div>
                                        <span>Nam</span>
                                    </label>
                                    <label for="option-2" class="option option-2">
                                        <div class="dot"></div>
                                        <span>N???</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <h4>Ng??y sinh</h4>
                                <input type="datetime-local" class="text" name="NgaySinh"> 
                            </td>
                            <td>
                                <h4>S??? CMND</h4>
                                <input class="text" type="text" name="txtCMND" value="<?php echo $row2['SoCMND']; ?>">
                            </td>
                            </tr>
                            <tr>
                                <td><h4>T??n gi??o</h4> <input class="text" type="text" name="txtTonGiao" value="<?php echo $row2['TonGiao'];?>"></td>
                                <td><h4>D??n t???c</h4> <input class="text" type="text" name="txtDanToc" value="<?php echo $row2['DanToc']; ?>"></td>
                                <td><h4>Email</h4><input class="text" type="text" name="txtEmail" value="<?php echo $row2['Email']; ?>"></td>
                            </tr>
                            <tr>
                                <td><h4>Ch???c v???</h4><input class="text" type="text" name="txtChucVu" value="<?php echo $row2['ChucVu']; ?>"></td>
                                <td><h4>T??nh tr???ng h???c</h4><input class="text" type="text" name="txtTinhTrangHoc" value="<?php echo $row2['TinhTrangHoc']; ?>"></td>
                                <td><h4>M???t kh???u</h4><input class="text" type="password" name="txtPass" value="<?php echo $row2['MatKhau']; ?>"></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td colspan=3 style="text-align: center;">
                                    <input class="btn" type="submit" name="btnUpdate" value="C???p nh???t" >
                                        <?php 
                                            if($_POST){
                                                if(isset($_POST['btnUpdate']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                    Capnhat($key, $HoTen, $NgaySinh, $GioiTinh, $DanToc, $SoCMND, $TonGiao, $QueQuan, $SDT, $Email, $ChucVu, $MaLop, $TinhTrangHoc, $MatKhau);
                                                }
                                            }
                                        ?>
                                    <input class="btn" type="submit" name="btnTroVe" value="Tr??? v???" >
                                        <?php 
                                        if($_POST){
                                            if(isset($_POST['btnTroVe']) and $_SERVER['REQUEST_METHOD'] == "POST")
                                            {
                                                echo'<script>window.location.replace("http://localhost/cuoiky/QuanLySinhVien.php");</script>';                               
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
