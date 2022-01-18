<!DOCTYPE html>
<?php
    require 'site.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lớp sinh hoạt</title>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleChung/styleQuanLyLopSV.css">
</head>
<?php

    $txtMaLop = array_key_exists('txtMaLop', $_POST) ? $_POST['txtMaLop'] : null;
    $ddlKhoa = array_key_exists('ddlKhoa', $_POST) ? $_POST['ddlKhoa'] : null;
    $txtTenLop = array_key_exists('txtTenLop', $_POST) ? $_POST['txtTenLop'] : null;
    $txtMaLop1 = array_key_exists('txtMaLop1', $_POST) ? $_POST['txtMaLop1'] : null;
    $ddlMakhoa1 = array_key_exists('ddlMakhoa1', $_POST) ? $_POST['ddlMakhoa1'] : null;
    $txtTenLop1 = array_key_exists('txtTenLop1', $_POST) ? $_POST['txtTenLop1'] : null;
    $maL = array_key_exists('btnXoaLop', $_POST) ? $_POST['btnXoaLop'] : null;

    function ThemLop($txtMaLop, $ddlKhoa, $txtTenLop)
    {
        if($txtMaLop == "" or $ddlKhoa == ""  or $txtTenLop == "")
        {
            echo '<script> alert("Cần phải nhập đầy đủ thông tin");</script>';
        }
        else
        {
            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
            $sql1 = "select * from lop where MaLop='".$txtMaLop."'";
            $kq1 = mysqli_query($kn,$sql1);
            if ($row = mysqli_fetch_array($kq1)) 
            {
                echo '<script> alert("Lớp đã tồn tại");</script>';
            }
            else
            {
                $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                $sql5="insert into lop (MaLop, MaKhoaHoc, TenLop) values ('$txtMaLop', '$ddlKhoa', '$txtTenLop')";
                $result = mysqli_query($kn,$sql5) or die("khong truy van");
                echo '<script> alert("Đã thêm lớp sinh hoạt");</script>';
            }
        }
    }

    function XoaLop($maL){
        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
        $sql3 = "delete from lop where MaLop = '".$maL."'";
        $kq3 = mysqli_query($kn,$sql3);
        echo '<script> alert("Đã xóa lớp sinh hoạt");</script>';
    }

    if($_POST)
    {
        if(isset($_POST['btnThemLop']) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            ThemLop($txtMaLop, $ddlKhoa, $txtTenLop);
        }
        if(isset($_POST['btnXoaLop']) and $_SERVER['REQUEST_METHOD'] == "POST")
        { 
            XoaLop($maL);
        }
    }
?>
<body>
    <form action="QuanLyLopSV3.php" method="POST">
        <div class="home">
            <div class="home-items home-ad">
                <?php           
                    load_menuAD();
                ?>
                    <div class="container-ad">
                        <div class="container-ad-items" style=" display: flex; justify-content: center; margin-bottom: 10px;">
                            <div style="margin-bottom: 10px;">
                                <!-- GRID LỚP HỌC -->
                                <div style="margin-left: 20px;">
                                    <!-- HEAD LỚP -->
                                    <h1 style="display: flex; justify-content: center; margin-bottom: 10px;">LỚP SINH HOẠT</h1>
                                    <div style="display: flex;">
                                        <button type="button" class="btn2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <span> Thêm Lớp </span>
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
                                                        <h5 class="modal-title" id="staticBackdropLabel">Thêm lớp sinh hoạt</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" style="display: flex; justify-content: center;">
                                                    <table>
                                                        <tr>
                                                            <td><b>Mã lớp:</b></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><input class="text" type="text" name="txtMaLop"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Mã Khóa học:</b></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <select class="drop" name="ddlKhoa">
                                                                    <option value=""  selected="selected">-Chọn Khóa-</option>  
                                                                    <?php 
                                                                        $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                                        $sql = "select * from khoa_hoc";
                                                                        $kq = mysqli_query($kn, $sql);
                                                                        while($row0 = mysqli_fetch_array($kq)):
                                                                    ?>  
                                                                    <option value="<?php echo htmlspecialchars($row0['MaKhoaHoc']) ?>"><?php echo htmlspecialchars($row0['MaKhoaHoc']) ?></option>                                    
                                                                    <?php endwhile; ?>                                     
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Tên lớp:</b></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><input class="text" type="text" name="txtTenLop"></td>
                                                        </tr>
                                                    </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="btnThemLop" value="btnThemLop">Thêm</button>
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
                                                <td><b>Mã Lớp học</b></td>
                                                <td><b>Mã khóa học</b></td>
                                                <td><b>Tên lớp học</b></td>
                                                <td><b>Chỉnh sửa</b></td>
                                                <td><b>Xóa</b></td>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                                $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("chưa kết nối");
                                                $query2 = "select * from lop";
                                                $result2 = mysqli_query($kn, $query2);
                                                $stt=0;
                                                if($result2){
                                                    foreach($result2 as $row){
                                                        $stt=$stt+1;
                                            ?>
                                            <tr>
                                                <td><?php echo $stt; ?></td>
                                                <td><?php echo $row['MaLop']; ?></td>
                                                <td><?php echo $row['MaKhoaHoc']; ?></td>
                                                <td><?php echo $row['TenLop']; ?></td>
                                                <td>
                                                    <a href="ChinhSuaLop.php?maLopHoc=<?php echo $row['MaLop']; ?>"class="btn btn-primary" style="vertical-align:middle" name="btnCapNhatKhoa"  value="btnCapNhatKhoa">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" style="vertical-align:middle" name="btnXoaLop" value="<?php echo $row['MaLop']; ?>">
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
                                <!-- END -->
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
        
        <!-- editLớp -->
        <script>
            $(document).ready(function () {

                $('.editbtn').on('click', function () {
                    $('#editmodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#maL').val(data[1]);
                    $('#tenL').val(data[3]);
                });
            });
        </script>

        <!-- DeleteLớp -->
        <script>
            $(document).ready(function () {

                $('.deletebtn').on('click', function () {

                    $('#deletemodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#maL1').val(data[1]);

                });
            });
        </script>
    </form>
</body>
</html>