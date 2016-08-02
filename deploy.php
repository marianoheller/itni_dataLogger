<?php

// All Deployer recipes are based on `recipe/common.php`.
require 'recipe/symfony.php';

serverList('app/config/servers.yml');

set('repository', 'https://github.com/marianoheller/itni_dataLogger.git');

after('deploy:vendors', 'database:migrate');
