<?php
//TESTET DIE FUNKTIONEN aus functions.inc.php
class FunctionsTest extends PHPUnit_Framework_TestCase
{
     //Test der Random-String-Funktion
	 public function testRandomString()
	{		
		function random_string() {
			if(function_exists('openssl_random_pseudo_bytes')) {
				$bytes = openssl_random_pseudo_bytes(16);
				$str = bin2hex($bytes);
			} else if(function_exists('mcrypt_create_iv')) {
				$bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
				$str = bin2hex($bytes);
			} else {
				//Replace your_secret_string with a string of your choice (>12 characters)
				$str = md5(uniqid('your_secret_string', true));
			}
			return $str;
			$this->assertNotNull($str);
			$this->assertNotEquals('your_secret_string', $str);
		}
		
	}
			
			
}
 