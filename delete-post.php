<?php 
include 'server.php';
$id = $_GET['id'];
$sql = "DELETE FROM `posts` WHERE id=$id";
mysqli_query($db, $sql);
header("location: my_account.php");