<!DOCTYPE html>
<?php
    session_start();
    require 'site.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý điểm rèn luyện</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/styleQuanLyDiemRL.css">
    <script src="chonkhoa.js"></script>
</head>
<?php 
    $cboNamHoc = array_key_exists('cboNamHoc', $_POST) ? $_POST['cboNamHoc'] : null;
    $cboHocKy = array_key_exists('cboHocKy', $_POST) ? $_POST['cboHocKy'] : null;
    $cbolop = array_key_exists('cboLop', $_POST) ? $_POST['cboLop'] : null;
    $cboKhoa = array_key_exists('cboKhoa', $_POST) ? $_POST['cboKhoa'] : null;

    

    function XepLoai($tongdiem)
    {
        $xeploai = "";
        if($tongdiem < 35)
        {
            $xeploai = "Kém";
        }
        if($tongdiem >= 35 and $tongdiem < 50)
        {
            $xeploai = "Yếu";
        }
        if($tongdiem >= 50 and $tongdiem < 65)
        {
            $xeploai = "Trung bình";
        }
        if($tongdiem >= 65 and $tongdiem < 80)
        {
            $xeploai = "Khá";
        }
        if($tongdiem >= 80 and $tongdiem < 90)
        {
            $xeploai = "Tốt";
        }
        if($tongdiem >= 90)
        {
            $xeploai = "Xuất sắc";
        }
        return $xeploai;
    }

    function TimKiem($cboHocKy, $cboNamHoc, $cboKhoa, $cbolop)
    {
        if($cboHocKy == "" or $cboNamHoc == "" or $cboKhoa == "" or $cbolop == "")
        {
            echo '<script>alert("Bạn cần chọn thông tin tìm kiếm");</script> ';
        }
        else
        {
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die ("chưa kết nối");
            $sql = "select * from diem_ren_luyen 
                    INNER JOIN sinh_vien ON sinh_vien.MaSinhVien = diem_ren_luyen.MaSinhVien 
                    INNER JOIN lop ON sinh_vien.MaLop = lop.MaLop 
                    INNER JOIN khoa_hoc ON khoa_hoc.MaKhoaHoc = lop.MaKhoaHoc 
                    where khoa_hoc.MaKhoaHoc ='".$cboKhoa."' and lop.MaLop = '".$cbolop."' 
                        and diem_ren_luyen.NamHoc='".$cboNamHoc."' and diem_ren_luyen.HocKy = '".$cboHocKy."'";
            $kq = mysqli_query($kn, $sql);
            $stt = 0;
            while($row = mysqli_fetch_array($kq))
            {
                $_SESSION['MaSinhVien'] = $row['MaSinhVien'];
                $maSV = $_SESSION['MaSinhVien'];
                $NamHoc = $row['NamHoc'];
                $HocKy = $row['HocKy'];
                $tongdiem = $row['TongDiem'];

                $xeploai = "";
                if($tongdiem < 35)
                {
                    $xeploai = "Kém";
                }
                if($tongdiem >= 35 and $tongdiem < 50)
                {
                    $xeploai = "Yếu";
                }
                if($tongdiem >= 50 and $tongdiem < 65)
                {
                    $xeploai = "Trung bình";
                }
                if($tongdiem >= 65 and $tongdiem < 80)
                {
                    $xeploai = "Khá";
                }
                if($tongdiem >= 80 and $tongdiem < 90)
                {
                    $xeploai = "Tốt";
                }
                if($tongdiem >= 90)
                {
                    $xeploai = "Xuất sắc";
                }
                

                $stt = $stt + 1;
                echo "<tr class='hang1'>
                    <td class='cot' style='text-align: center;'>".$stt."</td>
                    <td class='cot' style='text-align: center;'>".$row['NamHoc']."</td>
                    <td class='cot' style='text-align: center;'>".$row['HocKy']."</td>
                    <td class='cot' style='text-align: center;'>".$row['MaSinhVien']."</td>
                    <td class='cot' >".$row['HoTen']."</td>
                    <td class='cot' >".$row['TenLop']."</td>
                    <td class='cot' style='text-align: center;'>".$row['TongDiem']."</td>
                    <td class='cot' >".$xeploai."</td>
                    <td class='cot'><a href = 'ChiTietDiemRL.php?masv=$maSV&NamHoc=$NamHoc&HocKy=$HocKy'>Chi tiết</a></td>
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
                <div class="containner-ad-text">
                        <h4>SỔ TAY SINH VIÊN ONLINE</h4>
                        <!-- <span>----------</span>
                        <span><i class="fas fa-book-open"></i></span>
                        <span>----------</span>-->
                        <hr> 
                </div>
                <div class="container-ad-items">
                    <div class="HDsearch">
                        <table style="font-size:20px;">
                            <tr>
                                <td style="text-align: left">
                                    <select name="cboNamHoc" class="drop">
                                        <option value="" selected="selected">-Chọn năm học-</option>
                                        <option value="2018-2019">2018-2019</option>
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024">2023-2024</option>
                                    </select>
                                </td>
                                <td>   
                                    <select name="cboHocKy" class="drop" >
                                        <option value="" selected="selected">-Chọn học kỳ-</option>
                                        <option value="1">Học kỳ 1</option>
                                        <option value="2">Học kỳ 2</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="drop cboKhoa" name="cboKhoa">
                                        <option value="" selected="selected">-Chọn khóa học-</option>
                                        <?php
                                            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                            $sql1 = "select * from khoa_hoc";
                                            $kq1 = mysqli_query($kn, $sql1);
                                            while($row1 = mysqli_fetch_array($kq1)):
                                        ?>
                                        <option value="<?php echo htmlspecialchars($row1['MaKhoaHoc']) ?>"><?php echo htmlspecialchars($row1['MaKhoaHoc']) ?></option>
                                        <?php endwhile; ?>
                                    </select>               
                                </td>
                                <td>
                                    <select class="drop cboLop" name="cboLop" style="width: 258px;">
                                        <option value="" selected="selected">-Chọn lớp học-</option>
                                        <?php
                                            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                            $sql2 = "select * from lop";
                                            $kq2 = mysqli_query($kn, $sql2);
                                            while($row2 = mysqli_fetch_array($kq2)):
                                        ?>
                                        <option value="<?php echo htmlspecialchars($row2['MaLop']) ?>"><?php echo htmlspecialchars($row2['MaLop']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </td>
                                <td>
                                    <input class="btn" type="submit" name="btnTimKiem" value="Lọc dữ liệu">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="tbsv3">
                        <table class="table table-striped" style="font-size:10px;" id="bangthongtin">
                            <tr class="hang1">
                                <th style="text-align: center;">STT</th>
                                <th style="text-align: center;">Năm học</th>
                                <th style="text-align: center;">Học kỳ</th>
                                <th style="text-align: center;">Mã sinh viên</th>
                                <th style="text-align: center;">Họ tên sinh viên</th>
                                <th style="text-align: center;">Lớp</th>
                                <th style="text-align: center;">Tổng điểm</th>
                                <th style="text-align: center;">Xếp loại</th>
                                <th style="text-align: center;">Chi tiết</th>
                            </tr>
                            <?php
                                if($_POST){
                                    if(isset($_POST['btnTimKiem']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                        TimKiem($cboHocKy, $cboNamHoc, $cboKhoa, $cbolop);
                                    }
                                }                
                            ?>
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