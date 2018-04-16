@ECHO OFF

echo. 1 -> symfony 3.
echo. 2 -> symfony 4.
SET /P "choix"="Choisissez le symfony " 
IF %choix%==1(
echo symfony3)
IF %choix%==2(
echo symfony4)
pause
PING LOCALHOST -n 3 >nul
exit
