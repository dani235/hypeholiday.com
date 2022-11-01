<?php
include "server.php";
session_start();
unset($_SESSION['log']);
header("location:login.php");
?>