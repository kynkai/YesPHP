<?php

namespace Yes;

class AnonymousEntity{

    public function __construct(){

        $this->mergePrototypes();
    }

    public function mergePrototypes(){

       $pros = get_object_vars($this);

       foreach ($pros as $key => $value) {

         if($key[0] == "_"){

            $x = substr($key,1);

            if(isset($pros[$x]) && class_exists($pros[$x]) && $class = $pros[$x]){

                $refClass = new \ReflectionClass($class);
                $object = $refClass->newInstanceArgs($value);

                $this->{$x} = $object ;

            }

         }
          
       }

    }

}