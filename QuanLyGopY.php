<!DOCTYPE html>
<?php
    require 'site.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý góp ý sinh viên</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="StyleChung/style.css">
    <link rel="stylesheet" href="StyleChung/styletrangchu.css">
    <link rel="stylesheet" href="StyleChung/styleHomThu.css">
</head>
<body>
<form action="" method="POST">
    <div class="home">
        <div class="home-items home-ad">
            <?php           
                load_menuAD();
            ?>
             <div class="container-ad">
                <div class="container-ad-items">
                    <div id="tbsv3">
                    <table class="table table-striped" style="font-size:10px;" id="bangthongtin">
                        <tr class="hang1">
                            <th style="text-align: center;">STT</th>
                            <th style="text-align: center;" >Ngày</th>
                            <th style="text-align: center;">Tháng</th>
                            <th style="text-align: center;">Năm</th>
                            <th style="text-align: center;">Mã sinh viên</th>
                            <th style="text-align: center;">Họ tên sinh viên</th>
                            <th style="text-align: center;">Tiêu đề</th>
                        </tr>
                        <?php
                            $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die ("chưa kết nối");
                            $sql = "select * from hom_thu_gop_y
                                    INNER JOIN sinh_vien ON sinh_vien.MaSinhVien = hom_thu_gop_y.MaSinhVien 
                                    ORDER BY Ngay DESC, Thang DESC, Nam DESC, Gio DESC, Phut DESC, Giay DESC";
                            $kq = mysqli_query($kn, $sql);
                            $stt = 0;
                            while($row = mysqli_fetch_array($kq))
                            {
                                $_SESSION['MaSinhVien'] = $row['MaSinhVien'];
                                $maSV = $_SESSION['MaSinhVien'];
                                $Ngay = $row['Ngay'];
                                $Thang = $row['Thang'];
                                $Nam = $row['Nam'];
                                $Gio = $row['Gio'];
                                $Phut = $row['Phut'];
                                $Giay = $row['Giay'];
                                $stt = $stt + 1;
                                echo "<tr class='hang1'>
                                    <td class='cot' style='text-align: center;'>".$stt."</td>
                                    <td class='cot' style='text-align: center;'>".$row['Ngay']."</td>
                                    <td class='cot' style='text-align: center;'>".$row['Thang']."</td>
                                    <td class='cot' style='text-align: center;'>".$row['Nam']."</td>
                                    <td class='cot' style='text-align: center;'>".$row['MaSinhVien']."</td>
                                    <td class='cot' style='text-align: center;'>".$row['HoTen']."</td>
                                    <td class='cot'>".$row['TieuDe']."</td>
                                </tr>";
                            }            
                        ?>
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