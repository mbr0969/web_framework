<?php


namespace core\base;


use app\controllers\MainController;

class View {

		public $route;
		public $controller;
		public $view;
		public $model;
		public $prefix;
		public $layuot;
		public $data = [];
		public $meta = [];

		public function __construct( $route, $layout = '', $view = '', $meta ) {
				$this->route      = $route;
				$this->controller = $route['controller'];
				$this->view       = $view;
				$this->model      = $route['controller'];
				$this->prefix     = $route['prefix'];
				$this->meta       = $meta;
				if ( $layout === false ) {
						$this->layuot = false;
				} else {
						$this->layuot = $layout ?: LAYOUT;
				}
		}

		public function render( $data ) {

				if (is_array($data)) extract($data);


				$viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

				if ( is_file( $viewFile ) ) {

						ob_start();
						require_once $viewFile;
						$content = ob_get_clean();

				} else {
						throw new \Exception( "Не найден вид {$this->view} ", 500 );
				}

				if ( false !== $this->layuot ) {
						$layoutFile = APP."/views/layouts/{$this->layuot}.php";

						if (is_file($layoutFile) ) {

								require_once $layoutFile;

						} else {
								throw new \Exception( "Не найден шаблон {$this->layuot} ", 500 );
						}
				}
		}

		public function getMeta() {
				 $output = '<meta name="description" content="'.$this->meta['desc'].'"/>'.PHP_EOL;
				 $output .= '<meta name="keywords" content="'.$this->meta['keywords'].'"/>'.PHP_EOL;
					$output .= '<title>'.$this->meta['title'].'</title>'.PHP_EOL;
 				return $output;
		}
}
