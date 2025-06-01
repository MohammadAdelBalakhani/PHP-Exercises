<?php

include __DIR__."/helper.php";
$connection = connetion();

$requestId = $_REQUEST['id'];

$blogs = select($connection,"SELECT * FROM `blogs` WHERE `id` = $requestId;")[0];


$id = $blogs['id'];
$title = $blogs['title'];
$description = $blogs['description'];


echo "<a href='/php_education' class='btn btn-primary'>نمایش مقاله</a>";



echo "
<div class='card text-center'>
<div class='card-header'>
$id مقاله
</div>
<div class='card-body'>
  <h5 class='card-title'>$title</h5>
  <p class='card-text'>$description</p>
  <a href='#' class='btn btn-primary'>نمایش مقاله</a>
</div>
<div class='card-footer text-muted'>
   $id days ago
</div>
</div>
";
