<?php
//TESTET DIE REGISTRIERUNGS-FUNKTIONEN
class RegisterTest extends PHPUnit_Framework_TestCase
{
     //Test der Domain-Prüf-Funktion
	 public function testDomain()
	{	
		$error = false;
		$email = 's433948@beuth-hochschule.de';
		list ($user, $domain) = explode('@', $email);
		if($domain !== 'beuth-hochschule.de'){
			echo "<font color='#FF0000'>Deine E-Mail-Adresse ist keine gültige Beuth-Email-Adresse!<br></font>";
			$error = true;
		}			
		$this->assertNotTrue($error);
		$this->assertEquals('beuth-hochschule.de', $domain);		
	}
	
	
		
}
 