<body>
<style type="text/css">
    input[type="text"] {
    width:148px; }
    input[typ="number"] {
    width:148px; }
}
</style>
<?php
  ob_start();// keeps output from being displayed, while still allowing functions to perform
  include_once "CreateConnection.php"; // provides code to establish a connection to my database
  $conn = createConnection();// establishes a connection to my database
  ob_end_clean(); // end of output restriction.  things will be able to be output normally
  
  echo "<h1 style = \"text-align: center;\">Drew Misicko's Assignment 6</h1>";
  echo "<h2 style = \"text-align: center;\">PHP Form Handling. <a href=\"http://webprog.cs.ship.edu/webprog12/index.html\">Or back to the index</a></h2>";
  
  addForm();
  
  // form to add products
  function addForm()
  {
    echo<<<_ADDFORM
  <form method = "post" action = "a6phpForm.php">
      <hr />
      <h4>&nbsp&nbspUse this form to add an item to the database.</h4>
      <label>&nbsp</label>
			<input type = "text" name = "addNameField" placeholder = "Name (Required)">
      <label></label>
			<input type = "text" name ="addManufacturerField" placeholder = "Manufacturer (Required)">
      <label></label>
			<input type = "text" name = "addRatingField" placeholder = "Rating (0 to 5)">
      <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
      <input type = "text" name = "addQuantityField" placeholder = "Quantity (integer)">
      <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
      <input type = "radio" name = "whichVendor" value = "Amazon">
      <label>Amazon</label>
      <input type = "radio" name = "whichVendor" value = "NewEgg">
      <label>NewEgg</label>
      <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			<input type = "submit" name = "addProduct" value = "Add to Database">
		</form>
    <hr />
_ADDFORM;
    //echo "</div>";
  }
  
  function displayProducts($conn)
  {
  echo "<h4>&nbsp&nbspClick in each cell to change a value, then click update.  Or just delete the entire row, if you prefer.</h4>";
  echo "<table border=\"4\">";
    echo "<tr>";
      echo "<th>Name</th>";
      echo "<th>Vendor</th>";
      echo "<th>Manufacturer</th>";
      echo "<th>Amazon Rating</th>";
      echo "<th>Amazon Quantity</th>";
      echo "<th>NewEgg Rating</th>";
      echo "<th>NewEgg Quantity</th>";
      echo "<th>Delete</th>";
      echo "<th>Update</th>";
    echo "</tr>";

    $result = $conn->query("SELECT * FROM AMAZON ORDER BY name, vendor");
    if (!$result) die ("Database access failed: " . $conn->error);
    while($row = $result->fetch_assoc())
    {                                      // displays Amazon Products and allows for modification or deletion
      echo<<<AMAZONRESULTS
        <tr>
          <form action="a6phpForm.php" method="post">
          <td> <input type="text" name="name" value=$row[name]> </td> 
          <td> <input type="text" name="vendor" value=$row[vendor]> </td> 
          <td> <input type="text" name="manufacturer" value=$row[manufacturer]> </td>
          <td> <input type="text" name="rating" value = $row[rating]> </td> 
          <td> <input type="text" name="quantity" value=$row[quantity]> </td> 
          <td> </td>
          <td> </td>
          <td><input type="hidden" name="productID" value = $row[productID]>
          <input type="submit" name = "delete" value="Delete"></td>
          <td><input type="submit" name = "update" value="Update"></td>
        </form>
        </tr>        
AMAZONRESULTS;
    }
    $result = $conn->query("SELECT * FROM NEWEGG ORDER BY name, vendor");
    if (!$result) die ("Database access failed: " . $conn->error);
    while($row = $result->fetch_assoc())
    {                                      // displays NewEgg Products and allows for modification or deletion
      echo<<<NEWEGGRESULTS
      <tr>
          <form action="a6phpForm.php" method="post">
          <td> <input type="text" name="name" value=$row[name]> </td> 
          <td> <input type="text" name="vendor" value=$row[vendor]> </td> 
          <td> <input type="text" name="manufacturer" value=$row[manufacturer]> </td>
          <td> </td>
          <td> </td>
          <td> <input type="text" name="rating" value = $row[rating]> </td> 
          <td> <input type="text" name="quantity" value=$row[quantity]> </td> 
          <td><input type="hidden" name="productID" value = $row[productID]>
          <input type="submit" name = "delete" value="Delete"></td>
          <td><input type="submit" name = "update" value="Update"></td>
        </form>
        </tr>        
NEWEGGRESULTS;

    }
    echo "</table>";
  }
  
  if(isset($_POST['addProduct']) && !(strlen(get_post($conn, 'addNameField')) == 0) && !(strlen(get_post($conn, 'addManufacturerField')) == 0))  // code to allow products to be added
  {
    $name = get_post($conn, 'addNameField');
    echo "$name <br />";
    $vendor = get_post($conn, 'whichVendor');
    $manufacturer = get_post($conn, 'addManufacturerField');
    $rating = get_post($conn, 'addRatingField');
    $quantity = get_post($conn, 'addQuantityField');
    $query = $conn->prepare("INSERT INTO ".strtoupper($vendor)."(name, vendor, manufacturer, rating, quantity) VALUES(?,?,?,?,?)");
    $query->bind_param('sssdi', $name, $vendor, $manufacturer, $rating, $quantity);
    
    $result = $query->execute();
    if (!$result) echo "Update failed2: ".$conn->error;
  }
  
  
  if( isset($_POST['update']) ) 
  {         // code to allow products to be updated
    $name = get_post($conn, 'name'); 
    $vendor= get_post($conn, 'vendor'); 
    $manufacturer = get_post($conn, 'manufacturer'); 
    $rating = get_post($conn, 'rating'); 
    $quantity = get_post($conn, 'quantity'); 
    $productID = get_post($conn, 'productID');  
    $query=$conn->prepare("update ".strtoupper($vendor)." set name = ?, vendor = ?, manufacturer = ?, rating = ?, quantity = ? 
                        WHERE productID = ?"); 
    $query->bind_param("sssdii", $name, $vendor, $manufacturer, $rating, $quantity, $productID);
    
    $result = $query->execute(); 
    if (!$result) echo "Update failed2: ".$conn->error;
  } 
  
  if( isset($_POST['delete']) ) 
  {     // code to allow products to be deleted
    $vendor= get_post($conn, 'vendor');
    $productID = get_post($conn, 'productID');  
    $query=$conn->prepare("delete from ".strtoupper($vendor)." WHERE productID = ?");
    $query->bind_param("i", $productID);
    
    $result = $query->execute(); 
    if (!$result) echo "Update failed2: ".$conn->error;
  } 
        
  displayProducts($conn); // have to call this function down here, otherwise it doesn't update after post functions are used
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNote: ".
  "If you delete all the products, and want them back, click <a href=\"http://webprog.cs.ship.edu/webprog12/a5basicDatabase.php\">here</a> to visit Assignment 5's page to revert database to initial status, then come back here afterwards.<br /><br />";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFor later: ".
       "in the future, I'd like to figure out how to add names with spaces in them.";
  echo "<h2>Source:</h2>";
  echo show_source(__FILE__); // displays source code  
  
  function get_post($conn, $var) // code to sanitize data
  { 
    return $conn->real_escape_string($_POST[$var]); 
  }  
?>
</body>
