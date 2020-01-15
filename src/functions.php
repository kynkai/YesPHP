<?php
use Yes\ArrayNode;
use Yes\Node\ObjectInstanceNode;
use Yes\Node\Node;

function defaultArrayNode(){

    $arrayNode = new ArrayNode([
        ObjectInstanceNode::class,
        Node::class
    ]);

    return $arrayNode;

}

function array_walk_recursive_array(array &$array, callable $callback) {
    foreach ($array as $k => &$v) {
        if (is_array($v)) {
            array_walk_recursive_array($v, $callback);
        } else {
            $callback($v, $k, $array);
        }
    }
}


function nnew($data){

    $instance = null;

    if(is_array($data) && count($data) > 0 && isset($data[0])){

        $class = $data[0];

        if(is_string($class) && class_exists($class)){

            $class = new \ReflectionClass($class);

            if($class){

                array_shift($data);
            
                $instance = $class->newInstanceArgs($data);
        
            }

        } 

    }

    if($instance) return $instance;

    return $data;

}

function toString($ob){

    if(!\is_string($ob)){

        if(\is_object($ob) || \is_array($ob)){

            if(!method_exists($ob,"__toString")){

                $_ob = $ob;

                $ob = \json_encode($_ob);

                if($ob == "{}"){
                    $ob = \get_class($_ob);
                }

            }
        }

    }

    return $ob;

}

function cleanString($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
 }

function getTopNameSpace($name,$index = 0){

    return substr($name, $index, strpos($name, '\\'));

}

function x($i = 0){

    $i++;

    $a = generateCallTrace(false,$i);

    //return @str_replace(ABSPATH,"",$a);

}

function generateCallTrace($type = false, $j = 1)
{
    $e = new Exception();
    $trace = explode("\n", $e->getTraceAsString());
    $trace = array_reverse($trace);
    array_shift($trace); // remove {main}

    for ($i=0; $i < $j ; $i++) { 

        array_pop($trace);

    }

    $length = count($trace);

    //$trace[$length-1] = str_replace(__METHOD__,"",end($trace));

    $result = array();
   
    if($type){

        for ($i = 0; $i < $length; $i++)
        {
            $result[] = ($i + 1)  . ')' . substr($trace[$i], strpos($trace[$i], ' ')); 
        }

    }else{

        for ($i = $length-1; $i >= 0 ; $i--)
        {
            $result[] = ($i + 1)  . ')' . substr($trace[$i], strpos($trace[$i], ' ')); 
        }
    }
  
    return "\t" . implode("\n\t", $result);
}
