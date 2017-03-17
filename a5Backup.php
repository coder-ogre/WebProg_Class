<?php
/*Drew Misicko
*/
  ob_start();// readies a file to be included but not displayed
  include_once "a3producttable.php"; //includes the classes i built from assignment 3 to use in my database
  ob_end_clean(); // gets rid of any resulting displayed content from the include

  echo "<h1 style=\"text-align: center;\">Drew Misicko</h1>";
  echo "<h2   style=\"text-align: center;\">Assignment 5: Basic Database Usage in PHP</h2>";
  echo "<p style=\"text-align: center;\"><a href=\"http://webprog.cs.ship.edu/webprog12/index.html\">Click here to go to my home page.</a></p><br />";
  
  echo "<span style=\"font-size: 70%;\">";
    $conn = createConnection(); // establishes the connection to my database
    dropTable($conn, "AMAZON");
    dropTable($conn, "NEWEGG");// drops the tables to start from scratch
    createTable($conn, "AMAZON");
    createTable($conn, "NEWEGG");// replaces the dropped tables with new ones
    addProducts($conn, $products); // gets products from assignment 3, and then adds 5 more from each vendor
  echo "</span>";
  displayTable($conn);// displays a table with sthe products in it
  
  echo "<h2>Source:</h2>";
  echo show_source(__FILE__); // displays source code      
  
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
  //displays a table with all of the information about the different products
  function displayTable($conn)
  {
    echo "<table border=\"4\">";
    echo "<tr>";
      echo "<th>Name</th>";
      echo "<th>Vendor</th>";
      echo "<th>Manufacturer</th>";
      echo "<th>Rating From Amazon System</th>";
      echo "<th>Quantity From Amazon Supply</th>";
      echo "<th>Rating From NewEgg System</th>";
      echo "<th>Quantity From NewEgg Supply</th>";
    echo "</tr>";
    
    $result = $conn->query("SELECT * FROM AMAZON ORDER BY name, vendor");
    if (!$result) die ("Database access failed: " . $conn->error);
    while($row = $result->fetch_assoc())
    {                                      // displays Amazon Products
      echo "<tr>";
      echo "<td>".$row[name]."</td>";
      echo "<td>".$row[vendor]."</td>";
      echo "<td>".$row[manufacturer]."</td>";
      echo "<td>".$row[rating]."</td>";
      echo "<td>".$row[quantity]."</td>";
      echo "<td></td>";
      echo "<td></td>";
      echo "</tr>";
    }
                                                
    $result = $conn->query("SELECT * FROM NEWEGG ORDER BY name, vendor");
    if (!$result) die ("Database access failed: " . $conn->error);
    while($row = $result->fetch_assoc())
    {                                      // displays NewEgg Products
      echo "<tr>";
      echo "<td>".$row[name]."</td>";
      echo "<td>".$row[vendor]."</td>";
      echo "<td>".$row[manufacturer]."</td>";
      echo "<td></td>";
      echo "<td></td>";
      echo "<td>".$row[rating]."</td>";
      echo "<td>".$row[quantity]."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  
  // inserts 10 entries into each of the table of each of the two vendors
  function addProducts($conn, $products)
  {
  
    //First the Amazon products are added...
      for($i = 0; $i < 5; $i++)
      {                 ///     This for loop loads products created during assignment 3 (5 of them)
        addProduct($conn, $products[0][$i]->getName(), $products[0][$i]->getVendor(), $products[0][$i]->getManufacturer(), 
                      $products[0][$i]->getRating(), $products[0][$i]->getQuantity());
      }   // after the 4 loop, 5 more products have to be generated... here they are
      addProduct($conn, "Frindle", "Amazon", "FrindlesUnlimited", 2.73, 54);
      addProduct($conn, "Orangatang", "Amazon", "OrangatangsUnlimited", 4.85, 2);
      addProduct($conn, "Apron", "Amazon", "ApronsUnlimited", 3.28, 9);
      addProduct($conn, "Metronome", "Amazon", "MetronomesUnlimited", 4.24, 8);
      addProduct($conn, "Needle", "Amazon", "NeedlesUnlimited", 2.38, 71);
      echo "All products have been loaded into the database table AMAZON.<br />";
    
    //Then the NewEgg products are added...
      for($i = 0; $i < 5; $i++)
      {                 ///     This for loop loads products created during assignment 3 (5 of them)
        addProduct($conn, $products[1][$i]->getName(), $products[1][$i]->getVendor(), $products[1][$i]->getManufacturer(), 
                      $products[1][$i]->getRating(), $products[1][$i]->getQuantity());
      }   // after the 4 loop, 5 more products have to be generated... here they are
      addProduct($conn, "Pan", "NewEgg", "PansUnlimited", 2.84, 28);
      addProduct($conn, "Can", "NewEgg", "CansUnlimited", 3.2, 7);
      addProduct($conn, "Alacazam", "NewEgg", "AlacazamsUnlimited", 2.7, 1);
      addProduct($conn, "Laptop", "NewEgg", "LaptopsUnlimited", 0.4, 6);
      addProduct($conn, "Flashlight", "Newegg", "FlashlightsUnlimited", 1.94, 13);
      echo "All products have been loaded into the database table NEWEGG.";
  }
  
  // adds a specified product to the table associated with the specified vendor
  function addProduct($conn, $name, $vendor, $manufacturer, $rating, $quantity)
  {
    $query = "LOCK TABLES ".strtoupper($vendor)." WRITE";
    $result = $conn->query($query);
    
    $query = $conn->prepare("INSERT INTO ".strtoupper($vendor)."(name, vendor, manufacturer, rating, quantity) VALUES(?,?,?,?,?)");
    $query->bind_param('sssdi', $name, $vendor, $manufacturer, $rating, $quantity);
    $result = $query->execute();
    
    $query = "UNLOCK TABLES";
    $result = $conn->query($query);
            
    if(!$result) die($conn->error);
    //else
    //  echo("$name has been added to the ".strtoupper($vendor)." table.<br />");
  }
  
  // creates a table with a specified name.
  function createTable($conn, $table)
  {                                                                                                                                       
    /*$sqlStr = "CREATE TABLE $table(name VARCHAR(150), vendor VARCHAR(150), manufacturer VARCHAR(150), rating DECIMAL(4, 2), quantity INT, PRIMARY KEY(name, vendor))";*/
    $sqlStr = "CREATE TABLE $table(name VARCHAR(150), vendor VARCHAR(150), manufacturer VARCHAR(150), rating DECIMAL(4, 2), quantity INT, productID INT primary key AUTO_INCREMENT)";
    $result = $conn->query($sqlStr);
    if(!result) die($conn->error);
    else
      echo "Created the $table table.<br />";
    if(strcmp("NEWEGG", strtoupper($table)) == 0)
      echo "<br />";
  }
    
  // drops a specified table
  function dropTable($conn, $table)
  {
    $sqlStr = "DROP TABLE IF EXISTS $table;";
    $query = $conn->query($sqlStr);
    if($conn->error) die($conn->error);
    else
      echo "Dropped ".$table." Table.<br />";
  }
  
  //establishes the connection to my database
  function createConnection()
    {
        if (file_exists("./db_info/db_login_info.txt")) 
        {
            echo "File exists.<br />";
            $fh = fopen("./db_info/db_login_info.txt","r");
            $user_name = fgets($fh);
            $pwd = fgets($fh); 
            $user_name = trim(preg_replace('/\R+/', ' ',$user_name));
            $pwd = trim(preg_replace('/\R+/', ' ',$pwd));
            $db_host = 'webprog.cs.ship.edu';
            $db = 'webprog12';
            $conn = new mysqli($db_host,$user_name,$pwd,$db);
            echo "Tried to Connect.<br />";
            if ($conn->connect_error) die($conn->connect_error);
            else 
            {
                echo "Connection was a success. <br /><br />";
                return $conn;
            }
        }
    }
?>