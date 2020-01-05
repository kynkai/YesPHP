<?php

namespace Yes;

class TemporaryException extends Exception {

    public function __construct($message = null, $code = 0)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }

        parent::__construct($message, $code);

    }

}