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

    function Them($MaGiangVien, $HoTen, $NgaySinh, $GioiTinh, $DanToc, $SoCMND, $TonGiao, $QueQuan, $SDT, $Email, $ChucVu, $CoVanHocTap, $MatKhau)
    {
        if($MaGiangVien == "")
        {
            echo '<script>alert("M?? gi???ng vi??n kh??ng ???????c b??? tr???ng!");</script>';
        }
        else
        {
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("ch??a k???t n???i");
            $sql2 = "select MaGiangVien from giang_vien where MaGiangVien = '".$MaGiangVien."' ";
            $kq2 = mysqli_query($kn, $sql2);
            $MatKhau = md5($MatKhau);
            if($row1 = mysqli_fetch_array($kq2))
            {
                echo '<script>alert("M?? gi???ng vi??n ???? t???n t???i!");</script>';
            }
            else
            {
                $sql4 = "insert into giang_vien (MaGiangVien, HoTen, NgaySinh, GioiTinh, DanToc, SoCMND, TonGiao, QueQuan, SDT, Email, ChucVu, CoVanHocTap, MatKhau, Job)
                    values ('$MaGiangVien','$HoTen', '$NgaySinh', '$GioiTinh', '$DanToc', '$SoCMND', '$TonGiao', '$QueQuan', '$SDT', '$Email', '$ChucVu', '$CoVanHocTap', '$MatKhau', '')";
                $kq4 = mysqli_query($kn, $sql4);
                echo '<script>alert("Th??m th??nh c??ng");</script>';
            }
        }
        
    }
?>

<body>
    <form action="ThemQLGV.php" method="post">
        <div class="home">
            <div class="home-items home-ad">
                <?php           
             load_menuAD();
        ?>
                <div class="container-ad">
                    <div class="container-ad-items">
                        <h1 style="text-align: center;">TH??NG TIN GI???NG VI??N</h1>
                        <div>
                            <table class="tbsv">
                                <tr>
                                    <td>
                                        <h4>M?? gi???ng vi??n</h4><input class="text" type="text" name="txtMaGiangVien">
                                    </td>
                                    <td>
                                        <h4>H??? t??n gi???ng vi??n</h4><input class="text" type="text" name="txtHoTen">
                                    </td>
                                    <td>
                                        <h4>Email</h4><input class="text" type="text" name="txtEmail">
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
                                        <h4>Qu?? qu??n </h4>
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
                                    <td>
                                        <h4>Ng??y sinh</h4>
                                        <input type="datetime-local" class="text" name="NgaySinh"
                                            style="margin-bottom: 10px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>S??? CMND</h4><input class="text" type="text" name="txtCMND">
                                    </td>
                                    <td>
                                        <h4>T??n gi??o</h4><input class="text" type="text" name="txtTonGiao">
                                    </td>
                                    <td>
                                        <h4>D??n t???c</h4><input class="text" type="text" name="txtDanToc">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>S??? ??i???n tho???i</h4><input class="text" type="text" name="txtSDT">
                                    </td>
                                    <td>
                                        <h4>Ch???c v???</h4><input class="text" type="text" name="txtChucVu">
                                    </td>
                                    <td>
                                        <h4>C??? v???n h???c t???p</h4><input class="text" type="text" name="txtCoVanHocTap">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <h4>M???t kh???u</h4><input class="text" type="password" name="txtPass">
                                    </td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td colspan=3 style="text-align: center;">
                                        <input class="btn1" type="submit" name="btnThem" value="Th??m">
                                        <?php 
                                        if($_POST){
                                            if(isset($_POST['btnThem']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                Them($MaGiangVien, $HoTen, $NgaySinh, $GioiTinh, $DanToc, $SoCMND, $TonGiao, $QueQuan, $SDT, $Email, $ChucVu, $CoVanHocTap, $MatKhau);
                                            }
                                        }
                                    ?>

                                        <input class="btn1" type="submit" name="btnTroVe" value="Tr??? v???">
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