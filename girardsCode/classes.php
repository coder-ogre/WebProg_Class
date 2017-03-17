<?php
class RandomNumberGenerator
{
    const MIN_V = 1;
    const MAX_V = 6;
    const NUM_TRIALS = 1000;
    const NUM_VALUES = 6; //self::MAX_V - self::MIN_V + 1;
    public $results;

    function __construct()
    {
        $this->results = array_fill(0,self::NUM_VALUES,0);
    }

    function printArray()
    {
        echo $this->results;
        $index = 0;
        foreach($this->results as $result)
        {
            echo "Result[".$index."] = ".$result."<br>\n";
            $index++;
        }
    }

    function fillArray()
    {
        for($index=0;$index<self::NUM_TRIALS;$index++)
        {
            $this->results[mt_rand(self::MIN_V,self::MAX_V)]++;
        }
    }

}


?>


<?php

class User
{
    public $name, $password;

// Only one constructor, what ever parameters you give it, it uses and fills in
// the rest with default values.
    function __construct($param1, $param2)
    {
        echo "Constructor";
        $name = 6; // This $name is local, while $this->name is the instance variable.
        $this->name = $param1;
        $this->password = $param2;
    }
  /* Cannot overload a function in php
    function save_user()
    {
        echo "Small Save";
    }*/

    function save_user($param1, $param2, $param3)
    {
        echo "Save user code goes here";
    }
}

class PC
{
    public $data;
}

class Subscriber extends User
{
    public $phone, $email;

    function __construct()
    {
    }

    function display()
    {
        echo "Name: ".$this->name."<br>";
    }
}

?>
