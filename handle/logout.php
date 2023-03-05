<?php 
require_once '../inc/connection.php';
unset($_SESSION['user_id']);

header('location:../login.php');