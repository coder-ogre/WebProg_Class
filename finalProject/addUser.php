<?php
  ob_start();// keeps output from being displayed, while still allowing functions to perform
  include_once "dbConnection.php"; // provides code to establish a connection to my database
  $conn = createConnection();// establishes a connection to my database
  ob_end_clean(); // end of output restriction.  things will be able to be output normally
  if(isset($_POST['userName']))
    $userName = get_post($conn, $_POST['userName']);// fix_string or get_post
  if(isset($_POST['password']))
    $password = get_post($conn, $_POST['password']);// fix_string or get_post
  if(isset($_POST['userType']))
    $userType = get_post($conn, $_POST['userType']);// fix_string or get_post
  $fail  = validate_userName($userName);
  $fail .= validate_password($password);
  $fail .= validate_userType($userType);
  if(isset($_POST['submit']))
  {
    if($fail == "")
    {
      // add code to add user to database right here
      $query = $conn->prepare("INSERT INTO users(user_name, password, user_type) VALUES(?,?,?)");
      $query->bind_param('sss', $userName, $password, $userType);
      $result = $query->execute();
      if (!$result) echo "Update failed2: ".$conn->error;
      else
      echo "User has been successfully added to the database.";
      
      
      $OnOrOff = 1;
      for($counter = 0; $counter < 100; $counter++)
      {
        $alreadyUsed[$counter] = 0;
      }
      $result = $conn->query("SELECT * FROM planets");
      if (!$result) die ("Database access failed: " . $conn->error);
      while($row = $result->fetch_assoc())
      {                     
        $alreadyUsed[$row[user_planet_id]] = 1;
      }
      $candidate = rand(0, 99);
      while($onOrOff == 1)
      {
        if($alreadyUsed[$candidate] == 1)
        {
          $candidate = rand(0, 99);
        }
        else
        {
          $onOrOff == 0;
        }
      }
      $result = $conn->query("SELECT * FROM users WHERE user_name = $userName");
      if (!$result) die ("Database access failed: " . $conn->error);
      while($row = $result->fetch_assoc())
      {                           
        $theUserId = $row[user_id]
      }
      $result = $conn->query("SELECT * FROM planets WHERE user_id = $theUserId");
      if (!$result) die ("Database access failed: " . $conn->error);
      while($row = $result->fetch_assoc())
      {                     
        $alreadyUsed[$row[user_planet_id]] = 1;
      }
      $thePlanetLocation = $candidate;
      $theResources = 1;
      $query = $conn->prepare("INSERT INTO planets(user_id, planet_location, planet_resources) VALUES(?,?,?)");
      $query->bind_param('sss', $theUserId, $thePlanetLocation, $theResources);
      $result = $query->execute();
      if (!$result) echo "Update failed2: ".$conn->error;
      else
      echo "A planet has been successfully added to the database.";
      
      
      $result = $conn->query("SELECT * FROM planets WHERE user_id = $theUserId");
      if (!$result) die ("Database access failed: " . $conn->error);
      while($row = $result->fetch_assoc())
      {                           
        $thePlanetId = $row[user_planet_id];
      }
      $theShipCount = 1;
      $query = $conn->prepare("INSERT INTO ships(user_planet_id, ship_count) VALUES(?,?)");
      $query->bind_param('sss', $thePlanetId, $theShipCount);
      $result = $query->execute();
      if (!$result) echo "Update failed2: ".$conn->error;
      else
      echo "A ship has been successfully added to the database.";
      
      // end of code to add user to database
    }
    else 
      echo $fail;
  }
  // validates to check for valid integers with php
  function validate_userName($field)
  {
    if ($field == "")
      return $label."String [a-z], [A-Z]: Nothing was entered.<br />";
    else if (preg_match("/[^a-zA-Z]/", $field))
      return $label."String [a-z], [A-Z]: String must only contain characters from the English alphabet.<br />";
    return "";
  }
  // validates to check for valid decimal numbers with php 
  function validate_password($field)
  {    
    if ($field == "")
      return $label."String [a-z], [A-Z]: Nothing was entered.<br />";
    else if (preg_match("/[^a-zA-Z]/", $field))
      return $label."String [a-z], [A-Z]: String must only contain characters from the English alphabet.<br />";
    return "";
  }
  // validates to check for valid strings with php 
  function validate_userType($field)
  {
    if ($field == "")
      return $label."String [a-z], [A-Z]: Nothing was entered.<br />";
    else if (preg_match("/[^a-zA-Z]/", $field))
      return $label."String [a-z], [A-Z]: String must only contain characters from the English alphabet.<br />";
    return "";
  }
  
  /*function fix_string($string)
  {
    if(get_magic_quotes_gpc()) $field = stripcslashes($string);
    return htmlentities($string);
  }*/
  
  function get_post($conn, $var) // code to sanitize data
  { 
    return $conn->real_escape_string($_POST[$var]); 
  }  
?>