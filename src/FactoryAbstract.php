<?php

namespace Yes;

abstract class FactoryAbstract extends I2terator {

    public $product_name;

    public $active;

    public const FIND_FAIL = "FIND_FAIL";

    public function __construct(){}

    protected function _create($args){

        if($s = ($this->product_name)::arrayTo($args)){

            return $s;

        }

    }

    public function getId($unit){

        return !method_exists($unit,"getId") ?: $unit->getId();

    }

    public function produces($args){

        foreach ($args as $key => $value) {

            $this->create($value);

        }

    }

    public function create($args){

        $s = $this->_create($args);

        if($s && !($this->find($s->getId()))){

           return $this->add($s);

        };    
        
        return false;

    }

    public function setActive($id){

        if($s = $this->find($id)){

            if(\method_exists($s,"setActive")) $s->setActive(true);

            return $this->active = $s;

        };

        return false;

    }

    public function raiseAdd($units){

        if(\is_array($units)){

            foreach ($units as $key => $value) {

               if($this->getId($value)){

                   $this->add($value);

               }else{

                   $this->add($value,$key);

               }

            }

        }

    }

    public function parseUnit($unit,&$id = null){

        return $unit;

    }

    function add($unit,$id = null){

        if(($unit = $this->parseUnit($unit,$id)) && \is_a($unit,$this->product_name)){

            $this->var[$id ?: $this->getId($unit)] = $unit;

            return $unit;
        };

        return false;

    }

    public function remove($o) {

        $s = $this->find($o->getId());

        if(!$s) return;

        $s->jettison();

        unset($this->var[$s->getId()]);
    }  

    public function find($id){

        if(\array_key_exists($id,$this->var)){

            return $this->var[$id];

        }else{
            //throw new TemporaryException(self::FIND_FAIL);
            
        }

        return false;

    }

}