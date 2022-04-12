<?php

class User {


	public static function isLoggedIn(){

		//looks for cookie that is stored
		if(!isset($_COOKIE['NFTOOLSID'])) {
			console ('cookie not set...');
			return false;
		}

		// get user from header token
		$q = DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])));
		if(is_null($q)){
			console ('token not found...');
			return false;
		}

		// cookie is already set
		$userid = $q[0]['user_id'];
		if (isset($_COOKIE['NFTOOLSID_'])) {
			console ('cookie set...');
			return $userid;
		} 

		// set cookie
		console ('setting cookie...');
		self::set_cookie();
		return $userid;
	
	}


	public static function set_cookie(){
		$cstrong = True;
		$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
		DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
		DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])));
		setcookie("NFTOOLSID", $token, time() + 60 * 60 * 24 * 7, '/', 'nft-ools.com', TRUE, TRUE);
		// create a second cookie to force the first cookie to expire without logging the user out, this way the user won't even know they've been given a new login toke
		setcookie("NFTOOLSID_", '1', time() + 60 * 60 * 24 * 3, '/', ' nft-ools.com', TRUE, TRUE);	
		//get loggedin user id
	}


    public static function isAdmin()
    {
        if (DatabaseConnector::query('SELECT admin FROM user WHERE id=:uid AND admin=1', array(':uid'=>self::isLoggedIn()))) {
            return true;
        } else {
            return false;
        }
    }

	
	/** check to see if user logged. redirects to public_html if not
	 *
	 * @return (string) user id
	 */
	public static function isLoggedInWithRedirect(){
		$user_id = self::isLoggedIn();
		if(!$user_id){
			console ('not logged in');
			header("Location: ../public_html");
			return;
		}
		return $user_id;
	}


}

?>