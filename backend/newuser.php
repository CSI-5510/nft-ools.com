<?php

$dbConnection = new DatabaseConnector($GLOBALS['db_conf']['db_host'], $GLOBALS['db_conf']['port'], $GLOBALS['db_conf']['db_db'], $GLOBALS['db_conf']['db_user'], $GLOBALS['db_conf']['db_pass'], $GLOBALS['db_conf']['db_charset']);

if (isset($_POST['createaccount'])) {

    if(isset($_POST['g-recaptcha-response'])) {
        // RECAPTCHA SETTINGS
        $captcha = $_POST['g-recaptcha-response'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = 'hehehehehehhehehehehehe';
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        // RECAPTCH RESPONSE
        $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
        $data = json_decode($recaptcha_response);

        if(isset($data->success) &&  $data->success === true) {

            try{
                if(!isset($_POST['signup_email']) || !$_POST['signup_email']){ throw new Exception('Error: You did not provide an email!'); }
                if(!isset($_POST['signup_password']) || !$_POST['signup_password']){ throw new Exception('Error: You did not provide a password!'); }
                //set variables
                $email = $_POST['signup_email'];
                $password = $_POST['signup_password'];

                //Before we continue, do we already have a email with this username?
                if (DatabaseConnector::query('SELECT email from users where email=:email', array(':email'=>$email))) {
                    throw new Exception('Error: There is already someone with this email!');
                }
                DatabaseConnector::query('INSERT INTO users (email, password) VALUES (:email, :password)', array(':email'=>$email, ':password'=>$password));
                echo "Success!";
            }	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }
        }
        else {
            $GLOBALS['errors'][] = "Error: Something went wrong fr fr";
        }
    }
}



?>