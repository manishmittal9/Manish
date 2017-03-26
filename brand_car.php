<?php
include("db_conn.php");
include("header.php");
$company_id = $_GET['company_id'];
$sel = "select * from cardetails where Car_Company = '$company_id'";
$run = mysqli_query($conn,$sel);
$sel2 = "select company_name from company where company_id = '$company_id'";
$run2 = mysqli_query($conn,$sel2);
$row2 = mysqli_fetch_assoc($run2);
$company = $row2['company_name'];
?>
<div class="car_by_brand">
    <h1><?php echo $company; ?></h1>
    <ul class="rig columns-4">
        <?php
            while($row = mysqli_fetch_array($run)){
                $car_name = $row['Car_Model_Name'];
                $car_company = $row['Car_Company'];
                $car_image = $row['Image_1'];
                echo $car_name;
                echo "<li><a href='details.php?car_company=$car_company&car_name=$car_name'><img src='images/img1/$car_image'><p class='car_name'>$company &nbsp; $car_name</p></a></li>";
            }
?>
</ul>
</div>
<?php 
 mysqli_close($conn);
 include("footer.php");
 ?>