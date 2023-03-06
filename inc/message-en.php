
<?php 
require_once 'connection.php';

$msg = [
    "txt" => "ltr",
    "lang" => "en",
    "blog" => "Blog",
    "all posts" => "All posts",
    "title" => "Title",
    "puplished at" => "Puplished At",
    "actions" => "Actions",
    "show" => "Show",
    "edit" => "Edit",
    "delete" => "Delete",
    "back" => "Back",
    "edit post" => "Edit Post",
    "submit" => "Submit",
    "next" => "Next",
    "previous" => "Previous",
    "add new post" => "Add New Post",
    "body" => "Body",
    "image" => "Image",
    "login" => "Login",
    "logout" => "Logout",
    "email" => "E-mail",
    "password" => "Password"
];


if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
    unset($_SESSION['lang']);
    $_SESSION['lang'] = $msg;

    header("location:".$_SERVER['HTTP_REFERER']);
}