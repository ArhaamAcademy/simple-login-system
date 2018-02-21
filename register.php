<?php

include_once('config.php');
if(isset($_POST['form_login'])){
		
		
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		

	try{
	
		if(empty($_POST['name'])){
			throw new Exception('Name cannot be empty.....');
		}
		
		if(empty($_POST['username'])){
			throw new Exception('Username cannot be empty.....');
		}
		
		if(empty($_POST['password'])){
			throw new Exception('Password cannot be empty.....');
		}
		
		if(empty($_POST['user_email'])){
			throw new Exception('Email cannot be empty.....');
		}
		
		
		$num = 0;
		
		$statement = $db->prepare("select * from users where user_name=?");
		$statement->execute(array($_POST['username']));
		$num = $statement->rowCount();
		
		if($num>0){
			
			throw new Exception('Username already exist. Please, choose another one....');
		}
		
		
		
		
		$statement = $db->prepare("insert into users (name, user_name, user_pass, user_email, user_phone) values(?,?,?,?,?)");
		$statement->execute(array($_POST['name'],$_POST['username'],$password,$_POST['user_email'],$_POST['user_phone']));
		
		$success_message = "User has been Registerd Successfully.....!";
		
		
	
	}
		catch(Exception $e){
		$error_message = $e->getMessage();
	}

}


?>
