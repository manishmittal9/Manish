<?php
include("db_conn.php");
include ("header.php");
        $car_company = $_GET['car_company'];
        $car_model = $_GET['car_name'];
        $sel = "select company_name from company where company_id = '$car_company'";
        $run = mysqli_query($conn,$sel);
        $row = mysqli_fetch_assoc($run);
        $company = $row['company_name'];
        $get_car = "select * from cardetails where Car_Model_Name = '$car_model'";
	$run_car = mysqli_query($conn,$get_car);
	$row_car = mysqli_fetch_array($run_car);
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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Car Park Lane</title>
        <style>
            table {
                border-collapse: collapse;
                width: 75%;
                margin-bottom: 5%;
            }
            tr {
                height: 50px;
            }
            tr:hover {
                background-color: #f5f5f5;
            }
            td{
                padding: 10px;
                text-align:center;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="image-viewer.css">
    </head>
    <body>
        <div class="name">
            <h1><?php echo $company." ".$car_model; ?></h1>
        </div>
        <div class="container">
                <ul class="thumbnails">
                    <li>
                        <input type="radio" name="select" id="image1" checked>
                            <div class="item-hugger">
                                <img class="thumb-image" src="images/img1/<?php echo $car_img1;?>" alt="<?php echo $car_name;?>">
                                    <label for="image1"></label>
                            </div>
                            <div class="content">
                                <div class="item-wrapper"><img src="images/img1/<?php echo $car_img1;?>" alt="<?php echo $car_name;?>">
                                </div>
                            </div>
                    </li>
                    <li>
                        <input type="radio" name="select" id="image2">
                            <div class="item-hugger">
                                <img class="thumb-image" src="images/<?php echo $car_img2;?>" alt="<?php echo $car_name;?>">
                                    <label for="image2"></label>
                            </div>
                            <div class="content">
                                <div class="item-wrapper"> <img src="images/<?php echo $car_img2;?>" alt="<?php echo $car_name;?>">
                                </div>
                            </div>
                    </li>
                    <li>
                        <input type="radio" name="select" id="image3">
                            <div class="item-hugger">
                                <img class="thumb-image" src="images/<?php echo $car_img3;?>" alt="<?php echo $car_name;?>">
                                <label for="image3"></label>
                            </div>
                        <div class="content">
                            <div class="item-wrapper"> <img src="images/<?php echo $car_img3;?>" alt="<?php echo $car_name;?>">
                            </div>
                        </div>
                    </li>
                    <li>
                        <input type="radio" name="select" id="image4">
                        <div class="item-hugger">
                            <img class="thumb-image" src="images/<?php echo $car_img4;?>" alt="<?php echo $car_name;?>">
                            <label for="image4"></label>
                        </div>
                    <div class="content">
                        <div class="item-wrapper"> <img src="images/<?php echo $car_img4;?>" alt="<?php echo $car_name;?>">
                        </div>
                    </div>
                    </li>
            </ul>
        </div>
        <h2 style="margin-left: 12.5%; font-family: Arial;"><b>Specifications</b></h2>
        <table align="center" border="1"> 
            <tr>
                <td align="right" width="50%"><b>Car Company</b></td>
                <td><?php echo $company; ?></td>
            </tr>
            <tr>
                <td><b>Car Model Name</b></td>
                <td><?php echo $car_name; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Ex-Showroom Price</b></td>
                <td><?php echo $car_price; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Fuel Economy</b></td>
                <td><?php echo $car_economy; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Top Speed</b></td>
                <td><?php echo $car_speed; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Engine Description</b></td>
                <td><?php echo $car_engine; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Gear Box</b></td>
                <td><?php echo $car_gear; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Seating Capacity</b></td>
                <td><?php echo $car_seats; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Length</b></td>
                <td><?php echo $car_length; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Width</b></td>
                <td><?php echo $car_width; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Height</b></td>
                <td><?php echo $car_height; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Ground Clearance</b></td>
                <td><?php echo $car_ground_clr; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Wheel Size</b></td>
                <td><?php echo $car_wheel; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Fuel Tank Capacity</b></td>
                <td><?php echo $car_fuel_tank; ?></td>
            </tr>
            <tr>
                <td align="right"><b>Boot Space</b></td>
                <td><?php echo $car_boot; ?></td>
            </tr>
     <!--
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
     -->

        </table>
<?php include("footer.php"); ?>
