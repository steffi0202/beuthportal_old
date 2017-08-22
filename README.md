# beuthportal
# XAMPP installation
- Apache, MySQL, PHP, phpMyAdmin ausreichend

# XAMPP anpassen
- in der Datei "C:\xampp\apache\conf\httpd.conf" (und oder "C:\xampp\beuthportal_old\xampp\apache\conf\httpd.conf") die Einträge DocumentRoot und <Directory anpassen:

DocumentRoot "C:\xampp\beuthportal_old\xampp\htdocs"

<Directory "C:\xampp\beuthportal_old\xampp\htdocs">

-> Die Github Repo kann nun nach "C:\xampp\" gecloned werden. 

# XAMPP Control Panel starten
- Apache starten
- MySQL starten
- via "Explorer" (rechts im Menü) wir das Verzeichnis geöffnet (C:\xampp)

# im Browser: 
- http://localhost

# für die Datenbank:
- http://localhost/phpmyadmin/
- Datenbankstruktur für 'users' siehe SQL-Datei 'users.sql' unter htdocs

# Sonstige Infos
- HTML/CSS Dateien liegen unter C:\xampp\beuthportal_old\xampp\htdocs 
- Einzig zulässige E-Mail-Domain bei Registrierung: "@beuth-hochschule.de"

# Automatisiertes Unit-Testing mit PHPUni
Folgende Schritte sind nötig:
- Von https://phpunit.de/ die aktuelle Version (6.3.0) downloaden
- Die Installationsanleitung unter https://phpunit.de/manual/current/en/installation.html#installation.phar.windows befolgen und bei Schritt 5 statt "phpunit.phar" "phpunit-6.3.0.phar" eingeben
- Falls im Schritt 6 nicht Version 6.3.0 auftaucht, unter C:\xampp\php bzw. C:\xampp\beuthportal_old\xampp\php die "phpunit"- und "phpunit.bat"-Dateien manuell löschen und Schritt 5 wiederholen.
- Ein Test-Test: Neue CMD öffnen, nach C:\xampp\beuthportal_old\xampp\htdocs\tests wechseln und "phpunit pushpoptest.php" eingeben. 
- Weitere Beispiele und Anleitungen unter https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html