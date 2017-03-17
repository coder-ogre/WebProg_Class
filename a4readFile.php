<!DOCTYPE html>
<html>
  <body>
  <h1 style ="text-align:center;">"Drew Misicko&#39s Assignment 4"</h1>
  <h3 style="text-align:center;">Reads the first 10 lines from assignment 3</h3>
  
  <?php
    $file = fopen("a3producttable.php", "r");
    $count = 10;
    echo "<strong>";
    echo "<xmp>";
    for($i = 0; $i < $count; $i++)
    {
      echo fgets($file);
    }
    echo "</xmp>";
    echo "</strong>";
    
    echo "<br /><p>There.  I&#39ve read 10 lines of text from the source code of my Assignment 3 file.  ";
    echo "Below you can see how I did it, by looking at the source code for this page.</p>";
    echo show_source(__FILE__);
  
  ?>
  </body>
</html>