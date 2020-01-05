<?php
namespace Yes;

abstract class ResultAbstract
{

    const FAILURE                        = 0;

    const SUCCESS                        = 1;

    protected $code;

    protected $identity;

    protected $messages;

    public function __construct($code, $identity, array $messages = [])
    {
        $this->code     = (int) $code;
        $this->identity = $identity;
        $this->messages = $messages;
    }

    public function isValid()
    {
        return ($this->code > 0);
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getIdentity()
    {
        return $this->identity;
    }

    public function getMessages()
    {
        return $this->messages;
    }

}