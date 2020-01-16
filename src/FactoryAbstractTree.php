<?php

namespace Yes;

class FactoryAbstractTree extends FactoryAbstract{

    function add($unit,$id = null){

        if($unit = parent::add($unit)){

            $child = $unit->getChild();

            if(\is_array($child)){

                $me = new self();

                $me->product_name = $this->product_name;

                $unit->setChild($me);

                $unit->getChild()->raiseAdd($child);

                return $unit;

            }

        }

    }

    public function find($id){

        return parent::find($id);
    }

}