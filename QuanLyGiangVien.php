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
    <title>Quản Lý Giảng Viên</title>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="StyleChung/styleQLGiangVien.css">
</head>
<?php 
    $MaGiangVien = array_key_exists('txtMaGiangVien', $_POST) ? $_POST['txtMaGiangVien']: null;
    $HoTen = array_key_exists('txtHoTen', $_POST) ? $_POST['txtHoTen']: null;
    $NgaySinh = array_key_exists('NgaySinh', $_POST) ? $_POST['NgaySinh']: null;
    $GioiTinh = array_key_exists('GioiTinh', $_POST) ? $_POST['GioiTinh']: null;
    $DanToc = array_key_exists('txtDanToc', $_POST) ? $_POST['txtDanToc']: null;
    $SoCMND = array_key_exists('txtSoCMND', $_POST) ? $_POST['txtSoCMND']: null;
    $TonGiao = array_key_exists('txtTonGiao', $_POST) ? $_POST['txtTonGiao']: null;
    $QueQuan = array_key_exists('cboQueQuan', $_POST) ? $_POST['cboQueQuan']: null;
    $SDT = array_key_exists('txTSDT', $_POST) ? $_POST['txtSDT']: null;
    $Email = array_key_exists('txtEmail', $_POST) ? $_POST['txtEmail']: null;
    $ChucVu = array_key_exists('txtChucVu', $_POST) ? $_POST['txtChucVu']: null;
    $CoVanHocTap = array_key_exists('txtCoVanHocTap', $_POST) ? $_POST['txtCoVanHocTap']: null;
    $MatKhau = array_key_exists('txtPass', $_POST) ? $_POST['txtPass']: null;
    $txtTimkiem = array_key_exists('txtTimkiem', $_POST) ? $_POST['txtTimkiem']: null;


    function TimKiem($txtTimkiem)
    {
        if($txtTimkiem == "")
        {
            echo '<script>alert("Bạn cần nhập thông tin tìm kiếm");</script> ';
        }
        else
        {
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
            $sql3 = "select * from giang_vien where giang_vien.MaGiangVien='".$txtTimkiem."' or giang_vien.HoTen like '%".$txtTimkiem."%'";
            $kq3 = mysqli_query($kn, $sql3);
            $stt = 0;
            while($row2 = mysqli_fetch_array($kq3))
            {
                $stt = $stt+1;
                $_SESSION['MaGiangVien'] = $row2['MaGiangVien'];
                $maGV = $_SESSION['MaGiangVien'];
                echo "<tr class='hang1'>
                    <td class='cot' style='text-align: center;'>".$stt."</td>
                    <td class='cot'>".$row2['MaGiangVien']."</td>
                    <td class='cot' >".$row2['HoTen']."</td>
                    <td class='cot' >".$row2['NgaySinh']."</td>
                    <td class='cot'>".$row2['GioiTinh']."</td>
                    <td class='cot'>".$row2['DanToc']."</td>
                    <td class='cot'>".$row2['SoCMND']."</td>
                    <td class='cot'>".$row2['TonGiao']."</td>
                    <td class='cot'>".$row2['QueQuan']."</td>
                    <td class='cot'>".$row2['SDT']."</td>
                    <td class='cot'>".$row2['Email']."</td>
                    <td class='cot'>".$row2['ChucVu']."</td>
                    <td class='cot'>".$row2['CoVanHocTap']."</td>
                    <td class='cot'>".$row2['MatKhau']."</td>
                    <td class='cot'><a href = 'ChinhSuaQLGV.php?ma=$maGV'>Chỉnh sửa</a></td>
                </tr>";
            }
        }
    }
?>
<body>
    <form action="" method="POST">
    <div class="home">
        <div class="home-items home-ad">
        <?php           
             load_menuAD();
        ?>
            <div class="container-ad">
                <div class="container-ad-items">
                <h1 style="text-align: center;">QUẢN LÝ GIẢNG VIÊN</h1>
                <div style="display: flex; justify-content: space-around;">
                    <div >
                        <table align="Center">
                            <tr>
                                <td><input class="text1" type="text" name="txtTimkiem" placeholder="Nhập mã giảng viên cần tìm"></td>
                                <td>
                                    <button class="btn1" style="vertical-align:middle" name="btnTimKiem" value="btnTimKiem">
                                        <span> Tìm kiếm </span>
                                    </button>
                                </td>
                                <td>
                                    <input class="btn1" type="submit" name="btnThemMoi" value="Thêm mới" >
                                    <?php 
                                        if($_POST){
                                            if(isset($_POST['btnThemMoi']) and $_SERVER['REQUEST_METHOD'] == "POST")
                                            {
                                                echo'<script>window.location.replace("http://localhost/STSV/ThemQLGV.php");</script>';
                                                
                                            }
                                        }
                                    ?>
                                </td>  
                                <td align="right">
                                    <input class="btn1" type="submit" name="btnIn" value="In danh sách">
                                   </td>
                                    <?php 
                                        if($_POST){
                                            if(isset($_POST['btnIn']) and $_SERVER['REQUEST_METHOD'] == "POST")
                                            {
                                                echo'<script>window.location.replace("http://localhost/STSV/InDS.php");</script>';
                                                
                                            }
                                        }
                                    ?>
                            </tr>
                        </table>
                        <div id="tbsv3">
                            <table id="bangthongtin">
                                <tr class="hang1">
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Mã giảng viên</th>
                                    <th style="text-align: center;">Họ tên</th>
                                    <th style="text-align: center;">Ngày sinh</th>
                                    <th style="text-align: center;">Giới tính</th>
                                    <th style="text-align: center;">Dân tộc</th>
                                    <th style="text-align: center;">Số CMND</th>
                                    <th style="text-align: center;">Tôn Giáo</th>
                                    <th style="text-align: center;">Quê quán</th>
                                    <th style="text-align: center;">SĐT</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Chức vụ</th>
                                    <th style="text-align: center;">Cố vấn học tập</th>
                                    <th style="text-align: center;">Mật khẩu</th>
                                </tr>
                                <?php 
                                    if($_POST){
                                        if(isset($_POST['btnTimKiem']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                            TimKiem($txtTimkiem);
                                        }
                                        if(isset($_POST['btnThem']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                             Them();
                                     }
                                    }
                                ?>
                                
                            </table>
                        </div>
                        <tr>
                                   
                        </tr> 
                    </div>
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