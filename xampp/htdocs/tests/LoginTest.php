<?php
//TESTET DIE LOGIN-FUNKTIONEN
class LoginTest extends PHPUnit_Framework_TestCase
{
     //Test der Stringlänge-Funktion
	 public function testStringLength()
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
	
	//TEst der Substring-Funktion
	public function testSubString()
	{	
		$binary_string = 'Test';
		$start = 1;
		$length = 2;
		function _substr($binary_string, $start, $length) {
            if (function_exists('mb_substr')) {
                return mb_substr($binary_string, $start, $length, '8bit');
            }
            return substr($binary_string, $start, $length);
        }
		$this->assertNotNull($binary_string);
		$this->assertEquals('es', substr($binary_string, $start, $length));		
	}
		
}
 