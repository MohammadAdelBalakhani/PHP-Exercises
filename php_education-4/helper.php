<?php

function truncateWords($text, $limit) {
    $words = explode(' ', $text); // تبدیل متن به آرایه‌ای از کلمات
    if (count($words) > $limit) {
        $limitedWords = array_slice($words, 0, $limit); // انتخاب 50 کلمه اول
        return implode(' ', $limitedWords) . '...'; // ترکیب مجدد و افزودن "..."
    }
    return $text; // اگر متن کمتر از 50 کلمه باشد، همان را برمی‌گرداند
}


function connetion(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $connection = new PDO("mysql:host=$servername;dbname=test",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $connection;
}


/*
|   database section
*/
function execute($connection,$query){
    
    $connection->exec($query);
}


function select($connection,$query){

    $data = $connection->prepare($query);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);

   return $data->fetchAll();
}