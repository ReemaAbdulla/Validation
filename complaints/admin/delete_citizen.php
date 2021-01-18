<?php 
include('includes/connection.php');

//$id=$_GET['id'];
//$query="delete from citizen where c_id=$id";

$query="delete from citizen where c_id={$_GET['id']}";

mysqli_query($conn,$query);
//redirect to manage citizen
header("location:manage_citizen.php");


?>