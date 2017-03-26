 <?php 
 include("db_conn.php");
 include("header.php");
    $company = $_POST['company_id'];
    $a= array();
    $i=0;
    $sel = "SELECT * FROM mapdata where company_id = '$company'";
    $sql= mysqli_query($conn,$sel);
    $sel2 = "Select * from company where company_id = '$company' ";
    $run = mysqli_query($conn,$sel2);
    $row2 = mysqli_fetch_assoc($run);
    $company2 = $row2['company_name'];
    echo $company2;

    while($row =mysqli_fetch_array($sql)){
      $b=array();

      $b[]=$row["address"];
      $b[]=$row["lattitude"];
      $b[]=$row["longitude"];
      $b[]=$row["id"];
      $b[]=$row["name"];        
         $a[$i]=$b;
        $i++;
    
    }
  ?>
<div style="width: 90%; margin-left: 5%;height: 800px; margin-top: 7%;">
    <div style="float: left;display: inline; width:40%;">
        <h1 class="name"><?php echo $company2; ?> Dealership</h1><br>
        <p style="width: 50%; text-align: center;margin-left: 25%;"><?php
                $j = 0;
              foreach ($a as $x){
                  echo "<b>".$a[$j][4]."</b><br>".$a[$j][0]."<br><br><br>";
                  $j++;
              }
        ?>
        </p>
    </div>
    <div id="map" style="height: 400px; width: 60%; float: right; margin-top: 150px;"> </div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA7IZt-36CgqSGDFK8pChUdQXFyKIhpMBY&sensor=true" type="text/javascript"></script>
<script type="text/javascript">
   var locations = <?php echo json_encode($a);?>;
   var map = new google.maps.Map(document.getElementById('map'), {
       zoom: 12,
       center: new google.maps.LatLng(28.6402096, 77.1146851),
       mapTypeId: google.maps.MapTypeId.ROADMAP
   });

   var infowindow = new google.maps.InfoWindow();
   var image = 'assets/marker.png';

   var marker, i;

   for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      offset: '0',
      icon: image,
      title: locations[i][4],
      map: map
   });

   google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][4]);
        infowindow.open(map, marker);
        }
      })(marker, i));
   } 

  </script> 
  <?php 
    include("footer.php");
    mysqli_close($conn); 
  ?>
