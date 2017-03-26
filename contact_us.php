<?php
include("header.php");
?>
<div class="contact">
    <div class="left">
        <h2>LET US CONTACT YOU</h2>
        <form method="post">
            <label>Full Name</label>
            <input type="text" name="name" required><br><br>
            <label>E-mail</label>
            <input type="email" name="email" required><br><br>
            <label>Mobile No.</label>
            <input type="text" name="mobile" required><br><br>
            <label>Comment</label>
            <textarea name="comment" rows="6" cols="58"></textarea><br><br>
            <input type="submit" name="submit">
        </form>
    </div>
    <div class="right">
        <h2 style="text-align: center;">CONTACT US</h2>
        <div style="border: 1px solid black; padding: 3%; border-radius: 4px;">
            <p class="detail-title">CALL US</p>
            <p class="detail">+91-9654-912-249</p>
        </div><br>
        <div style="border: 1px solid black;padding: 3%; border-radius: 4px;">
            <p class="detail-title">EMAIL</p>
            <p class="detail">carparklane1@gmail.com</p>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    include('db_conn.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $comment = $_POST['comment'];
    
    $sql = "insert into contact(name,email,mob_number,comment) values('$name','$email','$mobile','$comment')";
    $ins = mysqli_query($conn,$sql);
    
    if($ins){
        echo "<script>alert('Thank You for your details. We will get in touch soon.');</script>";
    }else{
        echo "<script>alert('Some error occured. Please try again.');<script>";
    }

 mysqli_close($conn);
}
 include("footer.php"); ?>
