<?php
/*
//use this function in the user class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: ./login");
}
$userid = User::isLoggedIn();
if (User::getUsername($userid)){
	//redirect mans if hes got a username already
	header("Location: ./home");
}
*/
echo "lol";
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


//declare variables
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];

    try{
//throw an error if you didn't fill input in or if input value is empty
        if(!isset($_POST['fname']) || $_POST['fname'] === ""){ throw new Exception('Error: You need to input all fields!'); }
        if(!isset($_POST['lname']) || $_POST['lname'] === ""){ throw new Exception('Error: You need to input all fields!'); }
        if(!isset($_POST['username']) || $_POST['username'] === ""){ throw new Exception('Error: You need to input all fields!'); }
        if(!isset($_POST['address']) || $_POST['address'] === ""){ throw new Exception('Error: You need to input all fields!'); }
        if(!isset($_POST['city']) || $_POST['city'] === ""){ throw new Exception('Error: You need to input all fields!'); }
        if(!isset($_POST['zipcode']) || $_POST['zipcode'] === ""){ throw new Exception('Error: You need to input all fields!'); }



        if(!is_numeric($zipcode)){ throw new Exception('Error: Zip code must be a number!'); }

        DatabaseConnector::query('UPDATE user SET username=:username, fname=:fname, lname=:lname,addr_line_1=:address,city=:city,zip=:zipcode WHERE id=:userid', array(':username'=>$username,':fname'=>$fname,':lname'=>$lname,':address'=>$address, ':userid'=>$userid, ':city'=>$city,':zipcode'=>$zipcode));

        $success =true;
    }	catch (Exception $e) {
        $GLOBALS['errors'][] = $e->getMessage();
    }
}

*/

?>