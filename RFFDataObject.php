<?php

namespace Yes;

class RFFDataObject{

    public $ok;

    public $method;

    public $code;

    public $result = array();

    public $isfile;

    public $content;

    function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    } 

    public function __construct4($ok,$method,$code,$result){

        $this->set($ok,$method,$code,$result);

    }

    public function __construct1($content){

        $this->setLazy($content);

    }

    public function set($ok,$method,$code,$result){

        $this->ok = $ok;

        $this->method = $method;

        $this->code = $code;

        $this->result = $result;

        $this->isfile = $result instanceof FileContent ? true : false;

    }


    public function setLazy($content){

        if(\is_string($content)){

            $content = \json_decode($content,true);

        }

        if(isset($content["ok"],$content["method"],$content["code"],$content["result"])){

            $this->set( $content["ok"]?: false,$content["method"], $content["code"],$content["result"]);


        };
    }

    public function toArray(){

        return array(

            "ok"=>$this->ok,
            "method"=>$this->method,
            "code"=>$this->code,
            "result"=>$this->result,
            "isfile" =>$this->result instanceof FileContent ? true : false, 
            
        );

    }

    public function __toString(){

        return \json_encode($this->toArray());

    }


}