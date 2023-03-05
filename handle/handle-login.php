<?php 
require_once '../inc/connection.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    if(empty($email)){
        $errors[] = "email is required";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "enter valid email";
    }


    if(empty($password)){
        $errors[] = "password is required";
    }elseif(strlen($password) < 6){
        $errors[] = "password is less than 6 char";
    }


    if(empty($errors)){
        $query = "select * from users where email = '$email'";
        $runQuery = mysqli_query($conn,$query);
        if(mysqli_num_rows($runQuery) == 1){
            $user = mysqli_fetch_assoc($runQuery);
            $oldPassword = $user['password'];
            $is_valid = password_verify($password,$oldPassword);
            if($is_valid){

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['success'] = "Welcome, ".$user['name'];
                header('location:../index.php');
            }else {
                $_SESSION['error'] = ["conditional not correct"];
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header("location:../login.php");
            }
        }else {
            $_SESSION['error'] = ["this account not exist"];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header("location:../login.php");
        }
    }else {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['error'] = $errors;
        header("location:../login.php");
        
    }

}else {
    header("location:../login.php");
}
