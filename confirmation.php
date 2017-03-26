<?php
include('db_conn.php');
$passkey = $_GET['passkey'];
$sql = "UPDATE users SET tokenCode=NULL,userStatus='Y' WHERE tokenCode='$passkey'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
if($result)
{
    echo "<script>alert('Your account is now active.Please Log In to continue.')</script>";
}
else
{
    echo "<script>alert('Some Error Occured')</script>";
}
mysqli_close($conn);
?>