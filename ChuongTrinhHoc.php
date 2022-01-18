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
    <title>Document</title>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/styleQuanLyCTDT.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<?php
    $txtMaHocPhan = array_key_exists('txtMaHocPhan', $_POST) ? $_POST['txtMaHocPhan']: null;
    $txtTenHocPhan = array_key_exists('txtTenHocPhan', $_POST) ? $_POST['txtTenHocPhan']: null;
    $txtSoTinChi = array_key_exists('txtSoTinChi', $_POST) ? $_POST['txtSoTinChi']: null;
    $cboKhoa = array_key_exists('cboKhoa', $_POST) ? $_POST['cboKhoa']: null;
    $cboHocPhan = array_key_exists('cboHocPhan', $_POST) ? $_POST['cboHocPhan']: null;
    $cboNamHoc = array_key_exists('cboNamHoc', $_POST) ? $_POST['cboNamHoc']: null;
    $cboHK = array_key_exists('cboHK', $_POST) ? $_POST['cboHK']: null;
    $cboTimKhoaHoc = array_key_exists('cboTimKhoaHoc', $_POST) ? $_POST['cboTimKhoaHoc']: null;

    function themHocPhan($txtMaHocPhan, $txtTenHocPhan, $txtSoTinChi)
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $tim = "select * from hoc_phan where MaHocPhan = '".$txtMaHocPhan."'";
        $ketqua = mysqli_query($kn, $tim);
        if($row = mysqli_fetch_array($ketqua))
        {
            echo '<script>alert("Học phần đã tồn tại");</script> ';
        }
        else
        {
            if($txtMaHocPhan == "" and $txtTenHocPhan == ""  and $txtSoTinChi == "")
            {
                echo '<script>alert("Không được bỏ trống");</script> ';
            }
            else
            {
                $sql = "insert into hoc_phan (MaHocPhan, TenMonHoc, SoTinChi)
                    values ('$txtMaHocPhan','$txtTenHocPhan', '$txtSoTinChi')";
                $kq = mysqli_query($kn, $sql);
                $sql1 = "select * from hoc_phan";
                $kq1 = mysqli_query($kn, $sql1);
                echo"<tr>
                    <th style='text-align: center;'>STT</th>
                    <th style='text-align: center;'>Mã học phần</th>
                    <th style='text-align: center;'>Tên học phần</th>
                    <th style='text-align: center;'>Số tín chỉ</th>
                    <th></th>
                </tr>";
                $stt = 0;
                while($row2 = mysqli_fetch_array($kq1)){
                    $stt = $stt+1;
                    $maHP = $row2['MaHocPhan'];
                    echo "<tr class='hang1'>
                        <td class='cot' style='text-align: center;'>".$stt."</td>
                        <td class='cot' style='text-align: center;'>".$row2['MaHocPhan']."</td>
                        <td class='cot' >".$row2['TenMonHoc']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['SoTinChi']."</td>
                        <td class='cot'><a href='xoaHocPhan.php?maHP=$maHP'>Xóa</a></td>
                    </tr>";
                } 
                echo '<script>alert("Thêm học phần thành công");</script> ';
            }
        }
    }

    function themChuongTrinh($cboKhoa, $cboHocPhan, $cboNamHoc, $cboHK)
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $tim = "select * from chuong_trinh where MaKhoaHoc = '".$cboKhoa."' and MaHocPhan = '".$cboHocPhan."' and NamHoc = '".$cboNamHoc."' and HocKy = '".$cboHK."'";
        $ketqua = mysqli_query($kn, $tim);
        if($row = mysqli_fetch_array($ketqua))
        {
            echo '<script>alert("Chương trình học đã tồn tại");</script> ';
        }
        else
        {
            if($cboKhoa == "" or $cboHocPhan == "" or $cboNamHoc == "" or $cboHK == "")
            {
                echo '<script>alert("Không được bỏ trống");</script> ';
            }
            else
            {
                $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                $sql = "insert into chuong_trinh (ID, MaKhoaHoc, MaHocPhan, NamHoc, HocKy)
                        values ('', '$cboKhoa','$cboHocPhan', '$cboNamHoc', '$cboHK')";
                $kq = mysqli_query($kn, $sql);
                $sql1 = "select * from chuong_trinh INNER JOIN hoc_phan on hoc_phan.MaHocPhan = chuong_trinh.MaHocPhan";
                $kq1 = mysqli_query($kn, $sql1);
                echo"<tr>
                    <th style='text-align: center;'>STT</th>
                    <th style='text-align: center;'>Khóa học</th>
                    <th style='text-align: center;'>Mã học phần</th>
                    <th style='text-align: center;'>Tên học phần</th>
                    <th style='text-align: center;'>Năm học</th>
                    <th style='text-align: center;'>Học kỳ</th>
                </tr>";
                $stt = 0;
                while($row2 = mysqli_fetch_array($kq1)){
                    $stt = $stt+1;
                    echo "<tr class='hang1'>
                        <td class='cot' style='text-align: center;'>".$stt."</td>
                        <td class='cot' style='text-align: center;'>".$row2['MaKhoaHoc']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['MaHocPhan']."</td>
                        <td class='cot' >".$row2['TenMonHoc']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['NamHoc']."</td>
                        <td class='cot' style='text-align: center;'>".$row2['HocKy']."</td>
                    </tr>";
                } 
                echo '<script>alert("Thêm học chương trình học thành công");</script> ';
            }
        }
    }

    function tim($cboTimKhoaHoc)
    {
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $sql = "select * from chuong_trinh 
                INNER JOIN hoc_phan on hoc_phan.MaHocPhan = chuong_trinh.MaHocPhan 
                where chuong_trinh.MaKhoaHoc = '".$cboTimKhoaHoc."'";
        $kq = mysqli_query($kn, $sql);
        echo"<tr>
            <th style='text-align: center;'>STT</th>
            <th style='text-align: center;'>Mã học phần</th>
            <th style='text-align: center;'>Tên học phần</th>
            <th style='text-align: center;'>Năm học</th>
            <th style='text-align: center;'>Học kỳ</th>
        </tr>";
        $stt = 0;
        while($row2 = mysqli_fetch_array($kq)){
            $stt = $stt+1;
            echo "<tr class='hang1'>
                <td class='cot' style='text-align: center;'>".$stt."</td>
                <td class='cot' style='text-align: center;'>".$row2['MaHocPhan']."</td>
                <td class='cot' >".$row2['TenMonHoc']."</td>
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
                       <div style="display: block; justify-content: center; margin-bottom: 10px;width:35%">
                            <div>
                                <table border="1">
                                    <tr style="text-align: center;"><td><h2>Học phần</h2></td></tr>
                                    <tr style="text-align: center;">
                                        <td><input class="text" type="text" name="txtMaHocPhan" placeholder="Mã học phần"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="text" type="text" name="txtTenHocPhan" placeholder="Tên học phần"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="text" type="text" name="txtSoTinChi" placeholder="Số tín chỉ"></td>
                                    </tr>
                                    <tr >
                                        <td style="text-align: center;">
                                            <div>
                                                <button class="btn1" name="btnThemHocPhan" value="btnThemHocPhan">
                                                    <span> Thêm học phần </span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>    
                            </div>
                            <div style="margin-top:20px;">
                                <table border="1" style="text-align:center; ">
                                    <tr style="text-align: center;"><td colspan=2><h2>Chương Trình</h2></td></tr>
                                    <tr>
                                        <td>
                                            <select class="drop" name="cboKhoa">
                                                <option value=""  selected="selected">-Chọn Khóa-</option>  
                                                <?php 
                                                    $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                    $sql = "select * from khoa_hoc";
                                                    $kq = mysqli_query($kn, $sql);
                                                    while($row = mysqli_fetch_array($kq)):
                                                ?>  
                                                <option value="<?php echo htmlspecialchars($row['MaKhoaHoc']) ?>"><?php echo htmlspecialchars($row['MaKhoaHoc']) ?></option>                                    
                                                <?php endwhile; ?>                                     
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="drop" name="cboHocPhan">
                                                <option value=""  selected="selected">-Chọn tên học phần-</option>  
                                                <?php 
                                                    $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                    $sql1 = "select * from hoc_phan";
                                                    $kq1 = mysqli_query($kn, $sql1);
                                                    while($row1 = mysqli_fetch_array($kq1)):
                                                ?>  
                                                <option value="<?php echo htmlspecialchars($row1['MaHocPhan']) ?>"><?php echo htmlspecialchars($row1['TenMonHoc']) ?></option>                                    
                                                <?php endwhile; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="drop" name="cboNamHoc">
                                                <option value=""  selected="selected">-Chọn năm học-</option>  
                                                <option value="2020-2021">2020-2021</option>         
                                                <option value="2019-2020">2019-2020</option>  
                                                <option value="2018-2019">2018-2019</option>             
                                                <option value="2017-2018">2017-2018</option>                                          
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="drop" name="cboHK">
                                                <option value=""  selected="selected">-Chọn học kỳ-</option> 
                                                <option value="1">Học kỳ 1</option>  
                                                <option value="2">Học kỳ 2</option>                                         
                                            </select>
                                        </td>
                                    </tr>
                                    <tr >
                                        
                                        <td style="text-align:center; display:flex; justify-content:center;">
                                        <div>
                                            <button class="btn1" name="btnThemCT" value="btnThemCT">
                                                <span> Thêm</span>
                                            </button>
                                        </div>
                                            
                                        </td>
                                       
                                       
                                    </tr>
                                </table>    
                            </div>                          
                        </div>
                        <div>
                            <table> 
                                <tr>
                                    <td>
                                        <select class="drop" name="cboTimKhoaHoc">
                                            <option value=""  selected="selected">-Chọn khóa học cần tìm-</option>   
                                            <?php 
                                                $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                $sql = "select * from khoa_hoc";
                                                $kq = mysqli_query($kn, $sql);
                                                while($row = mysqli_fetch_array($kq)):
                                            ?>  
                                            <option value="<?php echo htmlspecialchars($row['MaKhoaHoc']) ?>"><?php echo htmlspecialchars($row['MaKhoaHoc']) ?></option>                                    
                                            <?php endwhile; ?>                                      
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn1" name="btnTim" value="btnTim">
                                            <span> Lọc dữ liệu </span>
                                        </button>
                                    </td>
                                </tr>          
                            </table>
                                <table class="bangthongtin">
                                    <?php
                                        if($_POST){
                                            if(isset($_POST['btnTim']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                tim($cboTimKhoaHoc);
                                            }
                                            if(isset($_POST['btnThemHocPhan']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                themHocPhan($txtMaHocPhan, $txtTenHocPhan, $txtSoTinChi);
                                            }
                                            if(isset($_POST['btnThemCT']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                themChuongTrinh($cboKhoa, $cboHocPhan, $cboNamHoc, $cboHK);
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
</form> 
</body>
</html>