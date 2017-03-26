<?php
    include("db_conn.php");
    include("header.php");
?>
        <div class="main_wrapper">
            <div id="left">
                <h1 style="text-align: center; color: white; font-size: 43px;padding: 0 5px;">FIND A CAR BY BRAND</h1>
                <form action="details.php" method="get" id="input">
                    <p>
                    <select name="car_company" id="company" required="required">
                        <option>Select Company</option>
                        <?php
                            $get_comp = "select * from company";
                            $run_comp = mysqli_query($conn,$get_comp);			
                            while($row_comp = mysqli_fetch_array($run_comp)){
                                $company_id = $row_comp['company_id'];
                                $company_name = $row_comp['company_name'];
                                echo "<option value = '$company_id'>$company_name</option>";
                            }
                        ?>
                    </select>
                    </p>
                    <p>
                        <select name="car_name" id="car_model" required="required">
                            <option selected="selected" value="">Select Car</option>
                        </select>
                    </p>
                    <button type="submit">Launch</button>
                </form>
            </div>
            <div id="right">
                <ul class="rig columns-5">
                    <?php
                        $get_car = "select * from cardetails order by rand() LIMIT 25";
                        $run_car = mysqli_query($conn,$get_car);
                        while($row_cars = mysqli_fetch_array($run_car)){
                            $car_name = $row_cars['Car_Model_Name'];
                            $car_company = $row_cars['Car_Company'];
                            $car_image = $row_cars['Image_1'];
                            echo "<li><a href='details.php?car_company=$car_company&car_name=$car_name'><img src='images/img1/$car_image'></a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
<!-- Popular brand start here -->
<div class="brand">
  <div class="mainbox">
    <ul id="ourbrands">
    
      <li><a class="brandlogos" href="brand_car.php?company_id=4" title="Maruti cars">Maruti</a></li>
    
      <li><a class="brandlogos" href="brand_car.php?company_id=5" title="Hyundai cars">Hyundai</a></li>
    
      <li><a class="brandlogos" href="brand_car.php?company_id=3" title="Honda cars">Honda</a></li>
    
      <li><a class="brandlogos" href="brand_car.php?company_id=1" title="Audi cars">Audi</a></li>
    
      <li><a class="brandlogos" href="brand_car.php?company_id=2" title="Bmw cars">BMW</a></li>  
      
      <li><a class="brandlogos" href="brand_car.php?company_id=6" title="Volkswagen cars">Volkswagen</a></li>
    </ul>
  </div>
</div>
<!-- Popular brand end here -->
<div class="dealership">
        <div class="mainbox-2">
            <h2>LOCATE DEALERSHIP</h2>
            <form action="dealer-map.php" method="post" class="dealership-form">
            <p>
            <select name="company_id" required>
                        <option>Select Company</option>
                        <?php
                            $get_comp = "select * from company";
                            $run_comp = mysqli_query($conn,$get_comp);			
                            while($row_comp = mysqli_fetch_array($run_comp)){
                                $company_id = $row_comp['company_id'];
                                $company_name = $row_comp['company_name'];
                                echo "<option value = '$company_id'>$company_name</option>";
                            }
                        ?>
                    </select>
                    </p>
                    <p>
                        <select name="car_deal_loc" id="car_dealer_loc" required="required">
                            <option selected="selected" value="">Select Location</option>
                            <option>Delhi</option>
                        </select>
                    </p>
                    <button type="submit" id="submit">Find</button>
                </form>
            </div>
            
        </div>    
       <?php include("footer.php"); ?>


