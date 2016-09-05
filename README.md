#Instrucciones
=============

* Crear db inti_datalogger
* Importar en la db el archivo db_backup_dev.sql
* composer global require "fxp/composer-asset-plugin:~1.1"
* php composer.phar install
* php app\console cache:clear 
* php app\console assetic:dump 
* Y para usar el server de symfony
    php app\console server:run --env=dev