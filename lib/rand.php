<?php
namespace projet8;

class rand{

	public function randStr($lenght){// create random key
		
		$alphanumeric = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$a_lenght = strlen($alphanumeric) -1 ;

		
 
 		$key = '';
		for ($i = 0; $i < $lenght; $i++) {

			$key .= substr($alphanumeric, rand(0, $a_lenght), 1);

		}
		

		return $key;
	}
}