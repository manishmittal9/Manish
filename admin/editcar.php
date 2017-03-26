<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}
include("db_conn.php");
if(isset($_GET['edit_car'])){
	$get_name = $_GET['edit_car'];
	$get_car = "select * from cardetails where Car_Model_Name = '$get_name'";
	$run_car = mysqli_query($conn,$get_car);
	$i = 0;
	$row_car = mysqli_fetch_array($run_car);
        $car_company = $row_car['Car_Company'];
        $get_comp = "select * from company where company_id = '$car_company'";
        $run_comp = mysqli_query($conn,$get_comp);
        $row_comp = mysqli_fetch_array($run_comp);
	$company_name = $row_comp['company_name'];
	$car_name = $row_car['Car_Model_Name'];
	$car_price = $row_car['Price'];
	$car_economy = $row_car['Fuel_Economy'];
	$car_speed = $row_car['Top_Speed'];
	$car_engine = $row_car['Engine'];
        $car_gear = $row_car['Gear'];
        $car_seats = $row_car['Seating_capacity'];
        $car_length = $row_car['Length'];
        $car_width = $row_car['Width'];
        $car_height = $row_car['Height'];
        $car_ground_clr = $row_car['Ground_clearance'];
        $car_wheel = $row_car['Wheel_Size'];
        $car_fuel_tank = $row_car['Fuel_Tank_Capacity'];
        $car_boot = $row_car['Boot_Space'];
	$car_tags = $row_car['Tags'];
        $car_img1 = $row_car['Image_1'];
        $car_img2 = $row_car['Image_2'];
        $car_img3 = $row_car['Image_3'];
        $car_img4 = $row_car['Image_4'];
        $car_img5 = $row_car['Image_5'];		
    }
?>
<h1 style="text-align: center;">Edit and Update Listed Cars</h1>
    <form method="post" action="" enctype="multipart/form-data" id="form">
        <table width="95%" align="center" border="1">
            <tr>
                <td align="right"><b>Select Company</b></td>
                <td>
                    <select name="car_company" required>
                        <option disabled><?php echo $company_name; ?></option>
                        <?php
                            $get_comp = "select * from company";
                            $run_comp = mysqli_query($conn,$get_comp);
			
                            while($row_comp = mysqli_fetch_array($run_comp))  {
				$company_id = $row_comp['company_id'];
				$company_name = $row_comp['company_name'];
                                echo"<option value = '$company_id'>$company_name</option>";
                            }
			?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Car Model Name</b></td>
                <td><input type="text" name="car_name" value="<?php echo $car_name; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Ex-Showroom Price</b></td>
                <td><input type="text" name="car_price" value="<?php echo $car_price; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Fuel Economy</b></td>
                <td><input type="text" name="car_economy" value="<?php echo $car_economy; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Top Speed</b></td>
                <td><input type="text" name="car_speed" value="<?php echo $car_speed; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Engine Description</b></td>
                <td><input type="text" name="car_engine" value="<?php echo $car_engine; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Gear Box</b></td>
                <td>
                    <select name="car_gear" required>
                        <option disabled><?php echo $car_gear; ?></option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Seating Capacity</b></td>
                <td><input type="text" name="car_seats" value="<?php echo $car_seats; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Length</b></td>
                <td><input type="text" name="car_length" value="<?php echo $car_length; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Width</b></td>
                <td><input type="text" name="car_width" value="<?php echo $car_width; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Height</b></td>
                <td><input type="text" name="car_height" value="<?php echo $car_height; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Ground Clearance</b></td>
                <td><input type="text" name="car_ground_clr" value="<?php echo $car_ground_clr; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Wheel Size</b></td>
                <td><input type="text" name="car_wheel" value="<?php echo $car_wheel; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Fuel Tank Capacity</b></td>
                <td><input type="text" name="car_fuel_tank" value="<?php echo $car_fuel_tank; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Boot Space</b></td>
                <td><input type="text" name="car_boot" value="<?php echo $car_boot; ?>" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Tags</b></td>
                <td><input type="text" name="car_tags" value="<?php echo $car_tags; ?>" required> </td>
            </tr>
     
            <tr>
                <td align="right"><b>Car Image 1</b></td>
                <td><input type="file" name="car_img1" required><img src="../images/img1/<?php echo $car_img1; ?>" width="60" height="60"></td>
            </tr>
    
            <tr>
                <td align="right"><b>Car Image 2</b></td>
                <td><input type="file" name="car_img2" required><img src="../images/<?php echo $car_img2; ?>" width="60" height="60"> </td>
            </tr>
    
            <tr>
                <td align="right"><b>Car Image 3</b></td>
                <td><input type="file" name="car_img3" required><img src="../images/<?php echo $car_img3; ?>" width="60" height="60"> </td>
            </tr>
            <tr>
                <td align="right"><b>Car Image 4</b></td>
                <td><input type="file" name="car_img4"><img src="../images/<?php echo $car_img4; ?>" width="60" height="60"> </td>
            </tr>
            <tr>
                <td align="right"><b>Car Image 5</b></td>
                <td><input type="file" name="car_img5"><img src="../images/<?php echo $car_img5; ?>" width="60" height="60"> </td>
            </tr>
        </table>
    <br><input type="submit" name="update_details" value="Launch"><br><br>
</form>

<?php

  if(isset($_POST['update_details'])) {
	  
        //Text data variables
        $car_company = $_POST['car_company'];
	$car_name2 = $_POST['car_name'];
	$car_price = $_POST['car_price'];
	$car_economy = $_POST['car_economy'];
	$car_speed = $_POST['car_speed'];
	$car_engine = $_POST['car_engine'];
        $car_gear = $_POST['car_gear'];
        $car_seats = $_POST['car_seats'];
        $car_length = $_POST['car_length'];
        $car_width = $_POST['car_width'];
        $car_height = $_POST['car_height'];
        $car_ground_clr = $_POST['car_ground_clr'];
        $car_wheel = $_POST['car_wheel'];
        $car_fuel_tank = $_POST['car_fuel_tank'];
        $car_boot = $_POST['car_boot'];
	$car_tags = $_POST['car_tags'];
	  
	//Image names
	$car_img1 = $_FILES['car_img1']['name'];
	$car_img2 = $_FILES['car_img2']['name'];
        $car_img3 = $_FILES['car_img3']['name'];
	$car_img4 = $_FILES['car_img4']['name'];
        $car_img5 = $_FILES['car_img5']['name'];
	    
	//Image Temporary names
	$temp_name1 = $_FILES['car_img1']['tmp_name'];
	$temp_name2 = $_FILES['car_img2']['tmp_name'];
	$temp_name3 = $_FILES['car_img3']['tmp_name'];
        $temp_name4 = $_FILES['car_img4']['tmp_name'];
        $temp_name5 = $_FILES['car_img5']['tmp_name'];
	 
	//Uploading images to its folder
	move_uploaded_file($temp_name1,"../images/img1/$car_img1");
	move_uploaded_file($temp_name2,"../images/$car_img2");
	move_uploaded_file($temp_name3,"../images/$car_img3");
	move_uploaded_file($temp_name4,"../images/$car_img4");
	move_uploaded_file($temp_name5,"../images/$car_img5");
	  
	$update_car = "update cardetails set Car_Model_Name='$car_name2',Car_Company='$car_company',Price='$car_price',Fuel_Economy='$car_economy',Top_Speed='$car_speed',Engine='$car_engine',Gear='$car_gear',Seating_capacity='$car_seats',Length='$car_length',Width='$car_width',Height='$car_height',Ground_clearance='$car_ground_clr',Wheel_Size='$car_wheel',Fuel_Tank_Capacity='$car_fuel_tank',Boot_Space='$car_boot',Tags='$car_tags',Image_1='$car_img1',Image_2='$car_img2',Image_3='$car_img3',Image_4='$car_img4',Image_5='$car_img5' where Car_Model_Name='$car_name'";
	echo $update_car;
        $run_update_car = mysqli_query($conn,$update_car);
        echo $run_update_car;
	  
	  if($run_update_car){
		  echo"<script>alert('Car Details updated successfully!')</script>"; 
		  echo"<script>window.open('index.php?view_cars','_self')</script>";
            }else{
                echo"<script>alert('Error')</script>";
            }
	  
	  }
          mysqli_close($conn);

?>
