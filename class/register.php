<?php

/*
| request 
*/
$requestUsername = $_REQUEST['username'] ?? null;
$requestPassword = $_REQUEST['password'] ?? null;


include "./register.html";


/*
| logic
*/
 try {

   if ($requestUsername && $requestPassword) {
    try {
        execute("INSERT INTO `user` (`user`, `password`) VALUES ('$requestUsername', '$requestPassword'); ");
    } catch(Throwable $error) {
        var_dump($error->getMessage());
    }
}

execute("INSERT INTO `user` (`user`, `password`) VALUES ('$requestUsername', '$requestPassword'); ");


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

    $connection = new PDO("mysql:host=$servername;dbname=users",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $connection->exec($query);
}


function select($query){
    /** connection setting */
    $servername = "localhost";
    $username = "root";
    $password = "";

    
    $connection = new PDO("mysql:host=$servername;dbname=users",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    /** end connection setting */

    $data = $connection->prepare($query);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);

   return $data->fetchAll();
}