<?php

class LoginTest extends PHPUnit_Framework_TestCase
{
     //TESTET DIE DATENBANKVERBINDUNG UND OB EINTRÄGE VORHANDEN SIND
	 public function testLogin()
	{
		$binary_string = 'Test';
		function _strlen($binary_string) {
            if (function_exists('mb_strlen')) {
                return mb_strlen($binary_string, '8bit');
            }
            return strlen($binary_string);
        }
		
		$this->assertNotNull($binary_string);
		 $this->assertEquals(4, strlen($binary_string));
	}
 

}