<?php


	
class User {
	public static function isLoggedIn()
	{
		//looks for cookie that is stored
		if(isset($_COOKIE['NFTOOLSID'])) {
			//echo ("on line 10");
			//db check to see if the token is valid
			if (DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])))) {
				//grab and return user id
				//echo ("on line 14");
				$userid = DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])))[0]['user_id'];
				if (isset($_COOKIE['NFTOOLSID_'])) {
				//	echo ("on line 17");
				//	echo $userid;
				return $userid;
				} else {
				//	  echo("on line 20");
                      $cstrong = True;
                      $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                      DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
                      DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])));
                      setcookie("NFTOOLSID", $token, time() + 60 * 60 * 24 * 7, '/', 'nft-ools.com', TRUE, TRUE);
                      // create a second cookie to force the first cookie to expire without logging the user out, this way the user won't even know they've been given a new login toke
                      setcookie("NFTOOLSID_", '1', time() + 60 * 60 * 24 * 3, '/', ' nft-ools.com', TRUE, TRUE);
                      //get loggedin user id
                    return $userid;
				}
			} 
		} 
		return false;	
	}
	
	public static function getUsername($id)
{
	//check to see if the username is set then using the given $id. else return false.
	if(DatabaseConnector::query('SELECT username FROM user WHERE id=:id', array(':id'=>$id))[0]['username']){
	//return username
	return DatabaseConnector::query('SELECT username FROM user WHERE id=:id', array(':id'=>$id))[0]['username'];
	}
	else {
	return false;
	}
}


	public static function getFullName()
{
	$result = DatabaseConnector::query('SELECT fname, lname FROM user WHERE id=:id', array(':id'=>USER_ID))[0];
	return $result["fname"].' '.$result["lname"];
	}

	public static function getAllMessagesByUser($userId) {

            $result = DatabaseConnector::query('SELECT msg_id, user_id, item_id, message_body, approval_timestamp, is_acknowledged FROM message WHERE user_id='.$userId, array());
            return $result;
        }

	public static function getAllMessagesCount() {

		$userid = User::isLoggedIn();
		$result=DatabaseConnector::query('SELECT COUNT(*) FROM message WHERE uid=:userid', array(':userid'=>$userid))[0]['COUNT(*)'];
		return $result;
        }


	//use this function in the user class to see if the user is logged in
		public static function isLoggedInWithRedirect()
		{
			$userid = User::isLoggedin();
			if (!$userid){
				header("Location: ./login");
			} else {
			return $userid;
			}
		}
	
		public static function isAdmin()
		{
			if (DatabaseConnector::query('SELECT admin FROM user WHERE id=:uid AND admin=1', array(':uid'=>self::isLoggedIn()))) {
				return true;
			} else {
				return false;
			}
		}
	
	}




?>
