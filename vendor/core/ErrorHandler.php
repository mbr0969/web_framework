<?php

namespace core;

class ErrorHandler {


		/**
			* ErrorHandler constructor.
			*/
		public function __construct() {
				if (DEBUG){
						error_reporting(-1); //Показывем все ошибки
				}else{
						error_reporting(0);
				}
				set_exception_handler([$this,'exceptionHandler']);
		}

		public function exceptionHandler($e){
				$this->logErrors($e->getMessage(),$e->getFile(), $e->getLine());
				$this->displayError('Исключение',$e->getMessage(),$e->getFile(), $e->getLine(), $e->getCode());

		}

		protected function logErrors($message = '', $file = '',$line = ''){
					error_log("[".date('Y-m-d H:i:s')."] Текст ошибки {$message} | Файл: {$file} |
															Строка: {$line} \n===========\n", 3,	ROOT.'/temp/error.log');
		}

		protected function displayError($errno, $errstr, $errfile,$errline, $response = 404){

				http_response_code($response);
				if ($response == 404 && !DEBUG){
							require WWW.'/errors/404.php';
							die;
				}

				if (DEBUG){
						require WWW.'/errors/dev.php';
				}else{
						require WWW.'/errors/prod.php';
				}
				die;

		}
}