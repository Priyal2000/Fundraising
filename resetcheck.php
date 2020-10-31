<?php
require_once 'connect.php';

if(isset($_POST['username1']))
{
    $username = trim($_POST['username1']);
    $phone = trim($_POST['phno']);
    $pass="hello0909";
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $query = "Select * from `users` where u_name= '$username' AND phno= '$phone'";
    $result = mysqli_query($link, $query);
    $numRows = mysqli_num_rows($result);
    if($numRows==0){
        $_SESSION['invalid']="invalid";
        header('Location: login.php');
    }
    else if($numRows==1)
    {
        $row = mysqli_fetch_assoc($result);
        $query1= "UPDATE users SET u_pass = '$hash' WHERE u_name = '$username' AND phno= '$phone'";
        $result1 = mysqli_query($link, $query1);
        $_SESSION['user1']=$row['u_name'];
        header('Location: charity.php');
    }
    else
        echo 'Don\'t mess with me';
}

?>