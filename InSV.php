<?php
        $host = 'localhost';
        $user_host = 'root';
   
        $conn=mysqli_connect("localhost", "root", "", "du_an_cong_thong_tin_sinh_vien_khoa_cntt") or die("can't connect");

$filename = "danhsachsinhvien.xls"; // File Name

// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd-ms-excel");
?>
<table id="bangthongtin">
    <tr class="hang1">
        <th style="text-align: center;">STT</th>
        <th style="text-align: center;">Mã sinh viên</th>
        <th style="text-align: center;">Họ tên</th>
        <th style="text-align: center;">Ngày sinh</th>
        <th style="text-align: center;">Giới tính</th>
        <th style="text-align: center;">Dân tộc</th>
        <th style="text-align: center;">Số CMND</th>
        <th style="text-align: center;">Tôn Giáo</th>
        <th style="text-align: center;">Quê quán</th>
        <th style="text-align: center;">SĐT</th>
        <th style="text-align: center;">Email</th>
        <th style="text-align: center;">Chức vụ</th>
        <th style="text-align: center;">Mã lớp</th>
        <th style="text-align: center;">Tình tạng học</th>
        <th style="text-align: center;">Mật khẩu</th>
        <th style="text-align: center;">Job</th>
    </tr>
</table>
<tbody>
    <?php 
                                $sn = 1;
                                $user_qry = "SELECT * from sinh_vien";
                                $user_res = mysqli_query($conn, $user_qry);
                                while($user_data = mysqli_fetch_assoc($user_res))
                                {
                                ?>
    <table>
        <tr>
            <td><?php echo $sn; ?> </td>
            <td><?php echo $user_data['MaSinhVien']; ?> </td>
            <td><?php echo $user_data['HoTen']; ?> </td>
            <td><?php echo $user_data['NgaySinh']; ?> </td>
            <td><?php echo $user_data['GioiTinh']; ?> </td>
            <td><?php echo $user_data['DanToc']; ?> </td>
            <td><?php echo $user_data['SoCMND']; ?> </td>
            <td><?php echo $user_data['TonGiao']; ?> </td>
            <td><?php echo $user_data['QueQuan']; ?> </td>
            <td><?php echo $user_data['SDT']; ?> </td>
            <td><?php echo $user_data['Email']; ?> </td>
            <td><?php echo $user_data['ChucVu']; ?> </td>
            <td><?php echo $user_data['MaLop']; ?> </td>
            <td><?php echo $user_data['TinhTrangHoc']; ?> </td>
            <td><?php echo $user_data['MatKhau']; ?> </td>
            <td><?php echo $user_data['Job']; ?> </td>
        </tr>
    </table>
    <?php
                                $sn ++;
                                }
                                ?>
</tbody>