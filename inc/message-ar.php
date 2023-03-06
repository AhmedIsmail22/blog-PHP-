
<?php 
require_once 'connection.php';

$msg = [
    "txt" => "rtl",
    "lang" => "ar",
    "blog" => "المدونة",
    "all posts" => "كل المنشورات",
    "title" => "العنوان",
    "puplished at" => "نشرت في",
    "actions" => "أجراءات",
    "show" => "عرض",
    "edit" => "تعديل",
    "delete" => "حذف",
    "back" => "رجوع",
    "edit post" => "تعديل المنشور",
    "submit" => "رفع",
    "next" => "التالى",
    "previous" => "السابق",
    "add new post" => "اضافة منشور جديد",
    "body" => "المحتوى",
    "image" => "الصورة",
    "login" => "تسجيل دخول",
    "logout" => "تسجيل خروج",
    "email" => "البريد الالكترونى",
    "password" => "كلمة المرور"
];


if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
    unset($_SESSION['lang']);
    $_SESSION['lang'] = $msg;

    header("location:".$_SERVER['HTTP_REFERER']);
}