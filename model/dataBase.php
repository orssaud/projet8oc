<?php

class  dataBase{

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	public function  __construct($db_name='project8', $db_user = 'root', $db_pass = '', $db_host = 'localhost'){

		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;

	}

	private function getPDO(){

		$pdo = new PDO('mysql:host=localhost;dbname=project8;charset=utf8', 'root', '');
		$this->pdo = $pdo;
		return $pdo;

	}

	public function query($statement){
		$req = $this->getPDO()->query($statement);
		$data = $req->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}

	public function prepare($statement, $atributes, $one = false){

		$req = $this->getPDO()->prepare($statement);
    	$req->execute($atributes);
    	
    		if($one){
    			$data = $req->fetch(PDO::FETCH_OBJ);

    		}else{
    			$data = $req->fetchAll(PDO::FETCH_OBJ);
    		}
  

    	return $data;
	}

	public function test(){

		var_dump('ceci est un test !');
	}

}