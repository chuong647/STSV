<?php
    $key = $_GET['ma'];
     $kn1 = mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die ("chưa kết nối");
     $sql1="delete from sinh_vien where MaSinhVien = '".$key."'";
     $kq3 = mysqli_query($kn1, $sql1);
     echo "<script>alert('Xóa thành công');</script>";   
     echo'<script>window.location.replace("http://localhost/STSV/QuanLySinhVien.php");</script>';         
?>