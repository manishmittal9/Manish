<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}

   include("db_conn.php");

   if(isset($_GET['delete_user'])){
	   
            $delete_id = $_GET['delete_user'];
            $delete_user = "delete from users where userID = '$delete_id'";
            $run_delete = mysqli_query($conn,$delete_user);
	   
            if($run_delete){
		   echo"<script>alert('User has been deleted successfully!')</script>";
		   echo"<script>window.open('index.php?view_users','_self')</script>";
            }
    }
    mysqli_close($conn);
?>