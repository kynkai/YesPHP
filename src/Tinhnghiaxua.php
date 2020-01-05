<?php

namespace Yes;

function _require($path,$file,$type = false){

    $filepath = $path."/".$file;

    if(file_exists($filepath)){

        if($type) require($filepath);

        return $filepath;//;

    }else{

        throw new Exception("File not exists");
        
    }

}