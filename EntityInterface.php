<?php

namespace Yes;

interface EntityInterface {

    public function getId();

    public function makeId($args);

    public function jettison();

    public static function arrayTo($data);

    public function makeMe(...$args);


}