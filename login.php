
				<?php
session_start();
include_once('config.php');
if(isset($_POST['form_login'])){
				
        $password = md5($_POST['password']);
    try{

        if(empty($_POST['username'])){
        throw new Exception('Username cannot be empty.....');
        }

        if(empty($_POST['password'])){
        throw new Exception('Password cannot be empty.....');
        }


        $num = 0;

        $statement = $db->prepare("select * from users where user_name=? and user_pass=?");
        $statement->execute(array($_POST['username'], $password));

        $num = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if($num>0){

        $session_name = "simple_login";			
        $_SESSION['user_id'] = $result[0]['user_id'];
        $_SESSION['name'] = $session_name;
        header('location: index.php');	

        } else {
        throw new Exception('Invalid Username/ Password.....');
        }

    }
    catch(Exception $e){
        $error_message = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Simple Login System :: PHP</title>
    </head>
    <body>
        <div class="form_message">
            <?php
                if(isset($error_message)){echo "<div>".$error_message."</div>";}
            ?>
        </div>
        <div class="login_form">
            <form action="" method="post">
                <h3>Username :</h3>
                <input type="text" class="form-control" name="username" placeholder="Username" />
                <h3>Password : </h3>
                <input type="password" class="form-control" name="password" placeholder="Password" />
                <br/>
                <input type="submit" class="btn btn-success" value="Login" name="form_login" />
                <a href="#">Forgot Password</a>&nbsp;&nbsp;|&nbsp; <a href="register.php">Register New User</a>
            </form>
        </div>
    </body>
</html>