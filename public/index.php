<?php
require_once dirname(__DIR__).'/config/init.php';
require_once CONF.'/routes.php';
require_once LIBS.'/functions.php';
use \core\App;

new App();

 App::$app->setProperty('test','TEST');

//debug(App::$app->getProperties());


//throw new \Exception('ОШИБКА СЕРВЕРА', 500);
