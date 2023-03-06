<?php 
require_once 'connection.php';
require_once 'message-en.php';

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = $msg;
}
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']['lang']; ?>"> <!-- dir="<?php echo $_SESSION['lang']['txt']; ?>" -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['lang']['blog']; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>


