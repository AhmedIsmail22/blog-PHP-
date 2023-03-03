<?php
    

require_once '../inc/connection.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $old_image = $_POST['old_image'];
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $errors = [];

    if( empty($title)){
        $errors[] = "your title is required";
    }
    elseif(is_numeric($title)){
        $errors[] = "your title must be string";
    }elseif(strlen($title) < 5){
        $errors[] = "your title less than 5 char";
    }

    if( empty($body)){
        $errors[] = "your body is required";
    }
    elseif(is_numeric($body)){
        $errors[] = "your body must be string";
    }elseif(strlen($body) < 5){
        $errors[] = "your body less than 5 char";
    }

    if(! empty($_FILES['image']['name'])){
        $image =  $_FILES['image'];
        $name = $image['name'];
        $tmp_name = $image['tmp_name'];
        $error = $image['error'];
        $size = $image['size']/(0124*1024);
        $ext = strtoupper(pathinfo($name, PATHINFO_EXTENSION));

        $arr = ['PNG', 'JPG', 'JPEG'];
        if($error != 0){
            $errors [] = "choose correct image";
        }
        elseif($size > 1000){
            $errors [] = "image large size";
        }
        elseif(! in_array($ext, $arr)){
            $errors [] = "image not correct";
        }
        $random = uniqid().time();
        $newName = $random.".".$ext;
    }
    else {
        $newName = $old_image;
    }

    if(empty($errors)){
        $query = "update posts set title='$title',body='$body',image='$newName' where id=$id";

        $runQuery = mysqli_query($conn, $query);
        if($runQuery){
            if(! empty($_FILES['image']['name'])){
                move_uploaded_file($tmp_name, "../uploads/$newName");
            }
            $_SESSION['success'] = "post updated successfully.";
            header("location: ../index.php");
        }else {
            $_SESSION['errors'] = ["error"];
            $_SESSION['title'] = $title;
            $_SESSION['body'] = $body;
            header("location: ../edit-post.php?id=$id");
        }
    }
    else {
        $_SESSION['errors'] = $errors;
        $_SESSION['title'] = $title;
        $_SESSION['body'] = $body;
        header("location: ../edit-post.php?id=$id");
    }
}else {
    header("location: ../index.php");
}