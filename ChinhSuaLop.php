<!DOCTYPE html>
<?php
    require 'site.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khóa học</title>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleChung/styleQuanLyLopSV.css">
</head>
<?php
    $txtMaLop = array_key_exists('txtMaLop', $_POST) ? $_POST['txtMaLop'] : null;
    //$txtKhoa = array_key_exists('txtKhoa', $_POST) ? $_POST['txtKhoa'] : null;
    $txtTenLop = array_key_exists('txtTenLop', $_POST) ? $_POST['txtTenLop'] : null;
    $txtMaLop1 = array_key_exists('txtMaLop1', $_POST) ? $_POST['txtMaLop1'] : null;
    $txtMaKhoa = array_key_exists('txtMaKhoa', $_POST) ? $_POST['txtMaKhoa'] : null;
    $txtTenLop1 = array_key_exists('txtTenLop1', $_POST) ? $_POST['txtTenLop1'] : null;
    $maL = array_key_exists('maL1', $_POST) ? $_POST['maL1'] : null;

    function CapNhatLop($txtMaLop1, $txtTenLop1, $txtMaKhoa){
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $query1 = "update lop set TenLop='".$txtTenLop1."', MaKhoaHoc = '".$txtMaKhoa."'
                    where MaLop = '".$txtMaLop1."'";
        $result1 = mysqli_query($kn, $query1);
        echo '<script> alert("Cập nhật khóa học thành công");</script>';
    }

    if($_POST)
    {

        if(isset($_POST['btnCapNhatLop']) and $_SERVER['REQUEST_METHOD'] == "POST")
        { 
            CapNhatLop($txtMaLop1, $txtTenLop1, $txtMaKhoa);
        }

        if(isset($_POST['btnTroVe']) and $_SERVER['REQUEST_METHOD'] == "POST")
        { 
            echo'<script>window.location.replace("http://localhost/STSV/QuanLyLopSV3.php");</script>';
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
                    <div class="container-ad-items"
                        style=" display: flex; justify-content: center; margin-bottom: 10px;">
                        <div style="margin-bottom: 10px;">
                            <div class="modal-header">
                                <h3 class="modal-title" id="staticBackdropLabel">CẬP NHẬT LỚP SINH HOẠT </h3>
                            </div>
                            <div class="modal-body" style="display: flex; justify-content: center;">
                                <table background="">
                                    <?php
                                                        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                        $query2 = "select * from lop where MaLop = '".$_GET['maLopHoc']."'";
                                                        $result2 = mysqli_query($kn, $query2);
                                                        $kq_KhoaHoc = mysqli_fetch_array($result2);
                                                    ?>
                                    <tr>
                                        <td><b>Mã Khóa học:</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="text" type="text" id="batdau" name="txtMaKhoa"
                                                value="<?php echo $kq_KhoaHoc['MaKhoaHoc'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mã lớp:</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="text" type="text" id="batdau" name="txtMaLop1"
                                                value="<?php echo $kq_KhoaHoc['MaLop'] ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tên lớp:</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input class="text" type="text" id="ketthuc" name="txtTenLop1"
                                                value="<?php echo $kq_KhoaHoc['TenLop'] ?>"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="btnCapNhatLop"
                                    value="btnCapNhatLop">Cập nhật</button>
                                <button type="submit" class="btn btn-primary" name="btnTroVe" value="btnTroVe"
                                    data-bs-dismiss="modal">Trở về</button>
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
        </div>
    </form>
</body>

</html>