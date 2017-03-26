<footer>
    <div class="left">
        <a href="about_us.php">ABOUT US</a><br><br>
        <a href="contact_us.php">CONTACT US</a><br><br>
        <h3>&copy; CAR PARK LANE</h3>
    </div>
    <div class="right">
        <h5 style="padding-right: 50px;">Social Links</h5>
        <a href="#"><img src="assets/facebook.png" alt="Facebook" width="32" height="32"></a>
        <a href="#"><img src="assets/instagram.png" alt="Instagram" width="32" height="32"></a>
        <a href="#"><img src="assets/twitter.png" alt="Twitter" width="32" height="32"></a>
    </div>
</footer>

        <script src="modal.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#company").change(function()
                {
                    var id = $(this).val();
                    var dataString = 'id='+ id;
                    $.ajax
                    ({
                        type: "POST",
                        url: "ajax_car_model.php",
                        data: dataString,
                        cache: false,
                        success: function(html)
                        {
                            $("#car_model").html(html);
                        } 
                    });
                });

            });
        </script>
    </body>
</html>