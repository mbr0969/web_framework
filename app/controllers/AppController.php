<?php


namespace app\controllers;


use app\models\AppModel;
use app\widgets\currency\Currency;
use core\App;
use core\base\Controller;

class AppController extends Controller {

		public function __construct($route) {
				parent::__construct($route);
				new AppModel();

				//setcookie('currency','RUB2', time()+3600*24*7, '/');
				App::$app->setProperty('currencies', Currency::getCurencies());
				App::$app->setProperty('currency', Currency::getCurency(App::$app->getProperty('currencies')));
				//debug(App::$app->getProperty('currency'));
		}


}