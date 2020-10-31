<?php
require_once "connect.php";

if (($_FILES['fileToUpload']['name']!="")){
// Where the file is going to be stored
 $target_dir = "chars/";
 $file = $_FILES['fileToUpload']['name'];
 $path = pathinfo($file);
 $filename = $path['filename'];
 $ext = $path['extension'];
 $temp_name = $_FILES['fileToUpload']['tmp_name'];
 $path_filename_ext = $target_dir.$filename.".".$ext;
 
// Check if file already exists
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
 echo "Congratulations! File Uploaded Successfully.";
 }
$cover=$path_filename_ext;
}

$founder=$_POST['founder'];
$name=$_POST['c_name'];
$purpose=$_POST['c_purpose'];
$id=NULL;
$query="insert into raise(`founder`,`name`,`purpose`,`cover`,`id`) values('$founder','$name','$purpose','$cover','$id')";
if($_POST['submit']=="add")
{
  $query="INSERT INTO `charities`(`id`, `name`, `purpose`, `founder`, `cover`) VALUES ('$id','$name','$purpose','$founder','$cover')";
  $result=mysqli_query($link,$query);
  if (!$result) {
    echo "error";
    die();
  }
  $_SESSION['success']='added';
  header("location: addCharity.php");
}
else
{
  $result=mysqli_query($link,$query);
  if (!$result) {
    echo "Charity name is already taken try using another name";
    die();
  }
  $_SESSION['success']='added';
  header("location: raisefund.php");
}
?>
