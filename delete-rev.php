<?php 
include 'server.php';
$id = $_GET['id'];
$sql = "DELETE FROM `reviews` WHERE id=$id";
mysqli_query($db, $sql);
header("location: my_account.php");