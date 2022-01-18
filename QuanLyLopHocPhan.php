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
    <link rel="stylesheet" href="StyleChung/styleQuanLyLopHocPhan.css">
    <script src="chonhocphan.js"></script>
</head>
<?php 
    $tenhocphan = array_key_exists('cboMaHocPhan', $_POST) ? $_POST['cboMaHocPhan']: null;
    $nhapmalophocphan = array_key_exists('txtMaLopHocPhan', $_POST) ? $_POST['txtMaLopHocPhan']: null;
    $tengiangvien = array_key_exists('cboMaGiangVien', $_POST) ? $_POST['cboMaGiangVien']: null;
    $chonnamhoc = array_key_exists('cboNamHoc', $_POST) ? $_POST['cboNamHoc']: null;
    $hocky = array_key_exists('cboHocKy', $_POST) ? $_POST['cboHocKy']: null;
    $tenlophocphan = array_key_exists('cboLopHP', $_POST) ? $_POST['cboLopHP']: null;
    $nhapmasv = array_key_exists('txtMaSV', $_POST) ? $_POST['txtMaSV']: null;
    $chonhocphan = array_key_exists('cboChonHP', $_POST) ? $_POST['cboChonHP']: null;
    $chonlophoc = array_key_exists('cboChonLHP', $_POST) ? $_POST['cboChonLHP']: null;

    function taoLopHocPhan($tenhocphan, $nhapmalophocphan, $tengiangvien, $chonnamhoc, $hocky)
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $tim = "select MaLopHocPhan from lop_hoc_phan where MaHocPhan='".$tenhocphan."' and MaLopHocPhan = '".$nhapmalophocphan."'";
        $ketqua = mysqli_query($kn, $tim);
        if($row = mysqli_fetch_array($ketqua))
        {
            echo '<script>alert("Mã lớp học phần tồn tại");</script> ';
        }
        else
        {
            if($tenhocphan == "" and $nhapmalophocphan == ""  and $tengiangvien == "" and $chonnamhoc=="" and $hocky=="" )
            {
                echo '<script>alert("Không được bỏ trống");</script> ';
            }
            else
            {
                $sql = "insert into lop_hoc_phan (MaLopHocPhan, MaGiangVien, MaHocPhan, NamHoc, HocKy)
                    values ('$nhapmalophocphan','$tengiangvien', '$tenhocphan', '$chonnamhoc', '$hocky')";
                $kq = mysqli_query($kn, $sql);
                echo '<script>alert("Tạo lớp học phần thành công");</script> ';
                $sql1 = "select * from lop_hoc_phan 
                        inner join giang_vien on giang_vien.MaGiangVien = lop_hoc_phan.MaGiangVien 
                        inner join hoc_phan on hoc_phan.MaHocPhan = lop_hoc_phan.MaHocPhan";
                $kq1 = mysqli_query($kn, $sql1);
                echo"
                    <tr>
                        <th style='text-align: center;'>STT</th>
                        <th style='text-align: center;'>Lớp học phần</th>
                        <th style='text-align: center;'>Tên học phần</th>
                        <th style='text-align: center;'>Mã học phần</th>
                        <th style='text-align: center;'>Mã giảng viên</th>
                        <th style='text-align: center;'>Tên giảng viên</th>
                        <th style='text-align: center;'>Năm học</th>
                        <th style='text-align: center;'>Học kỳ</th>
                        <th></th>
                    </tr>
                ";
                $stt = 0;
                while($row2 = mysqli_fetch_array($kq1)){
                    $stt = $stt+1;
                    $maLHP = $row2['MaLopHocPhan'];
                    echo "<tr class='hang1'>
                        <td class='cot' style='text-align: center;'>".$stt."</td>
                        <td class='cot' style='text-align: center;'>".$row2['MaLopHocPhan']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['TenMonHoc']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['MaHocPhan']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['MaGiangVien']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['HoTen']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['NamHoc']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['HocKy']."</td>
                        <td class='cot'><a href = 'xoaLopHocPhan.php?maLHP=$maLHP'>Xóa</a></td>
                    </tr>";
                } 
            }
        }
    }

    function xemDSLopHocPhan()
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $sql1 = "select * from lop_hoc_phan 
                inner join giang_vien on giang_vien.MaGiangVien = lop_hoc_phan.MaGiangVien 
                inner join hoc_phan on hoc_phan.MaHocPhan = lop_hoc_phan.MaHocPhan
                ORDER BY MaLopHocPhan DESC";
        $kq1 = mysqli_query($kn, $sql1);
        echo"
            <tr>
                <th style='text-align: center;'>STT</th>
                <th style='text-align: center;'>Lớp học phần</th>
                <th style='text-align: center;'>Tên học phần</th>
                <th style='text-align: center;'>Mã học phần</th>
                <th style='text-align: center;'>Mã giảng viên</th>
                <th style='text-align: center;'>Tên giảng viên</th>
                <th style='text-align: center;'>Năm học</th>
                <th style='text-align: center;'>Học kỳ</th>
                <th></th>
            </tr>
        ";
        $stt = 0;
        while($row2 = mysqli_fetch_array($kq1)){
            $stt = $stt+1;
            $maLHP = $row2['MaLopHocPhan'];
            echo "<tr class='hang1'>
                <td class='cot' style='text-align: center;'>".$stt."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaLopHocPhan']."</td>
                <td class='cot' style='text-align: center;'>".$row2['TenMonHoc']."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaHocPhan']."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaGiangVien']."</td>
                <td class='cot' style='text-align: center;'>".$row2['HoTen']."</td>
                <td class='cot' style='text-align: center;'>".$row2['NamHoc']."</td>
                <td class='cot' style='text-align: center;'>".$row2['HocKy']."</td>
                <td class='cot'><a href = 'xoaLopHocPhan.php?maLHP=$maLHP'>Xóa</a></td>
            </tr>";
        } 
    }

    function taoDSLopHocPhan($tenlophocphan, $nhapmasv)
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $tim = "select MaSinhVien from dang_ky_lop_hp where MaLopHocPhan='".$tenlophocphan."' and MaSinhVien='".$nhapmasv."'";
        $ketqua = mysqli_query($kn, $tim);
        if($row = mysqli_fetch_array($ketqua))
        {
            echo '<script>alert("Tên sinh viên đã tồn tại");</script> ';
        }
        else
        {
            if($tenlophocphan == "" and $nhapmasv == "" )
            {
                echo '<script>alert("Không được bỏ trống");</script> ';
            }
            else
            {
                $sql = "insert into dang_ky_lop_hp (ID, MaLopHocPhan, MaSinhVien)
                    values ('','$tenlophocphan', '$nhapmasv')";
                $kq = mysqli_query($kn, $sql);
                echo '<script>alert("Tạo lớp học phần thành công");</script> ';
                $sql1 = "select * from dang_ky_lop_hp 
                        inner join lop_hoc_phan on lop_hoc_phan.MaLopHocPhan = dang_ky_lop_hp.MaLopHocPhan
                        inner join hoc_phan on lop_hoc_phan.MaHocPhan = hoc_phan.MaHocPhan
                        inner join sinh_vien on sinh_vien.MaSinhVien  = dang_ky_lop_hp.MaSinhVien";
                $kq1 = mysqli_query($kn, $sql1);
                echo"
                    <tr>
                        <th style='text-align: center;'>STT</th>
                        <th style='text-align: center;'>Mã lớp học phần</th>
                        <th style='text-align: center;'>Tên học phần</th>
                        <th style='text-align: center;'>Mã sinh viên</th>
                        <th style='text-align: center;'>Tên sinh viên</th>
                        <th style='text-align: center;'>Năm học</th>
                        <th style='text-align: center;'>Học kỳ</th>
                    </tr>
                ";
                $stt = 0;
                while($row2 = mysqli_fetch_array($kq1)){
                    $stt = $stt+1;
                    echo "<tr class='hang1'>
                        <td class='cot' style='text-align: center;'>".$stt."</td>
                        <td class='cot' style='text-align: center;'>".$row2['MaLopHocPhan']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['TenMonHoc']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['MaSinhVien']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['HoTen']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['NamHoc']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['HocKy']."</td>
                    </tr>";
                } 
            } 
        }
    }

    function xemDSDangKylopHocPhan()
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $sql1 = "select * from dang_ky_lop_hp 
                inner join lop_hoc_phan on lop_hoc_phan.MaLopHocPhan = dang_ky_lop_hp.MaLopHocPhan
                inner join hoc_phan on lop_hoc_phan.MaHocPhan = hoc_phan.MaHocPhan
                inner join sinh_vien on sinh_vien.MaSinhVien  = dang_ky_lop_hp.MaSinhVien
                ORDER BY dang_ky_lop_hp.MaLopHocPhan DESC";
        $kq1 = mysqli_query($kn, $sql1);
        echo"
            <tr>
                <th style='text-align: center;'>STT</th>
                <th style='text-align: center;'>Mã lớp học phần</th>
                <th style='text-align: center;'>Tên học phần</th>
                <th style='text-align: center;'>Mã học phần</th>
                <th style='text-align: center;'>Mã sinh viên</th>
                <th style='text-align: center;'>Tên sinh viên</th>
                <th style='text-align: center;'>Năm học</th>
                <th style='text-align: center;'>Học kỳ</th>
            </tr>
        ";
        $stt = 0;
        while($row2 = mysqli_fetch_array($kq1)){
            $stt = $stt+1;
            echo "<tr class='hang1'>
                <td class='cot' style='text-align: center;'>".$stt."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaLopHocPhan']."</td>
                <td class='cot' style='text-align: center;'>".$row2['TenMonHoc']."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaHocPhan']."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaSinhVien']."</td>
                <td class='cot' style='text-align: center;'>".$row2['HoTen']."</td>
                <td class='cot' style='text-align: center;'>".$row2['NamHoc']."</td>
                <td class='cot' style='text-align: center;'>".$row2['HocKy']."</td>
            </tr>";
        } 
    }

    function timDSSinhVien()
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $bien = array_key_exists('txtTimLopHocPhan',$_POST)? $_POST['txtTimLopHocPhan']:null;
        $sql1 = "select * from dang_ky_lop_hp 
                inner join lop_hoc_phan on lop_hoc_phan.MaLopHocPhan = dang_ky_lop_hp.MaLopHocPhan
                inner join hoc_phan on lop_hoc_phan.MaHocPhan = hoc_phan.MaHocPhan
                inner join sinh_vien on sinh_vien.MaSinhVien  = dang_ky_lop_hp.MaSinhVien
                where dang_ky_lop_hp.MaLopHocPhan = '".$bien."' or hoc_phan.MaHocPhan = '".$bien."'";
        $kq1 = mysqli_query($kn, $sql1);
        echo"
            <tr>
                <th style='text-align: center;'>STT</th>
                <th style='text-align: center;'>Mã lớp học phần</th>
                <th style='text-align: center;'>Tên học phần</th>
                <th style='text-align: center;'>Mã học phần</th>
                <th style='text-align: center;'>Mã sinh viên</th>
                <th style='text-align: center;'>Tên sinh viên</th>
                <th style='text-align: center;'>Năm học</th>
                <th style='text-align: center;'>Học kỳ</th>
            </tr>
        ";
        $stt = 0;
        while($row2 = mysqli_fetch_array($kq1)){
            $stt = $stt+1;
            echo "<tr class='hang1'>
                <td class='cot' style='text-align: center;'>".$stt."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaLopHocPhan']."</td>
                <td class='cot' style='text-align: center;'>".$row2['TenMonHoc']."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaHocPhan']."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaSinhVien']."</td>
                <td class='cot' style='text-align: center;'>".$row2['HoTen']."</td>
                <td class='cot' style='text-align: center;'>".$row2['NamHoc']."</td>
                <td class='cot' style='text-align: center;'>".$row2['HocKy']."</td>
            </tr>";
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
                       <div style="display:flex; justify-content: space-around;;">
                       <div style="display: block; justify-content: center; margin-bottom: 10px;margin-left:5px;width:30%">
                            <div>
                                <table border="1">
                                    <tr style="text-align: center;"><td colspan=2><h4>Lớp học phần</h4></td></tr>
                                    <tr>
                                        <td class="HP-td">
                                            <select class="drop" name="cboMaHocPhan">
                                                <option value=""  selected="selected">-Tên học phần-</option> 
                                                <?php 
                                                    $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                    $sql = "select * from hoc_phan";
                                                    $kq = mysqli_query($kn,$sql);
                                                    while($row = mysqli_fetch_array($kq)): 
                                                ?>
                                                <option value="<?php echo $row['MaHocPhan'];?>"><span> <?php echo $row['TenMonHoc'];?></span></option>
                                                <?php endwhile;?>                                       
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="HP-td"><input class="drop" type="text" name="txtMaLopHocPhan" placeholder="Nhập mã lớp học phần"></td>
                                    </tr>
                                    <tr>
                                        <td  class="HP-td">
                                            <select class="drop" name="cboMaGiangVien">
                                                <option value=""  selected="selected">-Tên giảng viên-</option>  
                                                <?php 
                                                    $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                    $sql1 = "select * from giang_vien";
                                                    $kq1 = mysqli_query($kn,$sql1);
                                                    while($row1 = mysqli_fetch_array($kq1)): 
                                                ?>
                                                <option value="<?php echo $row1['MaGiangVien'];?>"><span> <?php echo $row1['HoTen'];?></span></option>
                                                <?php endwhile;?>                                      
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  class="HP-td">
                                            <select class="drop" name="cboNamHoc">
                                                <option value=""  selected="selected">-Chọn năm học-</option> 
                                                <option value="2024-2025">2024-2025</option>  
                                                <option value="2023-2024">2023-2024</option>   
                                                <option value="2022-2023">2022-2023</option>  
                                                <option value="2021-2022">2021-2022</option>  
                                                <option value="2020-2021">2020-2021</option>         
                                                <option value="2019-2020">2019-2020</option>  
                                                <option value="2018-2019">2018-2019</option>             
                                                <option value="2017-2018">2017-2018</option>                                       
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="HP-td">
                                            <select class="drop" name="cboHocKy">
                                                <option value=""  selected="selected">-Học kỳ-</option>   
                                                <option value="1">Học kỳ 1</option>  
                                                <option value="2">Học kỳ 2</option>                                      
                                            </select>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td style="text-align: center;">
                                            <button class="btn1" name="btnThemLopHocPhan" value="btnThemLopHocPhan">
                                                <span> Tạo lớp học phần </span>
                                            </button>
                                            <button class="btn1" name="btnXemDSLopHocPhan" value="btnXemDSLopHocPhan">
                                                <span> Xem danh sách </span>
                                            </button>
                                        </td>
                                    </tr>
                                </table>    
                            </div>
                            <div style="margin-top:20px;">
                                <table border="1" style="text-align:center; ">
                                    <tr style="text-align: center;"><td colspan=2><h4>Đăng kí lớp học phần</h4></td></tr>
                                    <tr>
                                        <td>
                                            <select class="drop" name="cboLopHP">
                                                <option value=""  selected="selected">-Tên lớp học phần-</option>
                                                <?php 
                                                    $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                    $sql2 = "select * from lop_hoc_phan";
                                                    $kq2 = mysqli_query($kn,$sql2);
                                                    while($row2 = mysqli_fetch_array($kq2)): 
                                                ?>
                                                <option value="<?php echo $row2['MaLopHocPhan'];?>"><span> <?php echo $row2['MaLopHocPhan'];?></span></option>
                                                <?php endwhile;?>                                         
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="HP-td">
                                            <input class="drop" type="text" name="txtMaSV" placeholder="Nhập mã sinh viên">
                                        </td>
                                    </tr>
                                    <tr >
                                        
                                        <td style="text-align:center; ">
                                            <button class="btn1" name="btnThemDSDKLopHocPhan" value="btnThemDSDKLopHocPhan">
                                                <span>Tạo danh sách</span>
                                            </button>
                                            <button class="btn1" name="btnXemDSDKLopHocPhan" value="btnXemDSDKLopHocPhan">
                                                <span>Xem danh sách</span>
                                            </button>
                                        </td>
                                       
                                       
                                    </tr>
                                </table>    
                            </div>                          
                        </div>
                        <div style="width:70%; margin-left:15px">
                                <table style="width: 100%"> 
                                    <tr>
                                        <td>
                                            <input class="textdt" style="width: 100%; text-align: left" type="text" name="txtTimLopHocPhan" placeholder="Tìm kiếm ....">
                                        </td>
                                        <td>
                                            <button class="btn1" name="btnTim" value="btnTim" style="margin: auto">
                                                <span> Lọc dữ liệu </span>
                                            </button>
                                        </td>
                                    </tr>          
                                </table>
                                    <table class="bangthongtin">
                                        <?php 
                                            if($_POST){
                                                if(isset($_POST['btnThemLopHocPhan']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                    taoLopHocPhan($tenhocphan, $nhapmalophocphan, $tengiangvien, $chonnamhoc, $hocky);
                                                }
                                                if(isset($_POST['btnThemDSDKLopHocPhan']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                    taoDSLopHocPhan($tenlophocphan, $nhapmasv);
                                                }
                                                if(isset($_POST['btnTim'])and $_SERVER['REQUEST_METHOD'] == "POST")
                                                {
                                                    timDSSinhVien();
                                                }
                                                if(isset($_POST['btnXemDSLopHocPhan']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                    xemDSLopHocPhan();
                                                }
                                                if(isset($_POST['btnXemDSDKLopHocPhan']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                    xemDSDangKylopHocPhan();
                                                }
                                            }
                                        ?>
                                    </table>
                            </div>
                       </div>
                    </div>
                </div>         
            </div>
            <?php
                load_footer();
                ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</form> 
</body>
</html>