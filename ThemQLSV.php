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
    <link rel="stylesheet" href="StyleChung/styleChinhSuaQLSV.css">
    <script src="chonkhoa.js"></script>
</head>
<?php 
    $MaSinhVien = array_key_exists('txtMaSinhVien', $_POST) ? $_POST['txtMaSinhVien']: null;
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
    $MaLop = array_key_exists('cboLop', $_POST) ? $_POST['cboLop']: null;
    $TinhTrangHoc = array_key_exists('txtTinhTrangHoc', $_POST) ? $_POST['txtTinhTrangHoc']: null;
    $MatKhau = array_key_exists('txtPass', $_POST) ? $_POST['txtPass']: null;
    $KhoaHoc = array_key_exists('cboKhoa', $_POST) ? $_POST['cboKhoa']: null;

    function Them($MaSinhVien, $HoTen, $NgaySinh, $GioiTinh, $DanToc, $SoCMND, $TonGiao, $QueQuan, $SDT, $Email, $ChucVu, $MaLop, $TinhTrangHoc, $MatKhau)
    {
        if($MaSinhVien == "")
        {
            echo '<script>alert("Mã sinh viên không được để trống!");</script>';
        }
        else
        {
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
            $sql2 = "select MaSinhVien from sinh_vien where MaSinhVien = '".$MaSinhVien."' ";
            $kq2 = mysqli_query($kn, $sql2);
            $MatKhau=md5($MatKhau);
            if($row1 = mysqli_fetch_array($kq2))
            {
                echo '<script>alert("Mã sinh viên đã tồn tại!");</script>';
            }
            else
            {
                $sql4 = "insert into sinh_vien (MaSinhVien, HoTen, NgaySinh, GioiTinh, DanToc, SoCMND, TonGiao, QueQuan, SDT, Email, ChucVu, MaLop, TinhTrangHoc, MatKhau, Anh, Job)
                    values ('$MaSinhVien','$HoTen', '$NgaySinh', '$GioiTinh', '$DanToc', '$SoCMND', '$TonGiao', '$QueQuan', '$SDT', '$Email', '$ChucVu', '$MaLop', '$TinhTrangHoc', '$MatKhau', '', '')";
                $kq4 = mysqli_query($kn, $sql4);
                echo '<script>alert("Thêm thành công");</script>';
            }
        }
        
    }
?>

<body>
    <form action="ThemQLSV.php" method="post">
        <div class="home">
            <div class="home-items home-ad">
                <?php           
             load_menuAD();
        ?>
                <div class="container-ad">
                    <div class="containner-ad-text">
                        <h4>SỔ TAY SINH VIÊN ONLINE</h4>
                        <hr>
                    </div>
                    <div class="container-ad-items">
                        <h1 style="text-align: center;">THÔNG TIN SINH VIÊN</h1>
                        <div>
                            <table class="tbsv">
                                <tr>
                                    <td>
                                        <h4>Mã sinh viên</h4> <input class="text" type="text" name="txtMaSinhVien">
                                    </td>
                                    <td>
                                        <h4>Họ tên sinh viên</h4> <input class="text" type="text" name="txtHoTen">
                                    </td>
                                    <td>
                                        <h4>Số điện thoại</h4> <input class="text" type="text" name="txtSDT">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="drop cboKhoa" name="cboKhoa">
                                            <option value="" selected="selected">-Chọn khóa học-</option>
                                            <?php
                                        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                        $sql2 = "select * from khoa_hoc";
                                        $kq2 = mysqli_query($kn, $sql2);
                                        while($row3 = mysqli_fetch_array($kq2)):
                                    ?>
                                            <option value="<?php echo htmlspecialchars($row3['MaKhoaHoc']) ?>">
                                                <?php echo htmlspecialchars($row3['MaKhoaHoc']) ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </td>
                                    <td>

                                        <select class="drop cboLop" name="cboLop">
                                            <option value="" selected="selected"><b>-Chọn lớp học-</b></option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="drop" name="cboQueQuan">
                                            <option selected="selected">-Chọn quê quán-</option>
                                            <option value="Bình Định">Bình Định</option>
                                            <option value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                                            <option value="Hà Nội">Hà Nội</option>
                                            <option value="Đà Nẵng">Đà Nẵng</option>
                                            <option value="Phú Yên">Phú Yên</option>
                                            <option value="Quãng Ngãi">Quãng Ngãi</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Giới tính</h4>
                                        <div class="wrapper">
                                            <input type="radio" name="GioiTinh" id="option-1" value="Nam">
                                            <input type="radio" name="GioiTinh" id="option-2" value="Nữ">
                                            <label for="option-1" class="option option-1">
                                                <div class="dot"></div>
                                                <span>Nam</span>
                                            </label>
                                            <label for="option-2" class="option option-2">
                                                <div class="dot"></div>
                                                <span>Nữ</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <h4>Ngày sinh</h4>
                                        <input type="datetime-local" class="text" name="NgaySinh">
                                    </td>
                                    <td>
                                        <h4>Số CMND</h4>
                                        <input class="text" type="text" name="txtCMND">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Tôn giáo</h4> <input class="text" type="text" name="txtTonGiao">
                                    </td>
                                    <td>
                                        <h4>Dân tộc</h4> <input class="text" type="text" name="txtDanToc">
                                    </td>
                                    <td>
                                        <h4>Email</h4><input class="text" type="text" name="txtEmail">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Chức vụ</h4><input class="text" type="text" name="txtChucVu">
                                    </td>
                                    <td>
                                        <h4>Tình trạng học</h4><input class="text" type="text" name="txtTinhTrangHoc">
                                    </td>
                                    <td>
                                        <h4>Mật khẩu</h4><input class="text" type="password" name="txtPass">
                                    </td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td colspan=3 style="text-align: center;">
                                        <input class="btn" type="submit" name="btnUpdate" value="Thêm mới">
                                        <?php 
                                            if($_POST){
                                                if(isset($_POST['btnUpdate']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                    Them($MaSinhVien, $HoTen, $NgaySinh, $GioiTinh, $DanToc, $SoCMND, $TonGiao, $QueQuan, $SDT, $Email, $ChucVu, $MaLop, $TinhTrangHoc, $MatKhau);
                                                }
                                            }
                                        ?>
                                        <input class="btn" type="submit" name="btnTroVe" value="Trở về">
                                        <?php 
                                        if($_POST){
                                            if(isset($_POST['btnTroVe']) and $_SERVER['REQUEST_METHOD'] == "POST")
                                            {
                                                echo'<script>window.location.replace("http://localhost/STSV/QuanLySinhVien.php");</script>';                               
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