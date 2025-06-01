<?php
session_start();

include "./helper.php";


$connection = connetion();

/*
| request param
*/
$requestUsername  = $_REQUEST['username'] ?? null;
$requestEmail     = $_REQUEST['email'] ?? null;
$requestPhone     = $_REQUEST['phone'] ?? null;
$requestPassword  = $_REQUEST['password'] ?? null;

if($_SERVER['REQUEST_METHOD']== "POST"){

        /* ----------------------------
        | validation request
           ---------------------------- */
        if(empty($requestUsername) 
        || empty($requestPassword)
        || empty($requestEmail)
        || empty($requestPhone)
        ){
            $_SESSION['error'] = "نام کاربری و کلمه عبور نمیتواند خالی باشد";
        }

        /* ----------------------------
        | isset username
           ---------------------------- */
        if(!empty($requestUsername)){

            $userData = select($connection,"SELECT * FROM `users` WHERE `username` = '$requestUsername'; ")[0] ?? null;

        /* ----------------------------
        | validate user
           ---------------------------- */
            if(!empty($userData)){
                
                $_SESSION['error'] = "کاربری با این نام کاربری وجود دارد";
            }


        /* ----------------------------
        | execute register
           ---------------------------- */
            if(empty($userData)){

                execute($connection,
                    "INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`) 
                                VALUES (NULL, '$requestUsername', $requestPassword, '$requestEmail', '$requestPhone'); " 
                    );
                }
            }
}


include "./view/register.php";
