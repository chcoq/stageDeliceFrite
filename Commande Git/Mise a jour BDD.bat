@Echo OFF
cd ..
php bin/console doctrine:schema:update -f
pause
