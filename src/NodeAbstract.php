<?php
namespace Yes;

abstract class NodeAbstract{

    public $key;

    public $value;

    public $parent;

    public function __construct($key,$value,$parent)
    {

        $this->key = $key;

        $this->value = $value;

        $this->parent = $parent;
        
    }

    public abstract function extract();

}


