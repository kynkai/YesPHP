<?php
namespace Yes;

trait ArrayConcat{

    public static function loop(&$data,$listener = null){

        $newData = $data;

        if(is_array($data)){

            foreach ($data as $key => $value) {

                $value = 
                ArrayConcat::loop($value,$listener);

                if($listener){

                    $listener($key,$value,$newData);
        
                }
        
                if($key !== false)
        
                $newData[$key] = $value;
            }

            return $newData;

        } else return $data;

        return $newData;

    }

}