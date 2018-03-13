<?php


namespace app\controllers;


use core\App;

class MainController extends AppController {


		public function indexAction(){
				$this->setMeta(App::$app->getProperty('name'),"ОПИСАНИЕ","главная");

				$brands = \R::find('brand', 'LIMIT 3');
				$hits = \R::find('product', "hit='1' AND status ='1' LIMIT 8");
				//var_dump($brand);



				$this->set(compact('brands','hits'));

		}

}