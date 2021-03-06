<?php
if (User::isLoggedin()){
	header("Location: ./home");
}

if (isset($_POST['createaccount'])) {
	   
try{  

	if(!isset($_POST['signup_email']) || !$_POST['signup_email']){ throw new Exception('Error: You did not provide an email!'); }	
	if(!isset($_POST['signup_password']) || !$_POST['signup_password']){ throw new Exception('Error: You did not provide a password!'); }
	if(!isset($_POST['password_confirm']) || !$_POST['password_confirm']){ throw new Exception('Error: You did not provide a confirmation password!'); }		
	//set variables
	$email = $_POST['signup_email'];
	$password = $_POST['signup_password'];
	$confirmation_password = $_POST['password_confirm'];
	if($confirmation_password !== $password){ throw new Exception('Error: Your password and confirmation password do not match!'); }		
	
	//Before we continue, do we already have a email with this username?
	if (DatabaseConnector::query('SELECT email from user where email=:email', array(':email'=>$email))) { 
	throw new Exception('Error: There is already someone with this email!'); 
	}
	
	if (strlen($password) >= 6 && strlen($password) <= 60) {
	
	//php built in validator for email, if valid then insert
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	DatabaseConnector::query('INSERT INTO user (email, password) VALUES (:email, :password)', array(':email'=>$email, ':password'=>password_hash($password, PASSWORD_BCRYPT)));
	$success = 1;
	} else {
		throw new Exception('Error: Email is invalid!'); 	
	}
	} else {
		throw new Exception('Error: Password must have at least 6 characters!');		
	}	
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
   }





?>