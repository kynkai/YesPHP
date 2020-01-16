<?php
namespace Yes;

/*
$unRegex = new UnRegex($content,[
    new Between("try{","}catch(e){_DumpException(e)}")
],[]);

$result = $unRegex->extract();

//$result->find(Between::class);

return;

*/

/*

$content= file_get_contents("data/js/cdos.js");

$content = UnRegex::takes("try{","}catch(e){_DumpException(e)}",$content,[
    "clear"=>true
]);

var_dump($content);

return;

*/

class UnRegex {

    public $handlers;

    public $options;

    public $content;

    public function __construct($content,$handlers,$options = [])
    {
        $this->handlers = $handlers;
        $this->options = $options;
        $this->content = $content;
    }

    public function extract(){

        $str = $this->content;

        for ($i = 0; $i < strlen($str); $i++){

            foreach ($this->handlers as $key => $value) {
                
                $value->itOne($str[$i]);

            }

        }
        
    }

    public static function take($begin,$end,$content,$options = []){

        $pos_0 = strpos($content, $begin); 

        if(is_bool($pos_0) && $pos_0 ==false) return;
    
        $content = substr($content,$pos_0
        // + strlen($begin)
    );
    
        $pos_0 = strpos($content, $end); 

        if(is_bool($pos_0) && $pos_0 == false) return;
    
        $content = substr($content,0,$pos_0

        + strlen($end)

    );
    
        return $content;
    
    }

    public static function takes($begin,$end,$content,$options = []){

        $_content = true;

        $contents = [];

        while ($_content !== null) {

            $_content = self::take($begin,$end,$content);

            $content = str_replace($_content,"",$content);

            if($_content){

                if(isset($options["clear"])) {

                    $_content = str_replace($begin,"",$_content);
    
                    $_content = str_replace($end,"",$_content);
    
                }
    
                array_push($contents,$_content);

            }

        }

        return $contents;

    }

}