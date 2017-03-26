<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}
?>
<h2 style="text-align: center;">All Listed Companies</h2>
<table width="95%" align="center" class="viewcar" border="1">
   <tr align="center">
      <th>Company Id</th>
      <th>Company Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
      include("db_conn.php");
	  $get_comp = "select * from company";
	  $run_comp = mysqli_query($conn,$get_comp);
	  $i = 0;
	  while($row_comp = mysqli_fetch_array($run_comp)){
		  $comp_id = $row_comp['company_id'];
		  $comp_name = $row_comp['company_name'];
		  $i++;
    ?>
    <tr align="center">
        <td><?php echo $comp_id; ?></td>
        <td><?php echo $comp_name; ?></td>
        <td><a href="index.php?edit_comp=<?php echo $comp_id;?>">Edit</a></td>
        <td><a href="deletecompany.php?delete_comp=<?php echo $comp_id; ?>">Delete</a></td>
   </tr>
   <?php } ?>
</table>