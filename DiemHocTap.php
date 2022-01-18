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
    <title>Điểm học tập</title>
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/style.css">
	<link rel="stylesheet" href="StyleChung/styleDiemMH.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<body>
    <?php
    load_menu();
    ?>
    <div class="home">
       <div class="home-items">
        <div class="container">
            <form action="" method="POST" class="container-items">
                <table id="formChung">
                    <tr>
                        <td>
                            <h1 style="text-align: center; font-family: Bahnschrift; font-size: 32px" >KẾT QUẢ HỌC TẬP SINH VIÊN</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <?php
                                 $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                 $sql1 = "select * from sinh_vien INNER JOIN lop ON sinh_vien.MaLop = lop.MaLop where MaSinhVien='".$_SESSION['Username']."'";
                                 $kq1 = mysqli_query($kn,$sql1);
                                 $row = mysqli_fetch_array($kq1);
                                 $khoahoc = $row['MaKhoaHoc'];

                            ?>
                            <table style="text-align: left" id="formChung1" class="table">
                                <tr>
                                    <td ><h4>Họ tên sinh viên:</h4></td>
                                    <td colspan="3"><?php echo htmlspecialchars($row['HoTen']) ?></td>
                                    <td ><h4>Mã sinh viên:</h4></td>
                                    <td> <?php echo htmlspecialchars($row['MaSinhVien']) ?></td>
                                </tr>
                                <tr>
                                    <td><h4>Ngành học:</h4></td>
                                    <td width=250px> Công nghệ thông tin</td>
                                    <td width=50px><h4>Khóa:</h4></td>
                                    <td width=100px> <?php echo htmlspecialchars($row['MaKhoaHoc']) ?></td>
                                    <td><h4>Lớp sinh hoạt:</h4></td>
                                    <td> <?php echo htmlspecialchars($row['TenLop']) ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <table border="2" style="text-align: left" width=1025px id="formDRL" class="table table-bordered">
                                <tr class="table-primary">
                                    <td style="text-align: center"><h4>Mã học phần</h4></td>
                                    <td style="text-align: center"><h4>Tên học phần</h4></td>
                                    <td style="text-align: center"><h4>Số tín chỉ</h4></td>
                                    <td style="text-align: center"><h4>Kết quả</h4></td>
                                </tr>
                                <tr>
                                    <td colspan="4" height=15px><h4>Học kỳ 1 (18 tín chỉ)</h4></td>
                                </tr>
                                <?php 
                                    $hocky1 = "1";
                                    $sql = "select khoa_hoc.MaKhoaHoc from sinh_vien INNER JOIN lop ON lop.MaLop = sinh_vien.MaLop INNER JOIN khoa_hoc ON khoa_hoc.MaKhoaHoc = lop.MaKhoaHoc where sinh_vien.MaSinhVien ='".$_SESSION['Username']."'";
                                    $kq = mysqli_query($kn,$sql);
                                    $timKhoaHoc = mysqli_fetch_array($kq);
                                    $sql2 = "SELECT * FROM diem_hoc_tap INNER JOIN hoc_phan ON diem_hoc_tap.MaHocPhan = hoc_phan.MaHocPhan INNER JOIN chuong_trinh ON hoc_phan.MaHocPhan = chuong_trinh.MaHocPhan INNER JOIN khoa_hoc ON chuong_trinh.MaKhoaHoc = khoa_hoc.MaKhoaHoc INNER JOIN sinh_vien ON sinh_vien.MaSinhVien = diem_hoc_tap.MaSinhVien where chuong_trinh.HocKy = '".$hocky1."' and sinh_vien.MaSinhVien = '".$_SESSION['Username']."' and khoa_hoc.MaKhoaHoc = '".$khoahoc."'";
                                    $kq2 = mysqli_query($kn,$sql2);
                                    $diem1 = 0;
                                    $stc1 = 0;
                                    while ($row1 = mysqli_fetch_array($kq2)): 
                                        $diem1 = $diem1 + $row1['DiemThi']*$row1['SoTinChi'];
                                        $stc1 = $stc1 + $row1['SoTinChi'];
                                        
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo htmlspecialchars($row1['MaHocPhan']); ?></td>
                                    <td style="text-align: center"><?php echo htmlspecialchars($row1['TenMonHoc']); ?></td>
                                    <td style="text-align: center"><?php echo htmlspecialchars($row1['SoTinChi']); ?></td>
                                    <td style="text-align: center"><?php echo htmlspecialchars($row1['DiemThi']); ?></td>
                                </tr>
                                <?php 
                                    endwhile; 
                                   
                                    if($diem1 == 0 or $stc1 == 0)
                                    {
                                        $dtb1 = 0;
                                    }
                                    else
                                    {
                                        $dtb1 = $diem1/$stc1;
                                    }

                                    $ketqua1 = "";
                                    if($dtb1 < 4 and $dtb1 > 0)
                                        $ketqua1 = "Yếu";
                                    if($dtb1 >= 4 and $dtb1 < 6.5)
                                        $ketqua1 = "Trung bình";
                                    if($dtb1 >= 6.5 and $dtb1 < 8)
                                        $ketqua1 = "Khá";
                                    if($dtb1 >= 8)
                                        $ketqua1 = "Giỏi";
                                ?>
                                <tr>
                                    <td colspan="4">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="width: 350px;"><h4>=> Điểm trung bình (Hệ 10):</h4></td>
                                                <td style="width: 150px; text-align: center;"><?php echo htmlspecialchars(round($dtb1,2)); ?></td>
                                                <td style="width: 350px;"><h4>=> Kết quả đạt được:</h4></td>
                                                <td style="text-align: center;"><?php echo htmlspecialchars($ketqua1); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" height=15px><h4>Học kỳ 2 (19 tín chỉ)</h4></td>
                                </tr>
                                <?php 
                                    $hocky2 = "2";
                                    $sql3 = "SELECT * FROM diem_hoc_tap INNER JOIN hoc_phan ON diem_hoc_tap.MaHocPhan = hoc_phan.MaHocPhan INNER JOIN chuong_trinh ON hoc_phan.MaHocPhan = chuong_trinh.MaHocPhan INNER JOIN khoa_hoc ON chuong_trinh.MaKhoaHoc = khoa_hoc.MaKhoaHoc INNER JOIN sinh_vien ON sinh_vien.MaSinhVien = diem_hoc_tap.MaSinhVien where chuong_trinh.HocKy = '".$hocky2."' and sinh_vien.MaSinhVien = '".$_SESSION['Username']."' and khoa_hoc.MaKhoaHoc = '".$khoahoc."'";
                                    $kq3 = mysqli_query($kn,$sql3);
                                    $diem2 = 0;
                                    $stc2 = 0;
                                    while ($row2 = mysqli_fetch_array($kq3)): 
                                        $diem2 = $diem2 + $row2['DiemThi']*$row2['SoTinChi'];
                                        $stc2 = $stc2 + $row2['SoTinChi'];
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo htmlspecialchars($row2['MaHocPhan']); ?></td>
                                    <td style="text-align: center"><?php echo htmlspecialchars($row2['TenMonHoc']); ?></td>
                                    <td style="text-align: center"><?php echo htmlspecialchars($row2['SoTinChi']); ?></td>
                                    <td style="text-align: center"><?php echo htmlspecialchars($row2['DiemThi']); ?></td>
                                </tr>
                                <?php 
                                    endwhile; 
                                    
                                    if($diem2 == 0 or $stc2 == 0)
                                    {
                                        $dtb2 = 0;
                                    }
                                    else
                                    {
                                        $dtb2 = $diem2/$stc2;
                                    }

                                    $ketqua1 = "";
                                    if($dtb2 < 4 and $dtb2 > 0)
                                        $ketqua1 = "Yếu";
                                    if($dtb2 >= 4 and $dtb2 < 6.5)
                                        $ketqua1 = "Trung bình";
                                    if($dtb2 >= 6.5 and $dtb2 < 8)
                                        $ketqua1 = "Khá";
                                    if($dtb2 >= 8)
                                        $ketqua1 = "Giỏi";
                                ?>
                                <td colspan="4">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 350px;"><h4>=> Điểm trung bình (Hệ 10):</h4></td>
                                            <td style="width: 150px; text-align: center;"><?php echo htmlspecialchars(round($dtb2,2)); ?></td>
                                            <td style="width: 350px;"><h4>=> Kết quả đạt được:</h4></td>
                                            <td style="text-align: center;"><?php echo htmlspecialchars($ketqua1); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            <?php 
                                global $ketquaTong;
                                $dtbTong = ($dtb1 + $dtb2)/2;
                                $ketquaTong = round($dtbTong,2);
                            ?>
                            <tr>
                                <td style="text-align: center;" ><h4>Điểm trung bình qua các học kỳ: </h4></td>
                                <td colspan="3" style="text-align: center;"><?php echo htmlspecialchars($ketquaTong) ?></td>
                            </tr>
                            </table>
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
</html>