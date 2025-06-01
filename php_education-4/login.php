<?php
session_start();

include "./helper.php";
$connection = connetion();

/*-----------------------
| request validation
 ------------------------*/
$requestUsername = $_REQUEST['username'] ?? null;
$requestPassword = $_REQUEST['password'] ?? null;


if($_SERVER['REQUEST_METHOD']== "POST"){

    if(empty($requestUsername) 
    || empty($requestPassword)
    ){
        $_SESSION['error'] = "نام کاربری و کلمه عبور نمیتواند خالی باشد";
    }

    if(!empty($requestUsername)){
        /*--------------------
        | validation 
          --------------------*/
        $userData = select($connection,"SELECT * FROM `users` WHERE `username` = '$requestUsername'; ")[0] ?? null;
        if(empty($userData)){

            $_SESSION['error'] = "کاربری با این شناسه وجود ندارد";
        }

        /*-------------------------------------------------------------
        | login and set user id session and redirect to adminarea
          ------------------------------------------------------------*/
        if(!empty($userData)){
            $_SESSION['user_id'] = $userData['id'];

            header("Location: admin.php");
        }
    }
}

include "./view/login.php";
