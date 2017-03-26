<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}

   include("db_conn.php");

   if(isset($_GET['delete_car'])){
	   
            $delete_name = $_GET['delete_car'];
            $delete_car = "delete from cardetails where Car_Model_Name = '$delete_name'";
            $run_delete = mysqli_query($conn,$delete_car);
	   
            if($run_delete){
		   echo"<script>alert('Car Listing has been deleted successfully!')</script>";
		   echo"<script>window.open('index.php?view_cars','_self')</script>";
            }
    }
    mysqli_close($conn);
?>