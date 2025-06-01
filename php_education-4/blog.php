<?php
session_start();
include "./helper.php";

$connection = connetion();

/*
| request initial
*/
$requestTitle  = $_REQUEST['title'] ?? null;
$requestDescription = $_REQUEST['description'] ?? null;

/* --------------------
| validation request
 ----------------------*/
if(empty($requestTitle) 
|| empty($requestDescription)
){

    $_SESSION['error'] = "مقادیر را لطفا پر نمایید";
}else {

    /* -----------------
    | create blog
     ------------------*/
    execute($connection,
    "INSERT INTO `blogs` (`id`, `title`, `description`) 
                VALUES (NULL, '$requestTitle', '$requestDescription');" 
    );

    $_SESSION['succes'] = "با موفقیت ایجاد شد";

}

header("Location: admin.php");
