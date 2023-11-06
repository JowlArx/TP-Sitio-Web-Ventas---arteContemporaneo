<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['correo'];

if($actualsesion == null || $actualsesion == ''){
header('location: ../login-register/index.php');
}
else{
   header('location: views/index.php');
}
?>