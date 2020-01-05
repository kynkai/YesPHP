<?php
namespace Yes\_Trait;

trait FakerTrait{

    public static $faker;
    
    public function __constructTrait(){

        self::$faker = \Faker\Factory::create($this->getLocation());

    }

    public function toFaker(){

        $this->faker(self::$faker);

        return $this;

    }

    public abstract function faker($faker);


    public function getLocation(){

        self::$faker && self::$faker = null;

        return "en_US";

    }

}