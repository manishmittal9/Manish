<?php
session_start();
include("db_conn.php");

if(isset($_SESSION['user'])!="")
{
 header("Location: index.php");
}

if(isset($_POST['r-submit']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5(mysqli_real_escape_string($conn,$_POST['password']));
 
    $ins = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$pass')";
    $res = mysqli_query($conn,$ins);
    if($res)
    {   $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        echo "<script>alert('Successfully registered ');";
        echo "window.location.href = '$httpReferer';</script>";
    }
    else
    {
        $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        echo "<script>alert('This email already exists!');";
        echo "window.location.href = '$httpReferer';</script>";
 }
}
?>