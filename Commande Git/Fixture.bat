@ECHO OFF
CD ..
@ECHO ON
php bin/console doctrine:fixtures:load
PAUSE