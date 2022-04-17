<?php
//use this function in the user class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: ./login");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {	




try{ 
//throw an error if you didn't fill input in or if input value is empty
if(!isset($_POST['fname']) || $_POST['fname'] === ""){ throw new Exception('Error: You need to input all fields!'); }
if(!isset($_POST['lname']) || $_POST['fname'] === ""){ throw new Exception('Error: You need to input all fields!'); }
if(!isset($_POST['username']) || $_POST['fname'] === ""){ throw new Exception('Error: You need to input all fields!'); }
if(!isset($_POST['address']) || $_POST['fname'] === ""){ throw new Exception('Error: You need to input all fields!'); }
if(!isset($_POST['city']) || $_POST['fname'] === ""){ throw new Exception('Error: You need to input all fields!'); }
if(!isset($_POST['zipcode']) || $_POST['fname'] === ""){ throw new Exception('Error: You need to input all fields!'); }

//declare variables
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$address = $_POST['address'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];

	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}



?>