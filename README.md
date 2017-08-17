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

# HTML/CSS Dateien leigen unter C:\xampp\beuthportal_old\xampp\htdocs 

# Einzig zulässige E-Mail-Domain: "@beuth-hochschule.de"
