<?php
session_start();
if(isset($_SESSION['logged'])!="true")
{
 header("Location: login.php");
 die();
}
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Car Park Lane</title>
        <link rel="stylesheet" type="text/css" href="admin-style.css">
    </head>
    <body>
        <div class="main_wrapper">
            <div id="header"><h1>Dashboard</h1></div>
            <div id="left">
                    <table border="1">
                        <tr><td><a href="index.php?input_details">Input Car Details</a></td></tr>
                        <tr><td><a href="index.php?view_cars">View All Cars</a></td></tr>
                        <tr><td><a href="index.php?insert_company">Insert Car Company</a></td></tr>
                        <tr><td><a href="index.php?view_companies">View All Companies</a></td></tr>
                        <tr><td><a href="index.php?view_users">Users</a></td></tr>
                        <tr><td><a href="index.php?contact_request">Contact Requests</a></td></tr>
                        <tr><td><a href="index.php?logout">Logout</a></td></tr>
                    </table>
        
            </div>
            <div id="right">
                    <?php
                        if(isset($_GET['input_details'])){
                            include("inputdetails.php");	   
                        }
                        if(isset($_GET['view_cars'])){
                            include("viewcars.php"); 
                        }
                        if(isset($_GET['edit_car'])){
			   include("editcar.php");
			}
                        if(isset($_GET['insert_company'])){
                            include("insertcompany.php"); 
                        }
                        if(isset($_GET['view_companies'])){
                            include("viewcompanies.php");
			}
                        if(isset($_GET['edit_comp'])){
                            include("editcompany.php");   
                        }
                        if(isset($_GET['view_users'])){
                            include("view_users.php"); 
                        }
                        if(isset($_GET['contact_request'])){
                            include("contactrequest.php"); 
                        }
                        if(isset($_GET['logout'])){
                            include("logout.php"); 
                        }
                    ?>
            </div>
        </div>
    </body>
</html>

