<?php
    $maLHP = $_GET['maLHP'];
     $kn = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die ("chưa kết nối");
     $sql1="delete from lop_hoc_phan where MaLopHocPhan = '".$maLHP."'";
     $kq1=mysqli_query($kn, $sql1) or die ("lỗi truy vấn");
     echo "<script>alert('Xóa thành công');</script>";
     echo'<script>window.location.replace("http://localhost/Nh%E1%BA%ADt/CuoiKy/QuanLyLopHocPhan.php");</script>';       
?>