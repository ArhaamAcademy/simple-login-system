<?php
ob_start();
session_start();

$session_name = "simple_login";
if($_SESSION['name'] != $session_name){
	header('location: login.php');
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Simple Login System :: PHP</title>
    </head>
    <body>
        <div class="main_content">
           <h1>Welcome to Single Login Home Page......!</h1>
        </div>
    </body>
</html>
