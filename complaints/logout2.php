<?php 
session_start();
unset($_SESSION['c_id']);
header("location:login2.php");
