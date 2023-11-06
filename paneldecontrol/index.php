<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['correo'];

if($actualsesion == null || $actualsesion == ''){
header('location: session/login.php');
}
else{
   header('location: views/index.php');
}
?>