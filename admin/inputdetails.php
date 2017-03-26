<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}
include("db_conn.php");
?>    
    <h1 style="text-align:center;">Input Details<br></h1>
    <form method="post" action="index.php?input_details" enctype="multipart/form-data" id="form">
        <table align="center" border="1">
            <tr>
                <td align="right"><b>Select Company</b></td>
                <td>
                    <select name="car_company" required>
                        <option>Select a Company</option>
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
                <td><input type="text" name="car_name" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Ex-Showroom Price</b></td>
                <td><input type="text" name="car_price" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Fuel Economy</b></td>
                <td><input type="text" name="car_economy" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Top Speed</b></td>
                <td><input type="text" name="car_speed" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Engine Description</b></td>
                <td><input type="text" name="car_engine" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Gear Box</b></td>
                <td>
                    <select name="car_gear" required>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Seating Capacity</b></td>
                <td><input type="text" name="car_seats" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Length</b></td>
                <td><input type="text" name="car_length" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Width</b></td>
                <td><input type="text" name="car_width" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Height</b></td>
                <td><input type="text" name="car_height" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Ground Clearance</b></td>
                <td><input type="text" name="car_ground_clr" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Wheel Size</b></td>
                <td><input type="text" name="car_wheel" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Fuel Tank Capacity</b></td>
                <td><input type="text" name="car_fuel_tank" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Boot Space</b></td>
                <td><input type="text" name="car_boot" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Tags</b></td>
                <td><input type="text" name="car_tags" required> </td>
            </tr>
     
            <tr>
                <td align="right"><b>Car Image 1</b></td>
                <td><input type="file" name="car_img1" required> </td>
            </tr>
    
            <tr>
                <td align="right"><b>Car Image 2</b></td>
                <td><input type="file" name="car_img2" required> </td>
            </tr>
    
            <tr>
                <td align="right"><b>Car Image 3</b></td>
                <td><input type="file" name="car_img3" required> </td>
            </tr>
            <tr>
                <td align="right"><b>Car Image 4</b></td>
                <td><input type="file" name="car_img4"> </td>
            </tr>
            <tr>
                <td align="right"><b>Car Image 5</b></td>
                <td><input type="file" name="car_img5"> </td>
            </tr>

        </table>
        <br><input type="submit" name="input_details" value="Launch"><br><br>
    </form>
<?php

    if(isset($_POST['input_details'])) 
    {	  
	//Text data variables
        $car_company = $_POST['car_company'];
	$car_name = $_POST['car_name'];
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
	  
	$input_car = "insert into cardetails(Car_Model_Name,Car_Company,Price,Fuel_Economy,Top_Speed,Engine,Gear,Seating_Capacity,Length,Width,Height,Ground_clearance,Wheel_Size,Fuel_Tank_Capacity,Boot_Space,Tags,Image_1,Image_2,Image_3,Image_4,Image_5) values('$car_name','$car_company','$car_price','$car_economy','$car_speed','$car_engine','$car_gear','$car_seats','$car_length','$car_width','$car_height','$car_ground_clr','$car_wheel','$car_fuel_tank','$car_boot','$car_tags','$car_img1','$car_img2','$car_img3','$car_img4','$car_img5')";
	$run_car = mysqli_query($conn,$input_car);
	  
	if($run_car){
            echo"<script>alert('Car Data Input Successfully!')</script>"; 
            echo"<script>window.open('index.php?input_details','_self')</script>";
	}
	  
    }

?>