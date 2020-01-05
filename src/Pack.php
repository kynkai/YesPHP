<?php
namespace Yes;

class Pack{

    public $method;

    public $namespace;

    public $line;

    public $file;

    public $dir;

    public $function;

    public $class;

    public $trait;

    public $bundle;

    public function __construct(
    $bundle = null,
    $method = "pack",
    $line = 0,
    $dir = "" ,
    $function ="pack",
    $file = "",
    $class = "pack",
    $namespace ="pack" , 
    $trait =""
    ){

        $this->bundle = $bundle;
        $this->method = $method;
        $this->dir = $dir;
        $this->function = $function;
        $this->file = $file;
        $this->line = $line;
        $this->class = $class;
        $this->namespace = $namespace;
        $this->trait = $trait;

    }

    public function __invoke(
    $key
    ){
        if($this->method == $key) return $this->bundle;
        return false;
    }

    public function __toString(){

        return "Method:{$this->method},Line:{$this->line},Bundle={$this->bundle}";

    }

}