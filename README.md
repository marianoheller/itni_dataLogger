#Instrucciones para apache
=============

* php app/check.php
* Crear db inti_datalogger
* Importar en la db el archivo db_backup_dev.sql
* Configurar app/config/parameters.yml
* composer global require "fxp/composer-asset-plugin:~1.1"
* php composer.phar install --no-dev --optimize-autoloader
* php app\console cache:clear  --env=prod --no-debug
* php app\console assetic:dump  --env=prod --no-debug


( Y para usar el server de symfony: php app\console server:run --env=prod)