<?php
session_start();
include ("db_conn.php");

if(isset($_SESSION['user'])!="")
{
    header("Location: index.php");
}
if(isset($_POST['l-submit']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $sel = "SELECT * FROM users WHERE userEmail='$email'";
    $res = mysqli_query($conn,$sel);
    $row = mysqli_fetch_array($res);
    if($row['userPass']== md5($pass))
    {
        $_SESSION['user'] = $row['userName'];
        $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        echo "<script>window.location.href = '$httpReferer';</script>";
        
    }
    else
    {
        $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        echo "<script>alert('Incorrect Email or Password');";
        echo "window.location.href = '$httpReferer';</script>";
    }

}
?>