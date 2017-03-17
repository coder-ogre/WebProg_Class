<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>


<body>
<div>
This is some more text.
<br>
<?php
/*
 This is a multiline comment

  String concat operator is '.'
 */
    /* Simple If */
    $data = "Hello World\n";
    echo nl2br($data);
    if ($data == "Hello World")
    {
        echo "Goodbye";
    }
    elseif ($data == "Hi")
    {
        echo "Bye";
    }

    /* Arrays */
    $team = array('Bill', 'Mike', 'Chris', 'Anne');
    echo $team[3];
    $team[2] = "Zach\n"; /* single quoutes ' ' does not recognize the escape character */
    echo nl2br($team[2]);
    $schools = array_fill(0, 100, -1);
    echo "<ul>\n";
    
    foreach($schools as $school)
    {
        echo "<li>";
        echo $school;
        echo "</li>\n";
    }
    echo "</ul>\n";
?>
</div>
</body>
</html>
