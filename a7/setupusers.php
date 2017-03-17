<?php
  // Drew Misicko
  ob_start();// keeps output from being displayed, while still allowing functions to perform
  include_once "CreateConnection.php"; // provides code to establish a connection to my database
  $conn = createConnection();// establishes a connection to my database
  ob_end_clean(); // end of output restriction.  things will be able to be output normally
  
  echo "<h1 style = \"text-align: center;\">Drew Misicko's Assignment 7</h1>";
  echo "<h2 style = \"text-align: center;\">2 users are automatically generated on this page.<a href=\"http://".
    "webprog.cs.ship.edu/webprog12/index.html\">Here is a link to my main index.</a></h2>";
  
  $sqlStr = "DROP TABLE IF EXISTS users;";
    $query = $conn->query($sqlStr);
    if($conn->error) die($conn->error);
    else
      echo "<br />Dropped users Table.<br />";
  
  $query = "CREATE TABLE users (
    forename VARCHAR(32) NOT NULL,
    surname VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
  )";
  $result = $conn->query($query);
  if(!$result) die($conn->error);
  else echo "Table users made<br />";
  
  $salt1 = "qm&h*";
  $salt2 = "pg!@";
  
  $forename = 'Bill';
  $surname = 'Smith';
  $username = 'bsmith';
  $password = 'mysecret';
  $token = hash('ripemd128', "$salt1$password$salt2");
  
  add_user($conn, $forename, $surname, $username, $token);
  echo "Bill added<br />";
  
  $forename = 'Pauline';
  $surname = 'Jones';
  $username = 'pjones';
  $password = 'acrobat';
  
  $token = hash('ripemd128', "$salt1$password$salt2");
  
  add_user($conn, $forename, $surname, $username, $token);
  echo "Pauline added<br />";
  
   echo<<<_ASSIGNMENT7PAGES
   <br /><br />
    <table>
      <tr>
          Click <a href="a7login.php">here</a> to go back to the other assignment 7 pages where you can view the source for either page.
      </tr>
    </table>
_ASSIGNMENT7PAGES;
  
  echo "<h2>Adding Users Source Code:</h2>";
  echo show_source(__FILE__);
  
  function add_user($conn, $fn, $sn, $un, $pw)
  {
    $query = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
    $result = $conn->query($query);
    if(!$result) echo $conn->error;
  }
?>