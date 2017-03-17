<?php // Drew Misicko    addUser.php

  $fail = $username = $password = $usertype = "";
  
  if(isset($_POST['username']))
    $username = fix_string($_POST['forename']);
  if(isset($_POST['password']))
    $password = fix_string($_POST['password']);
  if(isset($_POST['userType']))
    $usertype = fix_string($_POST['userType']);
  
  $fail = validate_username($username);
  $fail .= validate_password($password);
  
  echo "<!DOCTYPE html>\n<html><head><title>An Example Form</title>";
  
  if($fail == "")
  {
    echo "</head><body>Form data successfully validated for $username.";
    
    // Enter the posted fields into the database here.
    // Use hash encryption for the password.
    
    exit;
  }
  
  function validate_username($field)
  {
    if($field = "") return "No username was entered<br />";
    else if (strlen($field) < 5)
      return "Usernmes must be at least 5 characters<br />";
    else if(preg_match("/[^a-zA-Z0-9_-]/", $field))
      return "Only letters, numbers, - and _ in usernames<br />";
    return "";
  }
  
  function validate_password($field)
  {
    if($field == "") return "No password was entered<br />";
    else if(strlen($field) < 6)
      return "Passwords must be at least 6 characters<br />";
    else if(!preg_match("/[a-z]/", $field) ||
            !preg_match("/[A-Z]/", $field) ||
            !preg_match("/[0-9]/", $field))
      return "Passwords require of each of a-z, A-Z, and 0-9<br />";
    return "";
  }
  
  function fix_string($string)
  {
    if(get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities($string);
  }
  
?>