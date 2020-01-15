<?php
namespace Yes\Node;

class ObjectInstanceNode extends Node{

    public function extract(){

        $this->value = nnew($this->value);//$this->key = "new2";

    }

}