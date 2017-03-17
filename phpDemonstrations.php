<!DOCTYPE html>
<html>
<body>
<h1>Drew Misicko's PHP Demonstrations</h1> Click <a href='http://webprog.cs.ship.edu/webprog12/'>here</a> to go to the site directory, or <a href="http://webprog.cs.ship.edu/webprog12/htmlDemonstrations.html">here</a> to go to the HTML demo.
<?php
    echo "<h2>While loop</h2>";
    $i = 1;
    while($i <= 10)
    {
        echo $i."<br />";
        $i++;
    }
    echo "<br /><strong>Source:</strong>";
    echo "<br />\$i = 1;<br />";
    echo "while(\$i <= 10)<br />";
    echo "{<br />";
    echo "    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspecho \$i;<br />";
    echo "    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp\$i++;";
    echo "<br />}";
    
    echo "<hr /><h2>For loop</h2>";
    for($j = 1; $j <= 10; $j++)
    {
        echo $j."<br />";
    }
    echo "<br /><strong>Source:</strong>";
    echo "<br />for(\$j = 1; \$j <= 10; \$j++)";
    echo "<br />{";
    echo "<br />    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspecho \$j;";
    echo "<br />}";

    echo "<hr /><h2>If statement</h2>";
    if($i < 20)
        echo $i."<br />";
    else echo "20<br />";
    echo "<br /><strong>Source:</strong>";
    echo "<br />if(\$i < 20)";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspecho \$i;";
    echo "<br />else echo \"20\"";

    echo "<hr /><h2>Switch statement</h2>";
    $i = 13;
    switch($i)
    {
        case 12:
            echo "twelve"."<br />";
            break;
        case 13:
            echo "thirteen"."<br />";
            break;
        case 14: 
            echo "fourteen"."<br />";
            break;
        default:
            echo "sandwich"."<br />";
    }
    echo "<br /><strong>Source:</strong>";
    echo "<br />\$i = 13";
    echo "<br />switch(\$i)";
    echo "<br />{";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    case 12:";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        echo \"twelve\".\";";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        break;";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    case 13:";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        echo \"thirteen\".\";";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        break;";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    case 14: ";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        echo \"fourteen\".\";";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        break;";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    default:";
    echo "<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp        echo \"sandwich\".\";";
    echo "<br />}";
    
    echo "<hr /><h2>Type casting</h2>";
    //here $i is an integer
    $i = 1;
    echo gettype($i), "<br />";
    //here $i is type casted to a string
    $i = "".$i;
    echo gettype($i), "<br />";
    //here $i is converted to an integer again
    $i = $i + 1 - 1;
    echo gettype($i), "<br />";
    //here $i is converted to a double
    $i = $i + 0.0;
    echo gettype($i), "<br />";
    echo "<br /><strong>Source:</strong>";
    echo "<br />//here \$i is an integer";
    echo "<br />\$i = 1;";
    echo "<br />echo gettype(\$i);";
    echo "<br />//here \$i is type casted to a string";
    echo "<br />\$i = \"\".\$i;";
    echo "<br />echo gettype(\$i);";
    echo "<br />//here \$i is converted to an integer again";
    echo "<br />\$i = \$i + 1 - 1;";
    echo "<br />echo gettype(\$i);";
    echo "<br />//here \$i is converted to a double";
    echo "<br />\$i = \$i + 0.0;";
    echo "<br />echo gettype(\$i);";
?>
<br />
<hr />
Click <a href='http://webprog.cs.ship.edu/webprog12/'>here</a> to go to the site directory, or <a href="http://webprog.cs.ship.edu/webprog12/htmlDemonstrations.html">here</a> to go to the HTML demo.
</html>
</body>