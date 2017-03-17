<?php
    function myFunction($param1, $param2)
    {
        static $count = 0;
        $number = $param1;
        $text = $param2;

        $text_num = "".$number;
        $text_sub_num = substr($number,0,1);
  
        $num_text = $text + 5;
        $count++;
        echo gettype($num_text)." ".$num_text." ".$count;
        return "data";
    }
?>
