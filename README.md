# Symfony_CRUD_Webapp
1. Potrebno je pokrenuti nekakav lokalni server koji će obavljati back-end php i mysql rukohvate
	Ja sam koristio: https://www.apachefriends.org/index.html

2. Apache server je potrebno konfigurirati po Symfony-evim službenim uputama: https://symfony.com/doc/current/setup/web_server_configuration.html#apache-with-mod-php-php-cgi
	
3. U top direktoriju se nalazi nekretnine.sql file, to sadrži postavke baze kojom se ovaj webapp koristi. Potrebno ga je importati na primjerenu lokaciju svojeg servera.
	Ja sam koristio ugrađeni alat: https://www.phpmyadmin.net/
	
4. Ako se symfony aplikacija planira objaviti na live internet samo se prate službene upute za deployment: https://symfony.com/doc/current/deployment.html#how-to-deploy-a-symfony-application

5. Aplikacija se pokreće u browseru putem linka: https://localhost/symfony_crud/public/index.php/ (preduvjet je upaljeni lokalni apache/mysql server)
