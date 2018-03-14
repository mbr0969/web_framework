<?php

namespace app\widgets\currency;


use core\App;

class Currency {

    protected $tpl;
    public $currencies;
    public $currency;

    function __construct() {
        $this->tpl = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    protected function run(){
        $this->currencies = App::$app->getProperty('currencies');
        $this->currency = App::$app->getProperty('currency');
        echo $this->getHtml();
    }

    public static function getCurencies(){

        return \R::getAssoc("SELECT code, title,  symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC ");

    }

    public static function getCurency($currencies){
        if (isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'], $currencies)){

            $key = $_COOKIE['currency'];

        }else{

            $key = key($currencies);
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;


    }

    public function getHtml(){

        ob_start();
        require_once $this->tpl;

        return ob_get_clean();

    }

}