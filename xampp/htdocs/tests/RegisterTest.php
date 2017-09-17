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
			//echo "<font color='#FF0000'>Deine E-Mail-Adresse ist keine gültige Beuth-Email-Adresse!<br></font>";
			$error = true;
		}			
		$this->assertNotTrue($error);
		$this->assertEquals('beuth-hochschule.de', $domain);		
	}
	
	
	 //Test der Passwortprüfung
	 public function testPassword()
	{	
		$error = false;
		$passwort = '8757KKKKhhhhdjkfk';
		if (!preg_match('/[A-Z]/', $passwort) OR !preg_match('/[a-z]/', $passwort) OR !preg_match('/[0-9]/', $passwort)  OR strlen($passwort) < 8) {
			//echo "<font color='#FF0000'>Das Passwort muss mindestens 8 Zeichen lang sein und aus Zahlen, Klein- und Grossbuchstaben bestehen<br></font>";
			$error = true;
		}
		$this->assertNotTrue($error);
	
	}
		
}
 