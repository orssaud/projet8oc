<?php 

class accountManager extends dataBase
{

	private function getLoginDate($account){

		$post = $this->prepare('SELECT lastLogin FROM `account` WHERE accountName = ?', [$account], true);
	
		return $post->lastLogin;
	}

	private function setLoginDate($account){
		$post = $this->prepare('	UPDATE account
							SET lastLogin = NOW()
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
}