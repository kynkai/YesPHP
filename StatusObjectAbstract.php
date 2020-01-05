<?php
namespace Yes;

abstract class StatusObjectAbstract
{

    public static $LOOSEN = false;

    public function loosen(){

        self::$LOOSEN = true;

        return $this;

    }

}