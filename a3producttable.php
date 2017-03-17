<!DOCTYPE html>
<html>
  <body>
  <h1>Drew Misicko's A3: Product Tables</h1>
  <p>Note: I decided rating and quantity probably came from each vendor's own database, and therefore should depend on the vendor, making them traits that belong to the child class of each vendor, rather than to the generic class.
  <?php

    class GenericProduct
    {
                //name
      protected $name;
                //vendor
      protected $vendor;
                //manufacturer
      protected $manufacturer;
      
      // Only one constructor, what ever parameters you give it,
      // it uses and fills in the rest with default values.
      function __construct($name, $vendor, $manufacturer)
      {
        // initializes name
        if(gettype($name) != "string")
        {
          $name = "".$name;
        }
        //now name is definitely a string
        $this->name = $name;
        
        // initializes vendor
        if(gettype($vendor) != "string")
        {
          $vendor = "".$vendor;
        }
        //now vendor is definitely a string
        $this->vendor = $vendor;
        
        // initializes manufacturer
        if(gettype($manufacturer) != "string")
        {
          $manufacturer = "".$manufacturer;
        }
        //now manufacturer is definitely a string
        $this->manufacturer = $manufacturer;
      }
      
      // gets name
      function getName()
      {
        return $this->name;
      }
      
      // gets vendor
      function getVendor()
      {
        return $this->vendor;
      }
      
      // gets manufacturer
      function getManufacturer()
      {
        return $this->manufacturer;
      }
      
      // sets name
      function setName($name)
      {
        if(gettype($name) != "string")
        {
          $name = "".$name;
        }
        //now name is definitely a string
        $this->name = $name;
      }
      
      // set vendor
      function setVendor($vendor)
      {
        if(gettype($vendor) != "string")
        {
          $vendor = "".$vendor;
        }
        //now vendor is definitely a string
        $this->vendor = $vendor;
      }
      
      // set manufacturer
      function setManufacturer($manufacturer)
      {
        if(gettype($manufacturer) != "string")
        {
          $manufacturer = "".$manufacturer;
        }
        //now vendor is definitely a string
        $this->manufacturer = $manufacturer;
      }
    }
    
    
    class AmazonProduct extends GenericProduct
    {
      // rating and quantity will both depend on the which vendor
      // unless the vendors share a rating system (unlikely).
      private $ratingA;
      private $quantityA;
      
      function __construct($name, $vendor, $manufacturer, $ratingA, $quantityA)
      {
      
        // initializes name
        if(gettype($name) != "string")
        {
          $name = "".$name;
        }
        //now name is definitely a string
        $this->name = $name;
        
        // initializes vendor
        if(gettype($vendor) != "string")
        {
          $vendor = "".$vendor;
        }
        //now vendor is definitely a string
        $this->vendor = $vendor;
        
        // initializes manufacturer
        if(gettype($manufacturer) != "string")
        {
          $manufacturer = "".$manufacturer;
        }
        //now manufacturer is definitely a string
        $this->manufacturer = $manufacturer;
        
        // initializes ratingA
        if(gettype($ratingA) != "double")
        {
          $ratingA = $ratingA + 0.0;
        }
        //forces value to act as a double.
        $this->ratingA = $ratingA;
        
        // initializes quantityA
        if(gettype($quantityA) != "integer")
        {
          $quantityA = $quantityA + 1 - 1;
        }
        //forces value to act as an integer.
        $this->quantityA = $quantityA;
      }
      
      // sets ratingA
      function setRating($ratingA)
      {
        if(gettype($ratingA) != "double")
        {
          $ratingA = $ratingA + 0.0;
        }
        $this->ratingA = $ratingA;
        //forces value to act as a double.
      }
      
      // sets QuantityA
      function setQuantity($quantityA)
      {
        if(gettype($quantityA) != "integer")
        {
          $quantityA = $quantityA + 1 - 1;
        }
        $this->quantityA = $quantityA;
        //forces value to act as an integer.
      }
      
      // gets ratingA
      function getRating()
      {
        return $this->ratingA;
      }
       
      // gets quantityA
      function getQuantity()
      {
        return $this->quantityA;
        
      }
    }
    
    
    class NewEggProduct extends GenericProduct
    {
      // rating and quantity will both depend on the which vendor
      // unless the vendors share a rating system (unlikely).
      private $ratingN;
      private $quantityN;
      
      function __construct($name, $vendor, $manufacturer, $ratingN, $quantityN)
      {
        // initializes name
        if(gettype($name) != "string")
        {
          $name = "".$name;
        }
        //now name is definitely a string
        $this->name = $name;
        
        // initializes vendor
        if(gettype($vendor) != "string")
        {
          $vendor = "".$vendor;
        }
        //now vendor is definitely a string
        $this->vendor = $vendor;
        
        // initializes manufacturer
        if(gettype($manufacturer) != "string")
        {
          $manufacturer = "".$manufacturer;
        }
        //now manufacturer is definitely a string
        $this->manufacturer = $manufacturer;
        
        // initializes ratingN
        if(gettype($ratingN) != "double")
        {
          $ratingN = $ratingN + 0.0;
        }
        //forces value to act as a double.
        $this->ratingN = $ratingN;
        
        // initializes quantityN
        if(gettype($quantityN) != "integer")
        {
          $quantityN = $quantityN + 1 - 1;
        }
        //forces value to act as an integer.
        $this->quantityN = $quantityN;
      }
      
      // sets ratingN
      function setRating($ratingN)
      {
        if(gettype($ratingN) != "double")
        {
          $ratingN = $ratingN + 0.0;
        }
        $this->ratingN = $ratingN;
        //forces value to act as a double.
      }
      
      // sets quantityN
      function setQuantity($quantityN)
      {
        if(gettype($quantityN) != "integer")
        {
          $quantityN = $quantityN + 1 - 1;
        }
        $this->quantityN = $quantityN;
        //forces value to act as an integer.
      }
      
      // gets ratingN
      function getRating()
      {
        return $this->ratingN;
      }
       
      // gets quantityN
      function getQuantity()
      {
        return $this->quantityN;
      }
    }
    
    // instantiates all of the products
    $productA1 = new AmazonProduct("Fork",       "Amazon",  "ForksUnlimited",       3.8,  232);
    $productA2 = new AmazonProduct("Spoon",      "Amazon",  "SpoonsUnlimited",      4.2,  572);
    $productA3 = new AmazonProduct("Knife",      "Amazon",  "KnivesUnlimited",      2.6,  274);
    $productA4 = new AmazonProduct("Plumbus",    "Amazon",  "PlumbusesUnlimited",   4.2,  683);
    $productA5 = new AmazonProduct("Brush",      "Amazon",  "BrushesUnlimited",     0.9,  2747);
    $productN1 = new NewEggProduct("Xbox",       "NewEgg",  "XboxesUnlimited",      3.7,  27);
    $productN2 = new NewEggProduct("Frisbee",    "NewEgg",  "FrisbeesUnlimited",    1.4,  94);
    $productN3 = new NewEggProduct("Collar",     "NewEgg",  "CollarsUnlimited",     3.0,  27);
    $productN4 = new NewEggProduct("Skateboard", "NewEgg",  "SkateboardsUnlimited", 2.1,  45);
    $productN5 = new NewEggProduct("Ball",       "NewEgg",  "BallsUnlimited",       4.7,  973);
    
    // stores the products into a 2-dimensional array
    $products = array(array($productA1, $productA2, $productA3, $productA4, $productA5),
                          array($productN1, $productN2, $productN3, $productN4, $productN5));
    
      /* //this tables inside of a table method isn't working... don't know why
    echo "<table border=\"4\">";
      echo "<tr>";
      echo "<th>Amazon</th>";
      echo "<th>NewEgg</th>";
      echo "</tr>";
      
      echo "<tr>";
      
        echo "<td>";
          echo "<table border=\"4\">";
            echo "<tr>";
              for($i = 0; $i < 5; $i++)
              {
                echo "<td>".$productTable[$i]->name."</td>";
              }
            echo "</tr>";
          echo "</table";
        echo "</td>";
        
        echo "<td>";
          echo "<table border=\"4\">";
            echo "<tr>";
              for($i = 5; $i < 10; $i++)
              {
                echo "<td>".$productTable[$i]->name."</td>";
              }
            echo "</tr>";
          echo "</table";
        echo "</td>";
        
      echo "</tr>";
    echo "</table>";
    */
    
    // puts the products into a table
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
    
    // puts the first part of the array, the Amazon products, into the table.
    for($i = 0; $i < 5; $i++)
    {      
      echo "<tr>";
      echo "<td>".$products[0][$i]->getName()."</td>";
      echo "<td>".$products[0][$i]->getVendor()."</td>";
      echo "<td>".$products[0][$i]->getManufacturer()."</td>";
      echo "<td>".$products[0][$i]->getRating()."</td>";
      echo "<td>".$products[0][$i]->getQuantity()."</td>";
      echo "<td></td>";
      echo "<td></td>";
      echo "</tr>";
    }
    
    // puts the second part of the array, the NewEgg products, into the table.
    for($i = 0; $i < 5; $i++)
    {      
      echo "<tr>";
      echo "<td>".$products[1][$i]->getName()."</td>";
      echo "<td>".$products[1][$i]->getVendor()."</td>";
      echo "<td>".$products[1][$i]->getManufacturer()."</td>";
      echo "<td></td>";
      echo "<td></td>";
      echo "<td>".$products[1][$i]->getRating()."</td>";
      echo "<td>".$products[1][$i]->getQuantity()."</td>";
      echo "</tr>";     
    }
  echo "</table>";
  
  echo "<h2>Source:</h2>";
  echo show_source(__FILE__);

  
  ?>
  </body>
</html>