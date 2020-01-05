<?php

namespace Yes;

class FactoryAbstractTree extends FactoryAbstract{

    function add($unit,$id = null){

        if($unit = parent::add($unit)){

            $child = $unit->getChild();

            if(\is_array($child)){

                $me = new self();

                $me->product_name = $this->product_name;

                $unit->child = $me;

                $unit->child->raiseAdd($child);

                return $unit;

            }

        }

    }
}