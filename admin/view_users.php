<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}
?>
<h2 style="text-align: center;">All Registered Users</h2>
<table width="95%" align="center" class="viewcar" border="1">
    <tr align="center">
        <th>User Id</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>User Status</th>
        <th>Delete</th>
    </tr>
    <?php
        include("db_conn.php");
	$get_user = "select * from users";
	$run_user = mysqli_query($conn,$get_user);
	$i = 0;
	while($row_user = mysqli_fetch_array($run_user)){
                $user_id = $row_user['userID'];
                $user_name = $row_user['userName'];
		$user_email = $row_user['userEmail'];
		$user_pass = $row_user['userPass'];
                $user_status = $row_user['userStatus'];
		$i++;
		  
   ?>
   <tr align="center">
      <td><?php echo $user_id; ?></td>
      <td><?php echo $user_name; ?></td>
      <td><?php echo $user_email;?></td>
      <td><?php echo $user_pass; ?></td>
      <td><?php echo $user_status; ?></td>
      <td><a href="deleteuser.php?delete_user=<?php echo $user_id; ?>">Delete</a></td>
   </tr>
   <?php } ?>
</table>
