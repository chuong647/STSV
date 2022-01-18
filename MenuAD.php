<?php
session_start();
?>
<style>
    .link{
        padding: 0;
    }
    .active{
        background-color: var(--primary-color);
    }
</style>
            <div class="menu-ad">
                <div class="logo">
                    <img src="./image/logo1.png" alt="">
                </div>
                <?php
                    $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                    $tim_TT = "select * from giang_vien where MaGiangVien = '".$_SESSION['Username']."'";
                    $ketqua_TT = mysqli_query($kn, $tim_TT);
                    $row_TT = mysqli_fetch_array($ketqua_TT);
                    $tenDangNhap = $row_TT['HoTen'] .' [ '. $row_TT['MaGiangVien'] . ' ]';
                ?>
                
                <ul class="nav list-group" style="flex-wrap: nowrap;">
                    <li class="list-group-item nav-item active">
                        <button class="btn" data-toggle="collapse" data-target="#demo1">
                            <a class="link" style="color: white;"><?php echo ' [ '. $row_TT['MaGiangVien'] . ' ]'; ?></a>
                            <a class="link" style="color: white" ><?php echo $row_TT['HoTen']; ?></a>
                        </button>
                        <div id="demo1" class="collapse" style="margin-left: 15px">
                        <br>
                            <a class="link border border-top-0 border-right-0 border-left-0" style="padding: 6px;" href="DoiMatKhauAD.php">ĐỔI MẬT KHẨU</a>
                            <a class="link border border-top-0 border-right-0 border-left-0" style="padding: 6px;" href="DangXuatAD.php">ĐĂNG XUẤT</a>
                        </div>
                    </li>
                    <li class="list-group-item nav-item active"><a class="link" href="TrangchuAD.php">Trang chủ</a></li>
                    <li class="list-group-item nav-item active"><a class="link" href="QuanLyGiangVien.php">Giảng viên</a></li>
                    <li class="list-group-item nav-item active"><a class="link" href="QuanLySinhVien.php">Sinh viên</a></li>
                    <li class="list-group-item nav-item active"><a class="link" href="ChuongTrinhHoc.php">Chương trình đào tạo</a></li>
                    <li class="list-group-item nav-item active">
                        <a class="link" href="#" style="color: white" data-toggle="collapse" data-target="#demo">Quản lý lớp</a>
                        <div id="demo" class="collapse" style="margin-left: 15px">
                        <br>
                            <a class="link border border-right-0 border-left-0" style="padding: 6px;" href="QuanLyLopSV2.php">Khóa học sinh viên</a>
                            <a class="link border border-top-0 border-right-0 border-left-0" style="padding: 6px;" href="QuanLyLopSV3.php">Lớp sinh viên</a>
                            <a class="link border border-top-0 border-right-0 border-left-0" style="padding: 6px;" href="QuanLyLopHocPhan.php">Lớp học phần</a>
                        </div>
                    </li>
                    <li class="list-group-item nav-item active"><a class="link" href="QuanLyDiemHocTap.php">Điểm sinh viên</a></li>
                    <li class="list-group-item nav-item active"><a class="link" href="QuanLyGopY.php">Góp ý</a></li>
                </ul>
            </div>
        <!-- </div>
    </div> -->