<?php


namespace core\base;


abstract class Controller {

		public $route;
		public $controller;
		public $view;
		public $model;
		public $prefix;
		public $layuot;
		public $data =[];
		public $meta =['title'=>'','desc'=>'','keywords'=>''];

		public function __construct($route ) {
				$this->route = $route;
				$this->controller = $route['controller'];
				$this->view = $route['action'];
				$this->model = $route['controller'];
				$this->prefix = $route['prefix'];
		}

		//установка контента
		public function set($data){
				$this->data= $data;
		}

		//заполняем мета данные
		public function setMeta( $title='',$desc='',$keywords='' ) {
				$this->meta['title'] = $title;
				$this->meta['desc'] = $desc;
				$this->meta['keywords'] = $keywords;
		}

		// создаём ВИД
		public function getView() {
				$viewObject = new View($this->route, $this->layuot, $this->view, $this->meta);

				$viewObject->render($this->data);
		}

		//public function

}