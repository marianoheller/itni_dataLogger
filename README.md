Instrucciones
=============

1) Crear db inti_datalogger
2) Importar en la db el archivo db_backup_dev.sql
3) php composer.phar install
4) php app\console cache:clear 
5) php app\console assetic:dump 
6) Y para usar el server de symfony
    php app\console server:run --env=dev