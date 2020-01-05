<?php
namespace Yes;

interface SerializationInterface{

    public function serialize();
    public static function unserialize($data);

}