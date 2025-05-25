<?php
session_start();
include "./helper.php";

$connection = connetion();

/*
| request 
*/
$id = $_REQUEST['id'] ?? null;

execute($connection,
"DELETE FROM `blogs`
          WHERE `blogs`.`id` = $id;" 
);

header("Location: index.php");
