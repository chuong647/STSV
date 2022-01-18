<html>
<head>
</head>
<body>
<form action="xl_upload.php" method=POST enctype="multipart/form-data" >
chon file: <input type="file" name="file"/><br>
<input type="submit" value="Tai len" name="ok"/>
</form>
</body>
</html>

file xl_upload.php

<?php
if(isset($_POST["ok"])) //kiem tra xem nguoi xu dung da bam vao nut "tai len" hay chua
{
if($_FILES["file"]["name"]!=NULL)
{

if($_FILES["file"]["type"]=="image/jpeg"
||$_FILES["file"]["type"]=="image/png"
||$_FILES["file"]["type"]=="image/gif"
)
{
if($_FILES["file"]["size"]>1048576)
{
echo "file quá nang";
}

// kiem tra su ton tai cua file
elseif (file_exists("" . $_FILES["file"]["name"])) 
{
echo $_FILES["file"]["name"]." file da ton tai. ";
}

else{

$path = ""; // file luu vào thu muc chua file upload
$tmp_name = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$type = $_FILES['file']['type']; 
$size = $_FILES['file']['size']; 
// Upload file
move_uploaded_file($tmp_name,$path.$name);
echo "File uploaded! <br />";
echo "Tên file : ".$name."<br />";
echo "Kieu file : ".$type."<br />";
echo "File size : ".$size;
}
}
else {
echo "file duoc chon khong hop le";
}
}
else 
{
echo "vui long chon file";
}
}

?>