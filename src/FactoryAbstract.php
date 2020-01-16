<?php

namespace Yes;

abstract class FactoryAbstract extends I2terator {

    public $product_name;

    public $active;

    private $partners;

    public function __construct($partners = [])
    {
        $partners = defaultArrayNode()->extract($partners);

        foreach ($partners as $key => $value) {
            
            if($value instanceof FactoryAbstract && $value->getProductName() == $this->product_name){


            }else{

                unset($partners[$key]);

            }

        }

        $this->partners = $partners;
    }

    public function getProductName(){

        return $this->product_name;
        
    }

    protected function _create($args){

        if($s = ($this->product_name)::arrayTo($args)){

            return $s;

        }

    }

    public function getIdUnit($unit){

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

               if($this->getIdUnit($value)){

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

            $this->var[$id ?: $this->getIdUnit($unit)] = $unit;

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

        if(isset($this->var[$id])){

            return $this->var[$id];

        }else{
            //throw new TemporaryException(self::FIND_FAIL);
            
        }

        return false;

    }

    public function findHavy($unit){

        foreach ($this as $key => $value) {
           
            if($value == $unit)  return $this[$key];

        }

    }

    public function get($id){

        $unit = $this->find($id);

        $unit && $this->partnerOvertime($unit);

        return $unit;

    }

    public function gets(){

        $units = array_merge($this->creates(), $this->partnerCreates());

        return $units;

    }

    public function creates(): array{

        return [];

    }

    public function partnerCreates() : array{

        $units = [];

        if(count($this->partners)>0){

            foreach ($this->partners as $key => $value) {
    
                $units = array_merge($units,$value->creates());

            }

        }

        return $units;

    }

    public function partnerOvertime(&$unit){

        $this->overtime($unit);

        if(count($this->partners)>0){

            foreach ($this->partners as $key => $value) {
    
                $value->partnerOvertime($unit);

            }

            if(!$unit) return;

            foreach ($this->partners as $key => $value) {
    
                $value->alonePartner($unit);

            }

            $this->alonePartner($unit);

        }

    }

    public function alonePartner($unit){



    }

    public function overtime(&$unit){

        return $unit;

    }

}