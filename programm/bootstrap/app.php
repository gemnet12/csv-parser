<?php

require_once 'base-paths.php';
require_once __BASE_PATH . '../vendor/autoload.php';
require_once 'routes.php';
require_once 'env.php';

use Programm\System\App;

$app = new App();
$app->run();
