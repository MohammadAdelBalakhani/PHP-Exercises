
<?php
session_start();

echo "<pre>";

var_dump("wellcome");

echo "</pre>";
echo "_SESSION =>" . $_SESSION['user_id'];


include "view/index.html";


