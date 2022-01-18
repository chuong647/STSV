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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleChung/styleQuanLyLopSV.css">
</head>
<?php
    $txtMaKhoa = array_key_exists('txtMaKhoa', $_POST) ? $_POST['txtMaKhoa'] : null;
    $txtBatDau = array_key_exists('txtBatDau', $_POST) ? $_POST['txtBatDau'] : null;
    $txtKetThuc = array_key_exists('txtKetThuc', $_POST) ? $_POST['txtKetThuc'] : null;
    $txtMaKhoa1 = array_key_exists('txtMaKhoa1', $_POST) ? $_POST['txtMaKhoa1'] : null;
    $txtBatDau1 = array_key_exists('txtBatDau1', $_POST) ? $_POST['txtBatDau1'] : null;
    $txtKetThuc1 = array_key_exists('txtKetThuc1', $_POST) ? $_POST['txtKetThuc1'] : null;
    $maxoa = array_key_exists('maxoa', $_POST) ? $_POST['maxoa'] : null;

    function CapNhatKhoa($txtMaKhoa1, $txtBatDau1, $txtKetThuc1){
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $query1 = "update khoa_hoc set NamBatDau= '".$txtBatDau1."', NamKetThuc='".$txtKetThuc1."'
                    where MaKhoaHoc = '".$txtMaKhoa1."'";
        $result1 = mysqli_query($kn, $query1);
        echo '<script> alert("Cập nhật khóa học thành công");</script>';
    }

    if($_POST)
    {

        if(isset($_POST['btnCapNhatKhoa']) and $_SERVER['REQUEST_METHOD'] == "POST")
        { 
            CapNhatKhoa($txtMaKhoa1, $txtBatDau1, $txtKetThuc1);
        }

        if(isset($_POST['btnTroVe']) and $_SERVER['REQUEST_METHOD'] == "POST")
        { 
            echo'<script>window.location.replace("http://localhost/Nh%E1%BA%ADt/CuoiKy/QuanLyLopSV2.php");</script>';
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
                        <div class="container-ad-items" style=" display: flex; justify-content: center; margin-bottom: 10px;">
                            <div style="margin-bottom: 10px;">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="staticBackdropLabel">CẬP NHẬT KHÓA HỌC SINH VIÊN </h3>
                                            </div>
                                            <div class="modal-body" style="display: flex; justify-content: center;">
                                                <table background="">
                                                    <tr>
                                                        <td><b>Mã Khóa học:</b></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input class="text" type="text" id="makhoa" name="txtMaKhoa1" readonly value="<?php echo $_GET['maKhoaHoc'] ?>"></td>
                                                    </tr>
                                                    <?php
                                                        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                        $query2 = "select * from khoa_hoc where MaKhoaHoc = '".$_GET['maKhoaHoc']."'";
                                                        $result2 = mysqli_query($kn, $query2);
                                                        $kq_KhoaHoc = mysqli_fetch_array($result2);
                                                    ?>
                                                    <tr>
                                                        <td><b>Năm bắt đầu:</b></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input class="text" type="text" id="batdau" name="txtBatDau1" value="<?php echo $kq_KhoaHoc['NamBatDau'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Năm kết thúc:</b></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input class="text" type="text" id="ketthuc" name="txtKetThuc1" value="<?php echo $kq_KhoaHoc['NamKetThuc'] ?>"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="btnCapNhatKhoa" value="btnCapNhatKhoa">Cập nhật</button>
                                                <button type="submit" class="btn btn-primary" name="btnTroVe" value="btnTroVe" data-bs-dismiss="modal">Trở về</button>
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