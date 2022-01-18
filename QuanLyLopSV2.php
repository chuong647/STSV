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
    $maxoa = array_key_exists('btnXoaKhoa', $_POST) ? $_POST['btnXoaKhoa'] : null;

    function ThemKhoa($txtMaKhoa, $txtBatDau, $txtKetThuc)
    {
        if($txtMaKhoa == "" or $txtBatDau == "" or $txtKetThuc == "")
        {
            echo '<script> alert("Cần phải nhập đầy đủ thông tin");</script>';
        }
        else
        {
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
            $sql1 = "select * from khoa_hoc where MaKhoaHoc='".$txtMaKhoa."'";
            $kq1 = mysqli_query($kn,$sql1);
            if ($row = mysqli_fetch_array($kq1)) 
            {
                echo '<script> alert("Khóa học đã tồn tại");</script>';
            }
            else
            {
                $sql2="insert into khoa_hoc (MaKhoaHoc, NamBatDau, NamKetThuc)
                    values ('$txtMaKhoa', '$txtBatDau', '$txtKetThuc')";
                $result = mysqli_query($kn,$sql2) or die("khong truy van");
                echo '<script> alert("Đã thêm khóa học");</script>';
            }
        }
    }
    function CapNhatKhoa($txtMaKhoa, $txtBatDau, $txtKetThuc){
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $query1 = "update khoa_hoc set NamBatDau= '".$txtBatDau."', NamKetThuc='".$txtKetThuc."'
                    where MaKhoaHoc = '".$txtMaKhoa."'";
        $result1 = mysqli_query($kn, $query1);
        echo '<script> alert("Cập nhật khóa học thành công");</script>';
    }

    function XoaKhoa($maxoa){
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $sql2 = "delete from lop where MaKhoaHoc = '".$maxoa."'";
        $sql1 = "delete from khoa_hoc where MaKhoaHoc = '".$maxoa."'";
        // $kq2 = mysqli_query($kn,$sql2);
        $kq1 = mysqli_query($kn,$sql1);
        echo '<script> alert("Đã xóa khóa học");</script>';
    }

    if($_POST)
    {
        if(isset($_POST['btnThemKhoa']) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            ThemKhoa($txtMaKhoa, $txtBatDau, $txtKetThuc);
        }
        if(isset($_POST['btnXoaKhoa']) and $_SERVER['REQUEST_METHOD'] == "POST")
        { 
            XoaKhoa($maxoa);
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
                                <!-- GRID KHÓA HỌC -->
                                <div>
                                    <!-- HEAD KHÓA -->
                                    <h1 style="display: flex; justify-content: center; margin-bottom: 10px;">KHÓA HỌC SINH VIÊN</h1>
                                    <div style="display: flex;">
                                        <button type="button" class="btn2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <span> Thêm Khóa </span>
                                        </button>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i style="font-size: 27px;" class="fas fa-search"></i></span>
                                            <input type="text" class="textS" id="myInput" placeholder="Search..">
                                        </div>
                                        <!-- MODAL ADD -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Thêm khóa học sinh viên</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" style="display: flex; justify-content: center;">
                                                        <table>
                                                            <tr>
                                                                <td><b>Mã Khóa học:</b></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><input class="text" type="text" name="txtMaKhoa"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Năm bắt đầu:</b></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><input class="text" type="text" name="txtBatDau"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Năm kết thúc:</b></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td><input class="text" type="text" name="txtKetThuc"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"name="btnThemKhoa" value="btnThemKhoa">Thêm</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
                                        <!-- END -->
                                    </div>
                                    <!-- END -->
                                    <table style="text-align: center;" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td><b>STT</b></td>
                                                <td><b>Mã khóa học</b></td>
                                                <td><b>Năm bắt đầu</b></td>
                                                <td><b>Năm kết thúc</b></td>
                                                <td><b>Chỉnh sửa</b></td>
                                                <td><b>Xóa</b></td>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                                $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                $query2 = "select * from khoa_hoc";
                                                $result2 = mysqli_query($kn, $query2);
                                                $stt=0;
                                                if($result2){
                                                    foreach($result2 as $row){
                                                        $stt=$stt+1;
                                            ?>
                                            <tr>
                                                <td><?php echo $stt; ?></td>
                                                <td><?php echo $row['MaKhoaHoc']; ?></td>
                                                <td><?php echo $row['NamBatDau']; ?></td>
                                                <td><?php echo $row['NamKetThuc']; ?></td>
                                                <td>
                                                        <a href="ChinhSuaKhoa.php?maKhoaHoc=<?php echo $row['MaKhoaHoc']; ?>" class="btn btn-primary" style="vertical-align:middle" name="btnCapNhatKhoa"  value="btnCapNhatKhoa">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                </td>
                                                <td>
                                                        <button class="btn btn-primary" style="vertical-align:middle" name="btnXoaKhoa" value="<?php echo $row['MaKhoaHoc']; ?>">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            
        <!-- tìm kiếm -->
        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </form>
</body>
</html>