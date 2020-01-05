<?php
namespace Yes\Result;

use Yes\ResultAbstract;

class AuthResult extends ResultAbstract implements AuthResultInterface
{

    public function __construct($code, $identity, array $messages = [])
    {
        parent::__construct($code, $identity, $messages );

    }

}