<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}

    include("db_conn.php");

    if(isset($_GET['delete_comp'])){  
	   $delete_id = $_GET['delete_comp'];
	   $delete_comp = "delete from company where company_id = '$delete_id'";
	   $run_delete = mysqli_query($conn,$delete_comp);
	   
	   if($run_delete){
		echo"<script>alert('Listed Company has been deleted successfully!')</script>";
		echo"<script>window.open('index.php?view_companies','_self')</script>";   
            }
    }
?>