<?php

namespace Yes;

class Entity extends AnonymousEntity{

    public $id;

    public function __construct(){

        $this->id = $this->id ?: get_class($this);

    }

    public function __toString()
    {
        return get_class($this) . "-Id '{$this->id}' \n";
    }

    public function log($method,$data){


    }

}