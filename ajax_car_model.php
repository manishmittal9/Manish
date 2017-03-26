<?php
include('db_conn.php');
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $sql = "select Car_Model_Name from cardetails where Car_Company='$id'";
    $run = mysqli_query($conn,$sql);
    echo '<option value="">Select Car</option>';
    while($row = mysqli_fetch_array($run))
    {
        $car_name = $row['Car_Model_Name'];
        echo "<option value='$car_name'>$car_name</option>";
    }
}
?>