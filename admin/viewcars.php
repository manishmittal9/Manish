
<h2 style="text-align: center;">All Listed Cars</h2>
<table width="95%" align="center" class="viewcar" border="1">
    <tr align="center">
        <th>No.</th>
        <th>Car Model Name</th>
        <th>Car Company</th>
        <th>Price</th>
        <th>Top Speed</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
        include("db_conn.php");
	$get_car = "select * from cardetails";
	$run_car = mysqli_query($conn,$get_car);
	$i = 0;
	while($row_car = mysqli_fetch_array($run_car)){
		$car_name = $row_car['Car_Model_Name'];
		$car_company = $row_car['Car_Company'];
		$car_price = $row_car['Price'];
		$car_speed = $row_car['Top_Speed'];
		$i++;
		  
   ?>
   <tr align="center">
      <td><?php echo $i; ?></td>
      <td><?php echo $car_name; ?></td>
      <td><?php echo $car_company;?></td>
      <td><?php echo $car_price; ?></td>
      <td><?php echo $car_speed; ?></td>
      <td><a href="index.php?edit_car=<?php echo $car_name;?>">Edit</a></td>
      <td><a href="deletecar.php?delete_car=<?php echo $car_name; ?>">Delete</a></td>
   </tr>
   <?php } ?>
</table>