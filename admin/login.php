<?php
session_start();
include ("db_conn.php");

if(isset($_SESSION['logged'])!="")
{
 header("Location: index.php");
}

if(isset($_POST['btn-login']))
{
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $pass = mysqli_real_escape_string($conn,$_POST['password']);
 $sel = "SELECT * FROM admin WHERE email='$email'";
 $res = mysqli_query($conn,$sel);
 $row = mysqli_fetch_array($res);
 if($row['password']== $pass)
 {
  $_SESSION['logged'] = "true";
  header("Location: index.php");
 }
 else
 {
    echo "<script>alert('Incorrect Email or Password')</script>";
 }

}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Car Park Lane</title>
<link rel="stylesheet" href="style2.css" type="text/css">
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Your Password" required></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>