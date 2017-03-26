<?php
session_start();

if(!isset($_SESSION['user']))
{
}
else
{
 session_destroy();
 unset($_SESSION['user']);
 $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
 header("Location: $httpReferer");
}
?>