<?php 
namespace projet8;

class accountManager extends \projet8\dataBase
{

	private function getLoginDate($account){

		$post = $this->prepare('SELECT lastLogin FROM `account` WHERE accountName = ?', [$account], true);
		//var_dump($post);
		return $post->lastLogin;
	}

	private function setLoginDate($account){
		$post = $this->prepare('	UPDATE account
							SET lastLogin = UNIX_TIMESTAMP()
							WHERE accountName = ?', 
							[$account]);
	}


	public function connect($account){

		$post = $this->prepare('SELECT passwordAccount FROM `account` WHERE accountName = ?', [$account], true);

		return $post;
	}


	public function createSession($password, $account){

		$_SESSION['account'] = $account;
		$_SESSION['id'] = $password;
	    $_SESSION['lastLogin'] = $this->getLoginDate($account);
	    $this->setLoginDate($account);	
	    
	}



	public function  accountEmail($email){

		$req = $this->prepare('SELECT email FROM account WHERE email = ?', [$email], true);

		return $req;
	}

	public function modifyPassword($password, $email){
		$this->prepare('	UPDATE account
							SET passwordAccount = ?
							WHERE email = ?', 
							[$password ,  $email]);

				

	}

	public function getAccountWithEmail($email){

		$req = $this->prepare('SELECT accountName FROM account WHERE email = ?', [$email], true);

		return $req;
	}
}