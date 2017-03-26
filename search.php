<?php
include("db_conn.php");
include('header.php');
    $search_text = $_POST['search-car'];
    $search = preg_replace("#[^0-9a-z]#i","", $search_text);
    $query = "select * from cardetails where Tags like '%$search%'"; 
    $run = mysqli_query($conn,$query);
    ?>
    <div class="car_by_brand">
    <h1>Search Results for '<?php echo $search;?>'</h1>
    <ul class="rig columns-4">
        <?php
            if(mysqli_num_rows($run)===0){
                $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
                echo "<script>alert('Sorry! No results found');";
                echo "window.location.href = '$httpReferer';</script>";
                die();
            }else{
            while($row = mysqli_fetch_array($run)){
                $car_name = $row['Car_Model_Name'];
                $car_company = $row['Car_Company'];
                $car_image = $row['Image_1'];
                $sel2 = "select company_name from company where company_id = '$car_company'";
                $run2 = mysqli_query($conn,$sel2);
                $row2 = mysqli_fetch_assoc($run2);
                $company = $row2['company_name'];
                echo $car_name;
                echo "<li><a href='details.php?car_company=$car_company&car_name=$car_name'><img src='images/img1/$car_image'><p class='car_name'>$company &nbsp; $car_name</p></a></li>";
            }
            }
        ?>
</ul>
</div>
<?php
mysqli_close($conn);
include('footer.php');
?>