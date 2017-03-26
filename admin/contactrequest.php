<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}
?>
<h2 style="text-align: center;">Contact Requests</h2>
<table width="95%" align="center" class="viewcar" border="1">
    <tr align="center">
        <th>No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>User Comments</th>
        <th>Delete</th>
    </tr>
    <?php
        include("db_conn.php");
	$get_req = "select * from contact";
	$run_req = mysqli_query($conn,$get_req);
	$i = 0;
	while($row_req = mysqli_fetch_array($run_req)){
                $name = $row_req['name'];
		$email = $row_req['email'];
		$mobile = $row_req['mob_number'];
                $comment = $row_req['comment'];
		$i++;
		  
   ?>
   <tr align="center">
      <td><?php echo $i; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo $email;?></td>
      <td><?php echo $mobile; ?></td>
      <td><?php echo $comment; ?></td>
      <td><a href="deletereq.php?delete_req=<?php echo $name; ?>">Delete</a></td>
   </tr>
   <?php } 
   mysqli_close($conn); ?>
</table>


