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
    <link rel="stylesheet" href="StyleChung/styleQuanLyDiemHocTap1.css">
    <script src="chonLopHocPhan.js"></script>
</head>
<?php
     $dropMaLopHocPhan = array_key_exists('dropMaLopHocPhan', $_POST) ? $_POST['dropMaLopHocPhan'] : null;
     $dropMaSinhVien = array_key_exists('dropMaSinhVien', $_POST) ? $_POST['dropMaSinhVien'] : null;
     $txtDiemThi = array_key_exists('txtDiemThi', $_POST) ? $_POST['txtDiemThi'] : null;
     
 
     function ThemDiem($dropMaLopHocPhan, $dropMaSinhVien, $txtDiemThi)
     {
         $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
             $sql2="select * from dang_ky_lop_hp 
                     INNER JOIN lop_hoc_phan ON dang_ky_lop_hp.MaLopHocPhan = lop_hoc_phan.MaLopHocPhan 
                     INNER JOIN hoc_phan ON lop_hoc_phan.MaHocPhan = hoc_phan.MaHocPhan
                     WHERE dang_ky_lop_hp.MaLopHocPhan = '".$dropMaLopHocPhan."'";
             //thuc hien truy van
             $kq2 = mysqli_query($kn,$sql2);
            //lấy kết quả truy vấn
             $row2 = mysqli_fetch_array($kq2);
 
             $sql4="select * from diem_hoc_tap where MaHocPhan = '".$row2['MaHocPhan']."' and MaSinhVien = '".$dropMaSinhVien."'";
             $kq4 = mysqli_query($kn, $sql4);
 
             if($row4 = mysqli_fetch_array($kq4)){
                 echo '<script> alert("Điểm sinh viên này đã tồn tại.");</script>';
             }
             else{
                 $sql3="insert into diem_hoc_tap (MaHocPhan, MaSinhVien , DiemThi)
                 values ('".$row2['MaHocPhan']."', '".$dropMaSinhVien."', '".$txtDiemThi."')";
 
             $result = mysqli_query($kn,$sql3) or die("khong truy van");
             echo '<script> alert("Thêm điểm thành công.");</script>';
             }

      }
    function TimKiem(){
        $stt = 0;
        $bien = array_key_exists('txtTimLopHocPhan',$_POST)? $_POST['txtTimLopHocPhan']:null;
        $kn=mysqli_connect("localhost","root","","du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("không kết nối được");
        $sql="select * from diem_hoc_tap 
                    INNER JOIN sinh_vien ON diem_hoc_tap.MaSinhVien = sinh_vien.MaSinhVien where diem_hoc_tap.MaSinhVien = '".$bien."'";
        $kq=mysqli_query($kn,$sql)or die ("Sinh viên chưa có điểm.");
        
        while($row1=mysqli_fetch_array($kq))
        {
            $stt = $stt + 1;
            echo "
                <tr>
                    <td>".$stt."</td>
                    <td>".$row1['MaSinhVien']."</td>
                    <td>".$row1['HoTen']."</td>
                    <td>".$row1['MaHocPhan']."</td>
                    <td>".$row1['DiemThi']."</td>
                </tr>";
        }
    }

    function CapNhat($dropMaLopHocPhan, $dropMaSinhVien, $txtDiemThi)
    {
        if($dropMaLopHocPhan == "" && $dropMaSinhVien =="" && $txtDiemThi == ""){
            echo "<script>alert('Cần nhập đầy đủ thông tin')</script>";
        }
        else{
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
            $sql1="select * from dang_ky_lop_hp 
                    INNER JOIN lop_hoc_phan ON dang_ky_lop_hp.MaLopHocPhan = lop_hoc_phan.MaLopHocPhan 
                    INNER JOIN hoc_phan ON lop_hoc_phan.MaHocPhan = hoc_phan.MaHocPhan
                    WHERE dang_ky_lop_hp.MaLopHocPhan = '".$dropMaLopHocPhan."'";
            $kq1 = mysqli_query($kn,$sql1);
            $row1 = mysqli_fetch_array($kq1);
    
            $sql2 = "update diem_hoc_tap set DiemThi = '".$txtDiemThi."'
                    where MaSinhVien = '".$dropMaSinhVien."' and MaHocPhan = '".$row1['MaHocPhan']."'";
            $kq2 = mysqli_query($kn, $sql2);
            echo '<script>alert("Cập nhật thành công");</script> ';
        }
       
    }
   
?>

<body>
    <form action="QuanLyDiemHocTap.php" method="POST">
        <div class="home">
            <div class="home-items home-ad">
                <?php           
                load_menuAD();
            ?>
                <div class="container-ad">
                    <div class="container-ad-items">
                        <table>
                            <tr>
                                <h1 style="text-align: center; ">ĐIỂM HỌC TẬP </h1>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <table>
                                            <tr>
                                                <td class="lable"><b>Mã lớp học phần:</b></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <select class="textdp dropMaLopHocPhan" name="dropMaLopHocPhan">
                                                        <option value="" selected="selected">-Chọn mã lớp học phần-
                                                        </option>
                                                        <?php
                                                            $kn=mysqli_connect("localhost","root","","du_an_cong_thong_tin_sinh_vien_khoa_cntt")or die("chưa kết nối");
                                                            $sql2="select DISTINCT MaLopHocPhan from dang_ky_lop_hp ORDER BY MaLopHocPhan";
                                                            $kq2= mysqli_query($kn,$sql2);
                                                            while($row= mysqli_fetch_array($kq2)):
                                                        ?>
                                                        <option
                                                            value="<?php echo htmlspecialchars ($row['MaLopHocPhan'])?>">
                                                            <?php echo htmlspecialchars ($row['MaLopHocPhan'])?>
                                                        </option>
                                                        <?php endwhile;?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="lable" style='text-align: center;'><b>Mã sinh viên:</b></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <select class="textdp dropMaSinhVien" name="dropMaSinhVien">
                                                        <option value="" selected="selected">-Chọn mã sinh viên-
                                                        </option>
                                                        <?php
                                            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                            $sql2 = "select * from sinh_vien";
                                            $kq2 = mysqli_query($kn, $sql2);
                                            while($row2 = mysqli_fetch_array($kq2)):
                                        ?>
                                                        <option
                                                            value="<?php echo htmlspecialchars($row2['MaSinhVien']) ?>">
                                                            <?php echo htmlspecialchars($row2['MaSinhVien']) ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="lable" style='text-align: center;'><b>Điểm thi:</b></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="textdt"><input type="text" name="txtDiemThi"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button class="button" style="margin-top: 40px; margin-left: 90px;"
                                                        name="btnThemDiem" value="btnThemDiem">
                                                        <b><span>Thêm</span></b>

                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="button" style="margin-top: 40px; margin-left: 40px;"
                                                        name="btnCapNhatDiem" value="btnCapNhatDiem">
                                                        <b> <span>Cập nhật</span></b>
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td style="width:90px;"></td>
                                <td>
                                    <div>
                                        <table>
                                            <tr>
                                                <td><input class="textdt"
                                                        style="margin-bottom: 30px; margin-top: 40px; width: 200px;"
                                                        type="text" name="txtTimLopHocPhan"
                                                        placeholder="Nhập mã sinh viên cần tìm"></td>
                                                <td>
                                                    <button class="button"
                                                        style="margin-bottom: 30px; margin-top: 40px; width: 100px;"
                                                        name="btnTimLopHocPhan" value="btnTimLopHocPhan">
                                                        <b><span>Lọc dữ liệu</span></b>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                </td>
                                <div>
                                    <table border="2" style="margin-bottom: 140px;margin-right: 20px;  width: 100%;">
                                        <tr style="background: #6080BF; color:black; text-align: center;">
                                            <td>STT</td>
                                            <td>Mã sinh viên</td>
                                            <td>Họ tên sinh viên</td>
                                            <td>Mã học Phần</td>
                                            <td>Điểm thi</td>
                                        </tr>
                                        <?php 
                                                                if($_POST)
                                                                {
                                                                    if(isset($_POST['btnThemDiem']) and $_SERVER['REQUEST_METHOD'] == "POST")
                                                                    {
                                                                        ThemDiem($dropMaLopHocPhan, $dropMaSinhVien, $txtDiemThi);
                                                                    }
                                                                    if(isset($_POST['btnTimLopHocPhan'])and $_SERVER['REQUEST_METHOD'] == "POST")
                                                                    {
                                                                        TimKiem();
                                                                    }
                                                                    if(isset($_POST['btnCapNhatDiem'])and $_SERVER['REQUEST_METHOD'] == "POST")
                                                                    {
                                                                        CapNhat($dropMaLopHocPhan, $dropMaSinhVien, $txtDiemThi);
                                                                        
                                                                    }
                                                                } 
                                                            ?>
                                    </table>
                                </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </td>
                    </tr>
                    </table>
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