<?php
namespace Yes;

class I2terator extends Entity implements \Iterator, \Countable 
{
    protected $var = [];

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function first($isme = true){

        $data = $this->var[key($this->var)];

        return $isme ? new self($data) : $data ;

    }

    public function rewind()
    {
        reset($this->var);
    }
  
    public function current()
    {
        $var = current($this->var);
        return $var;
    }
  
    public function key() 
    {
        $var = key($this->var);
        return $var;
    }
  
    public function next() 
    {
        $var = next($this->var);
        return $var;
    }
  
    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }

    public function toArray(){
        return $this->var;
    }

    public function __invoke($key,$value = null)
    {

        if(array_key_exists($key,$this->var)){

            if($value){

                $this->var[$key] = $value;

                return $this;

            }else{

                $obj = $this->var[$key];

                if(is_array($obj)){

                    return new self($obj);

                }else if(true || is_a($obj,self::class)){

                    return $obj;

                }

            }


        }

        return null;

    }

    public static function __set_state($an_array)
    {
        $obj = new A;
        $obj->var1 = $an_array['var1'];

        return $obj;
    }

    public function __debugInfoo() {

        //return $this;
    }

    public function __call($name, $arguments)
    {
        echo "Calling object method '$name' "
             . implode(', ', $arguments). "\n";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Calling static method '$name' "
             . implode(', ', $arguments). "\n";
    }

    public function add($value,$key = null) {

        if(!$key) {

           array_push($this->var,$value);

        }else if(!array_key_exists($key,$this->var)){

            $this->var[$key] = $value;

        }
        
    }

    public function count()
    {
        return count($this->var);
    } 

    public static function canLoop($var){

        if(is_array($var) || is_a($var,self::class)){

            return true;
        }

        return false;

    }

}

/*

$values = array(1,"2"=>new I2terator([4,6,7]),"3"=>3);

$it = new I2terator($values);

$it->add('value 1');
$it->add('value 2');
$it->add('value 3');


if($a = $it(2)(3)){

    var_dump($a);

}


foreach ($it as $a => $b) {

    if(I2terator::canLoop($b)){

        foreach ($b as $x => $y) {

            print "$x: $y\n";
    
        }

    }

    print "$a: $b\n";
}

*/


?>
