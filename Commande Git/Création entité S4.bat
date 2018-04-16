@ECHO OFF 
cd ..

SET /P entite="Veuillez entrer le nom de l'entite : "
@ECHO ON
php bin/console make:entity %entite%

pause