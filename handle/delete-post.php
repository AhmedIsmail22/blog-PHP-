<?php

require_once '../inc/connection.php';

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "select id, image from posts where id='$id'";
    $runQuery = mysqli_query($conn,$query);

    if(mysqli_num_rows($runQuery) == 1){
        $post = mysqli_fetch_assoc($runQuery);
        $imageName = $post['image'];
        unlink('../uploads/'.$imageName);
        $query = "delete from posts where id=$id";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            $_SESSION['success'] = "post is deleted";
            header("location:../index.php");
        }else {
            $_SESSION['error'] = ["error while deleting"];
            header("location:../index.php");
        }
    }else {
        $_SESSION['error'] = ['post not found'];
        header("location:../index.php");
    }
}else {
    header('location:../index.php');
}