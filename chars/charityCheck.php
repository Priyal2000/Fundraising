<?php
require_once "connect.php";
if($_POST['fileToUpload']!=NULL)
{
  $target_dir = "chars/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  $cover=$target_file;
  }
}
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
