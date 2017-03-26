<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}
include("db_conn.php");

    if(isset($_GET['edit_comp'])){
	$comp_id = $_GET['edit_comp'];
	$get_comp = "select * from company where company_id = '$comp_id'";
	$run_comp = mysqli_query($conn,$get_comp);
	$row_comp = mysqli_fetch_array($run_comp);
	$company_id = $row_comp['company_id'];
	$company_name = $row_comp['company_name'];
    }
?>
<form action="" method="post" class="ins_company">
    <b>Edit and Update Company:</b>
    <input type="text" name="new_comp" value="<?php echo $company_name; ?>">
    <br><br><input type="submit" name="update_comp" value="Update">
</form>
<?php 
   if(isset($_POST['update_comp'])){
   $update_id = $comp_id;
   $new_comp = $_POST['new_comp'];
   $update_comp = "Update company set company_name = '$new_comp' where company_id = '$update_id'";
   $run_comp = mysqli_query($conn,$update_comp);
   if($run_comp){
	   echo"<script>alert('Company has been updated!')</script>";
	   echo"<script>window.open('index.php?view_companies','_self')</script>";
    } 
   }
?>