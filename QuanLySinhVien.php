<!DOCTYPE html>
<?php
    require 'site.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/styleQLSinhVien.css">
    <script src="chonkhoa.js"></script>
</head>
<?php 
    $MaSinhVien = array_key_exists('txtMaSinhVien', $_POST) ? $_POST['txtMaSinhVien']: null;
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
    $MaLop = array_key_exists('cbolop', $_POST) ? $_POST['cbolop']: null;
    $TinhTrangHoc = array_key_exists('txtTinhTrangHoc', $_POST) ? $_POST['txtTinhTrangHoc']: null;
    $MatKhau = array_key_exists('txtPass', $_POST) ? $_POST['txtPass']: null;
    $KhoaHoc = array_key_exists('cboKhoa', $_POST) ? $_POST['cboKhoa']: null;
    $txtTimKiem = array_key_exists('txtTimKiem', $_POST) ? $_POST['txtTimKiem']: null;

    function TimKiem($txtTimKiem){
        if($txtTimKiem == "")
        {
            echo '<script>alert("Bạn cần nhập thông tin tìm kiếm");</script> ';
        }
        else
        {
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
            $sql3 = "select * from sinh_vien INNER JOIN lop ON sinh_vien.MaLop = lop.MaLop INNER JOIN khoa_hoc ON khoa_hoc.MaKhoaHoc = lop.MaKhoaHoc where sinh_vien.MaSinhVien='".$txtTimKiem."' or sinh_vien.HoTen like '%".$txtTimKiem."%'";
            mysqli_query( $kn ," SET NAMES 'UTF-8' ");// mã hóa utf8
            $kq3 = mysqli_query($kn, $sql3);//Thực hiện câu lệnh truy vấn 
            $stt = 0;
            while($row3 = mysqli_fetch_array($kq3)){
                $stt = $stt+1;
                $_SESSION['MaSinhVien'] = $row3['MaSinhVien'];
                $maSV = $_SESSION['MaSinhVien'];
                echo"<tr class='hang1'>
                    <td class='cot' style='text-align: center;'>".$stt."</td>
                    <td class='cot'>".$row3['MaSinhVien']."</td>
                    <td class='cot' >".$row3['HoTen']."</td>
                    <td class='cot' >".$row3['NgaySinh']."</td>
                    <td class='cot'>".$row3['GioiTinh']."</td>
                    <td class='cot'>".$row3['DanToc']."</td>
                    <td class='cot'>".$row3['SoCMND']."</td>
                    <td class='cot'>".$row3['TonGiao']."</td>
                    <td class='cot'>".$row3['QueQuan']."</td>
                    <td class='cot'>".$row3['SDT']."</td>
                    <td class='cot'>".$row3['Email']."</td>
                    <td class='cot'>".$row3['ChucVu']."</td>
                    <td class='cot'>".$row3['MaKhoaHoc']."</td>
                    <td class='cot'>".$row3['TenLop']."</td>
                    <td class='cot'>".$row3['TinhTrangHoc']."</td>
                    <td class='cot'>".$row3['MatKhau']."</td>
                    <td class='cot'><a href = 'suaSV.php?ma=$maSV'>Sửa</a> </td> 
                    <td class='cot'><a href = 'XoaSV.php?ma=$maSV'>Xóa</a> </td>
                    
                </tr>";
            }
        }
    }
?>

<body>
    <form action="QuanLySinhVien.php" method="POST">
        <div class="home">
            <div class="home-items home-ad">
                <?php           
             load_menuAD();
        ?>
                <div class="container-ad">
                    <div class="container-ad-items">
                        <h1 style="text-align: center; margin-bottom: 30px;">QUẢN LÝ SINH VIÊN</h1>
                        <div style="display: flex; justify-content: space-around;">
                            <div>
                                <table align="Center">
                                    <tr>
                                        <td><input class="text1" type="text" name="txtTimKiem"
                                                placeholder="Nhập mã sinh viên cần tìm"></td>
                                        <td>
                                            <button class="btn1" style="vertical-align:middle" name="btnTimKiem"
                                                value="btnTimKiem">
                                                <span> Tìm kiếm </span>
                                            </button>
                                        </td>
                                        <td>
                                            <input class="btn1" type="submit" name="btnThemMoi" value="Thêm mới">

                                            <?php 
                                    if($_POST){
                                        if(isset($_POST['btnThemMoi']) and $_SERVER['REQUEST_METHOD'] == "POST")
                                        {
                                           echo'<script>window.location.replace("http://localhost/STSV/ThemSV.php");</script>';
                                            
                                        }
                                    }
                                ?>
                                        </td>
                                        <td>
                                            <input class="btn1" type="submit" name="btnInDS" value="In sinh viên">

                                            <?php 
                                    if($_POST){
                                        if(isset($_POST['btnInDS']) and $_SERVER['REQUEST_METHOD'] == "POST")
                                        {
                                           echo'<script>window.location.replace("http://localhost/STSV/InSV.php");</script>';
                                            
                                        }
                                    }
                                ?>
                                        </td>
                                    </tr>
                                </table>
                                <div id="tbsv3">
                                    <table id="bangthongtin">
                                        <tr class="hang1">
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã sinh viên</th>
                                            <th style="text-align: center;" class="cot3">Họ tên</th>
                                            <th style="text-align: center;">Ngày sinh</th>
                                            <th style="text-align: center;">Giới tính</th>
                                            <th style="text-align: center;">Dân tộc</th>
                                            <th style="text-align: center;">Số CMND</th>
                                            <th style="text-align: center;">Tôn Giáo</th>
                                            <th style="text-align: center;">Quê quán</th>
                                            <th style="text-align: center;">SĐT</th>
                                            <th style="text-align: center;">Email</th>
                                            <th style="text-align: center;">Chức vụ</th>
                                            <th style="text-align: center;">Khóa học</th>
                                            <th style="text-align: center;">Lớp</th>
                                            <th style="text-align: center;">Tình Trạng học</th>
                                            <th style="text-align: center;">Mật khẩu</th>
                                            <th style="text-align: center;">Tác vụ</th>
                                        </tr>

                                        <?php 
                                     if($_POST){
                                        if(isset($_POST['btnTimKiem']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                            TimKiem($txtTimKiem);
                                        }
                                    }
                                ?>
                                    </table>
                                </div>
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