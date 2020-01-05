<?php
namespace Yes;

interface MergerPrototypesInterface{

    public const CONSTRUCT_ARRAY = "CONSTRUCT_ARRAY";

    public const CONSTRUCT_GIVEMORE = "CONSTRUCT_ARRAY";

    public function getResult();

    public function getType();

}