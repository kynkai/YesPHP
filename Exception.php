<?php

namespace Yes;

use Psr\Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\LineFormatter;

class Exception extends AbstractException
{
    public $len = 150;

    public static $Logger = null;

    public function __construct($message = null, $code = 0)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);

        if(self::$Logger instanceof Log\LoggerInterface){

            $stream = new StreamHandler(__DIR__.'/exception.log', Logger::DEBUG);

            self::$Logger->pushHandler($stream);

            self::$Logger->error(substr($this,0,$this->len));

            $stream->close();

            self::$Logger->popHandler();

        }
    }

    public static function createLogger(){

        if(self::$Logger == null){

            $logger = new Logger('Exception');
            $logger->pushHandler(new FirePHPHandler());
            self::$Logger = $logger;

        }

    }

}