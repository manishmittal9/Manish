<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}
?>
<form action="" method="post" class="ins_company">
    <b>Insert New Car Company : </b>
    <input type="text" name="new_company" required>
    <br><br><input type="submit" name="add_company" value="Add">
</form>
<?php
include("db_conn.php");
   
   if(isset($_POST['add_company'])){
   $new_comp = $_POST['new_company'];
   $insert_comp = "insert into company (company_name) values ('$new_comp')";
   $run_comp = mysqli_query($conn,$insert_comp);
   if($run_comp){
	   echo"<script>alert('New company has been inserted!')</script>";
	   echo"<script>window.open('index.php?view_companies','_self')</script>";
    } 
    }
?>