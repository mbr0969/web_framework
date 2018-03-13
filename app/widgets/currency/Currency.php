<?php

namespace app\widgets\currency;


class Currency {

    protected $tpl;
    protected $currencies;
    protected $currency;

    function __construct() {
        $this->tpl = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    protected function run(){
        $this->getHtml();
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

    public static function getHtml(){

    }

}