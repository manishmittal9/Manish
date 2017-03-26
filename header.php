<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1">
        <title> Car Park Lane </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="modal.css">
        <link rel="stylesheet" type="text/css" href="grid.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <div class="logo"><p><a href="/carparklane/">CAR PARK LANE</a></p></div>
            <div class="header-right">
                <form method="post" action="search.php">
                    <input type="search" id="search-bar" name="search-car" placeholder="Find Your Ride">
                    <input type="submit" name="submit" value="Go" id="search-btn">
                </form>
                <?php if(isset($_SESSION['user'])){
                    $user = $_SESSION['user'];
                    echo "<p class='user'>Hi $user</p><button id='logout'><a href='logout.php'>Log Out</a></button>";
                }
                else{
                    echo "<button id='login'>Log In</button>
                <button id='signup'>Sign Up</button>";}
                ?>
        
        <!-- Log In Modal -->
            <div id="login-modal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="login-close close">×</span>
                        <h2>Log In</h2>
                    </div>
                    <div class="user_login">
                        <form action="login.php" method="post">
                            <label>Email</label> <input type="email" name="email"><br>
                            <label>Password</label> <input type="password" name="password"><br>
                            <div class="checkbox">
                                <input id="remember" type="checkbox" name="remember"> <label for="remember">Remember me on this computer</label>
                            </div>
                            <div class="action_btns">
                                <div class="one_half last">
                                    <input type="submit" class="btn btn_red" value="Login" name="l-submit">
                                </div>
                            </div>
                        </form>
                        <a class="forgot_password" href="#">Forgot password?</a>
                    </div>
                </div>
            </div>
            
            <!-- Sign Up Modal -->
            <div id="signup-modal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="signup-close close">×</span>
                        <h2>Sign Up</h2>
                    </div>
                    	
                    <div class="user_register">
                        <form action="signUp.php" method="post">
                            <label>Full Name</label> <input type="text" name="name"><br>
                            <label>Email Address</label> <input type="email" name="email"><br>
                            <label>Password</label> <input type="password" name="password"><br>
                            <div class="checkbox">
                                <input id="send_updates" type="checkbox" name="updates"> <label for="send_updates">Send me occasional email updates</label>
                            </div>
                            <div class="action_btns">
                                <div class="one_half last">
                                    <input type="submit" class="btn btn_red" name="r-submit" value="Register">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </header>
