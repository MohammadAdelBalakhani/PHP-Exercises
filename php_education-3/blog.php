<?php
session_start();
include "./helper.php";
include_once "./view/blog/create.html";

$connection = connetion();

$_SEESSION['error'] = "test222";


/*
| request 
*/
$requestTitle  = $_REQUEST['title'] ?? null;
$requestDescription = $_REQUEST['description'] ?? null;

if(empty($requestTitle) 
|| empty($requestDescription)
){

    echo "empty username or password";
    return;
}

execute($connection,
"INSERT INTO `blogs` (`id`, `title`, `description`) 
              VALUES (NULL, '$requestTitle', '$requestDescription');" 
);

header("Location: index.php");
