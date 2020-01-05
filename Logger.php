<?php
namespace Yes;
use Psr\Log;
use Monolog\Logger as _Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\LineFormatter;
use Yes\SingletonAbstract;


class Logger extends SingletonAbstract {

    public $logDebug;

    public $logException;

    public $logInfo;

    public $logNotice;

    public $listLog = [];

    public function __construct(_Logger $monolog = null){
        $this->logDebug = new _Logger('debug');
        $this->logException = new _Logger('exception');
        $this->logInfo = new _Logger('info');
        $this->logNotice = new _Logger('notice');
        $this->logDebug->pushHandler(new StreamHandler(__DIR__.'/your.log', _Logger::WARNING));
        $this->logException->pushHandler(new StreamHandler('your.log', _Logger::WARNING));
        $this->logInfo->pushHandler(new StreamHandler('your.log', _Logger::WARNING));
        $this->logNotice->pushHandler(new StreamHandler('your.log', _Logger::WARNING));
    }

    public function debug($mess = ""){

        return $this->logDebug->debug($mess);

    }

    public function exception(){

        //return $this->

    }

    public function info(){


    }

    public function notice(){


    }

}