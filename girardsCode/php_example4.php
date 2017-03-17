<?php
    include_once "functions.php";
    include "classes.php";

    if (function_exists("myFunction"))
    {
        echo "Happy <br>";

    }
    else
    {
        echo "Sad <br>";
    }

    $object = new User;
    $object->name = "Bob";
    $object->password = "Fred";
    print_r($object);
    echo "<br>";
    $object->save_user();
    echo "<br>";
    $temp = new User("name","password");
    print_r($temp);

    $temp2 = new User("John");
    print_r($temp2);

    $temp3 = new Subscriber("John","Smith", "Phone");
    print_r($temp3);

    $diceRoller = new RandomNumberGenerator;
    $diceRoller->printArray();
    $diceRoller->fillArray();
    $diceRoller->printArray();

?>

<br>


