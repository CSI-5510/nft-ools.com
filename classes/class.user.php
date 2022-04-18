<?php



	
class User {
	public static function isLoggedIn()
	{
		//looks for cookie that is stored
		if(isset($_COOKIE['NFTOOLSID'])) {
			//db check to see if the token is valid
			if (DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])))) {
				//grab and return user id
				$userid = DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])))[0]['user_id'];
				if (isset($_COOKIE['NFTOOLSID_'])) {
				return $userid;
				} else {
          $cstrong = True;
          $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
          DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
          DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])));
          setcookie("NFTOOLSID", $token, time() + 60 * 60 * 24 * 7, '/', 'nft-ools.com', TRUE, TRUE);
          // create a second cookie to force the first cookie to expire without logging the user out, this way the user won't even know they've been given a new login toke
          setcookie("NFTOOLSID_", '1', time() + 60 * 60 * 24 * 3, '/', ' nft-ools.com', TRUE, TRUE);
          //get loggedin user id
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