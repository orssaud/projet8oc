<?php 
namespace projet8;

class recovery extends \projet8\dataBase
{

	public function newRecovery($email, $key){

		$key = password_hash($key, PASSWORD_BCRYPT);

		$req = $this->prepare('SELECT email, date FROM recovery WHERE email = ?', [$email], true);


		if (isset($req->email)){ //un lien de recupération existe déjà

			if ( time() - 300 > $req->date){ //metre a jour si moins de 5min

				$this->prepare('	UPDATE recovery
									SET security_key = ?, date = UNIX_TIMESTAMP()
									WHERE email = ?', 
									[$key,   $email]);

				return true;

			}else{

				
				return false;
			}
		
		}else{ //aucun lien de récupération existe
			
			$req = $this->prepare('INSERT INTO recovery(email, security_key, date) VALUES(?, ?,  UNIX_TIMESTAMP())', [$email, $key]);

			return true;
		}

		
	}

	public function  accountInfo($email){

		$req = $this->prepare('SELECT email, security_key FROM recovery WHERE email = ?', [$email], true);

		return $req;
	}

	public function delRequest($email){
				$this->prepare('DELETE FROM recovery
								WHERE email = ?',
								 [$email]);
	}
}