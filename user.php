<?php

include("db_conn.php");


class USER{
 function runQuery($sql)
 {
  global $conn;
  $stmt = mysqli_query($conn,$sql);
  return $stmt;
 }
 
 function lasdID()
 {
  global $conn;
  $stmt = mysqli_insert_id($conn);
  return $stmt;
 }
 
 function register($uname,$email,$upass,$eupd,$code)
 {
   global $conn;
   $user_pass = md5($upass);
   $user_name = $uname;
   $user_mail = $email;
   $eUpdate = $eupd;
   $active_code = $code;
   $ins = "INSERT INTO users(userName,userEmail,userPass,emailUpdates,tokenCode) VALUES('$user_name', '$user_mail', '$user_pass','$eUpdate', '$active_code')";
   $stmt = mysqli_query($conn, $ins);
   return $stmt;
 }
 
 function login($email,$upass)
 {
   global $conn;
   $sel = "SELECT * FROM users WHERE userEmail = '$email'";
   $stmt = mysqli_query($conn, $sel);
   $userRow = mysqli_fetch_array($stmt);
   
   if(mysqli_num_rows($stmt) == 1)
   {
    if($userRow['userStatus']=="Y")
    {
     if($userRow['userPass']==md5($upass))
     {
      $_SESSION['userSession'] = $userRow['userID'];
      return true;
     }
     else
     {
      header("Location: index.php?error");
      exit;
     }
    }
    else
    {
     header("Location: index.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: index.php?error");
    exit;
   }  
 }
 
 
 function is_logged_in()
 {
  if(isset($_SESSION['userSession']))
  {
   return true;
  }
 }
 
 function redirect($url)
 {
  header("Location: $url");
 }
 
 function logout()
 {
  session_destroy();
  $_SESSION['userSession'] = false;
 }
 
 function send_mail($email,$message,$subject)
 {      
  require_once('mailer/class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 465;             
  $mail->AddAddress($email);
  $mail->Username = "carparklane1@gmail.com";  
  $mail->Password = "carpark@1";            
  $mail->SetFrom('admin@carparklane.com','Car Park Lane');
  $mail->AddReplyTo("admin@carparklane.com","Car Park Lane");
  $mail->Subject = $subject;
  $mail->MsgHTML($message);
  $mail->Send();
 }  
}
mysqli_close($conn);
?>