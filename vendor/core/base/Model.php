<?php

namespace core\base;

use core\Db;

abstract class Model {

		public $attributes = [];
		public $errors = [];
		public $rulse = [];

		public function __construct() {
				Db::instance();

		}

}