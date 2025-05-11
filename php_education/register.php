<?php

/*
| request 
*/
$requestUsername = $_REQUEST['username'] ?? null;
$requestPassword = $_REQUEST['password'] ?? null;

include "./view/register.html";

/*
| logic
*/
 try {

    if(!empty(select("SELECT * FROM `users` WHERE `username` = '$requestUsername'; ")[0] ?? NULL)){

        return;
    }

    execute("INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`) VALUES (NULL, '$requestUsername', {$requestPassword}, NULL, NULL); ");

}catch(Throwable $error){


    var_dump($error->getMessage());
}


/*
|   database section
*/
function execute($query){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $connection = new PDO("mysql:host=$servername;dbname=test",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $connection->exec($query);
}


function select($query){
    /** connection setting */
    $servername = "localhost";
    $username = "root";
    $password = "";

    
    $connection = new PDO("mysql:host=$servername;dbname=test",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    /** end connection setting */

    $data = $connection->prepare($query);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);

   return $data->fetchAll();
}