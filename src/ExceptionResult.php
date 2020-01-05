<?php

namespace Yes;

class ExceptionResult extends Exception
{
    public $result;

    public function __construct($result, $message = "ExceptionResult", $code = 0 )
    {

        parent::__construct($message, $code);

        $this->result = $result;

    }

}