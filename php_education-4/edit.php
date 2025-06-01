<?php
session_start();
include "./helper.php";

$connection = connetion();

/*
| request 
*/
$id = $_REQUEST['id'] ?? null;
$requestTitle  = $_REQUEST['title'] ?? null;
$requestDescription = $_REQUEST['description'] ?? null;

if(empty($requestTitle) 
|| empty($requestDescription)
){

    echo "empty username or password";
    return;
}

execute($connection,
"UPDATE `blogs` 
        SET `title`= '$requestTitle' , `description`= '$requestDescription'  WHERE `blogs`.`id` = $id;" 
);

header("Location: index.php");
