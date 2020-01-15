<?php
namespace Yes;

class ArrayNode{

    use ArrayConcat;

    public $handlers;

    public function __construct($handlers)
    {
        
        $this->handlers = $handlers;

    }

    public function extract($data){

        $callback = function(&$key,&$value,&$data){$this->node($key,$value,$data);};

        $data = ArrayConcat::loop($data,$callback);

        //array_walk_recursive_array($data,$callback ?:function($value,$key,&$_data){});

        return $data;

    }

    public function node(&$key,&$value,&$data){

        foreach ($this->handlers as $key1 => $handler) {

            $node = new $handler($key,$value,$data);

            if($node){

                $node->extract();

                $key = $node->key;

                $value = $node->value;

                $data = $node->parent;
            }

        }

    }

}