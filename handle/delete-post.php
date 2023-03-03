<?php
require_once '../inc/connection.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query_select = "select title from posts where id=$id";
    $runQuery_select = mysqli_query($conn, $query_select);
    if(mysqli_num_rows($runQuery_select) > 0){
        $query = "delete from posts where id=$id";
        $runQuery = mysqli_query($conn, $query);
        if($runQuery){
            $_SESSION['deleted'] = "post deleted successfully.";
            header("location: ../index.php");
        }
    }else {
        $_SESSION['deleted'] = "post not founded.";
        header("location: ../index.php");
    }
}