<?php
ob_start();
session_start();


if($_SESSION['user_name'] < 0){
	header('location: login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Simple Login System :: PHP</title>
	<link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="main_content">
           <a href="logout.php">Logout</a><br><hr>
	   <h3>Hi <?php echo $_SESSION['full_name']; ?></h3>
           <h1>Welcome to Single Login Home Page......!</h1>
        </div>
    </body>
</html>
