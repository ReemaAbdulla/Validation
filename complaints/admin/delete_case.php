<?php 
include('includes/connection.php');

//$id=$_GET['id'];
//$query="delete from cases where case_id=$id";
$query="delete from cases where case_id={$_GET['id']}";

mysqli_query($conn,$query);
//redirect to manage cases
header("location:manage_cases.php");


?>