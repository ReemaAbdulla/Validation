<?php 
include('includes/connection.php');

//$id=$_GET['id'];
//$query="delete from admin where admin_id=$id";
$query="delete from admin where admin_id={$_GET['id']}";

mysqli_query($conn,$query);
//redirect to manage admin
header("location:manage_admin.php");


?>