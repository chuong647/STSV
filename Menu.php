<?php
 session_start();
?>
<style>
    #nav_link{
        color: white;
    }
</style>
<div class="home">
    <div class="home-items">
        <div class="logo">
            <marquee scrollamount="5">
                <a href="">
                    <img src="image/anh4.jpg" style="width: 900px; height: 300px; background: #003999" alt="">
                    <img src="image/anh3.jpg" style="width: 900px; height: 300px; background: #003999" alt="">
                    <img src="image/anh2.jpg" style="width: 900px; height: 300px; background: #003999" alt="">
                </a>
            </marquee>
        </div>

        <nav class="navbar navbar-expand-sm bg-light navbar-light" style="padding: 0;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link navbar-brand" style="color: white;" href="Trangchu.php">Trang chủ</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link navbar-brand" style="color: white;" href="ThongTinSinhVien.php">Thông tin sinh viên</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link navbar-brand" style="color: white;" href="DiemHocTap.php">Chương trình học</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link navbar-brand" style="color: white;" href="HomThuGopY.php">Hòm thư góp ý</a>
                    </li>  
                    <li class="nav-item active dropdown">
                        <?php
                            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                            $tim_TT = "select * from sinh_vien where MaSinhVien = '".$_SESSION['Username']."'";
                            $ketqua_TT = mysqli_query($kn, $tim_TT);
                            $row_TT = mysqli_fetch_array($ketqua_TT);
                            $tenDangNhap = $row_TT['HoTen'] .' [ '. $row_TT['MaSinhVien'] . ' ]';
                        ?>
                        <a class="nav-link navbar-brand dropdown-toggle" style="color: white;" data-toggle="dropdown"><?php echo $tenDangNhap; ?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="DoiMatKhau.php">Đổi mật khẩu</a>
                            <a class="dropdown-item active" href="DangXuat.php">Đăng xuất</a>
                        </div>
                    </li>  
                </ul>
            </div>  
        </nav>
    </div>

</div>

