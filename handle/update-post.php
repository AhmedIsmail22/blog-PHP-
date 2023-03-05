<?php
require_once '../inc/connection.php';
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}


if(isset($_POST['submit'],$_GET['id'])){
    $id = $_GET['id'];
    $title = htmlspecialchars(trim($_POST['title']));
    $body = htmlspecialchars(trim($_POST['body']));

    $errors = [];
    if(empty($title)){
        $errors[] = "title is required";
    } elseif(is_numeric($title)){
        $errors[] = "your title must be string";
    } elseif(strlen($title) < 5){
        $errors [] = "title is less than 5 char";
    }
    if(empty($body)){
        $errors[] = "body is required";
    } elseif(is_numeric($title)){
        $errors[] = "your title must be string";
    } elseif(strlen($body) < 10){
        $errors [] = "body is less than 10 char";
    }

    $query = "select image,id from posts where id=$id";
    $runQuery = mysqli_query($conn,$query);
    if($runQuery){
        $post = mysqli_fetch_assoc($runQuery);
        $old_image = $post['image']; 
    }else {
        $_SESSION['error'] = ['post not found'];
    }

    $arr_ext = ['png','jpg','jpeg','gif'];
    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_size = $image['size']/(1024*1024);
        $image_error = $image['error'];
        $image_tmp_name = $image['tmp_name'];
        $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        
        if($image_error != 0){
            $errors[] = "choose correct image";
        }elseif($image_size > 1){
            $errors[] = "image is large size";
        }elseif(!in_array($ext,$arr_ext)){
            $errors[] = "image not correct";
        }
        $random = uniqid().time();
        $newName = $random.".".$ext;
    } else {
        $newName = $old_image;
    }

    if(empty($errors)){
        $query = "update posts set `title`='$title' ,`body`='$body',`image`='$newName'";
        $runQuery = mysqli_query($conn,$query);
        if($runQuery){
            if(! empty($_FILES['image']['name'])){
                unlink('../uploads/'.$old_image);
                move_uploaded_file($image_tmp_name, '../uploads/'.$newName);
            }
            $_SESSION['success'] = "post is updated successfully";
            header("location:../show-post.php?id=$id");
        }else {
            $_SESSION['errors'] = ["error while updete"];
            header("location:../create-post.php?id=$id");
        }
    }
}else {
    header("location:../index.php");
}

