<?php
namespace Yes;

trait SingletonAbstract {

    public static $in = null;
   
    public static function getInstance($_instance = null)
    {
      if (!self::$in && $_instance)
      {
        self::$in = $_instance;
      }

      //if($nin = self::setupInstance()){self::$in = $nin;}
   
      return self::$in;
    }

    public static function setupInstance(){

      return false;

    }

    public static function _(){


    }
}