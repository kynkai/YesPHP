<?php
namespace Yes;

abstract class AbstractAutoObject{

    public function __construct(){


    }

    public static function gruadMethod(){

        return ["__construct","callAllNonMethod","run","gruadMethod"];

    }

    public static function callAllNonMethod($object){

        $methods = get_class_methods($object);

        forEach($methods as $method)
        {
            if(!\in_array($method,self::gruadMethod()))
            {
                try {

                    $object->{$method}();

                } catch (\Throwable $th) {
                }
            }
        }

    }

    public function run(){

        return self::callAllNonMethod($this);

    }

}