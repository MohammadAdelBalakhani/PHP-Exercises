<?php
session_start();
/*
| request 
*/
$requestUsername = $_REQUEST['username'] ?? null;
$requestPassword = $_REQUEST['password'] ?? null;
$userData = select("SELECT * FROM `users` WHERE `username` = '$requestUsername'; ")[0] ?? null;

include "./view/login.html";





if(empty($userData)){

    echo "username is not empty";
    return;
}

/*
| logic
*/
 try {

    $_SESSION['user_id'] = $userData['id'];
    
    header("Location: index.php");

    


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