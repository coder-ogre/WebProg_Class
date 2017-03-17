<?php
  // Drew Misicko
  ob_start();// keeps output from being displayed, while still allowing functions to perform
  include_once "CreateConnection.php"; // provides code to establish a connection to my database
  $conn = createConnection();// establishes a connection to my database
  ob_end_clean(); // end of output restriction.  things will be able to be output normally
  
  firstDisplay(); // displays header, and instructions for the page, including possible credentials
  secondDisplay(); // creates the login form (the second display), and displays links to other pages
  checkCredentials($conn); // checks to see if username entered matches the password entered, if so, logs user in
  
  // creates the login form (the second display), and displays links to other pages
  function secondDisplay()
  {
    echo<<<_LOGINFORM
    <form method = "post" action = "a7login.php">
      <pre>
        <h4>&nbsp&nbspUse this form to log in.</h4>
        <label>Username:</label>
  			<input type = "text" name = "username" placeholder = "Username">
        <label>Password:</label>
  			<input type = "password" name ="password" placeholder = "Password">
  			<input type = "submit" name = "login" value = "Log in">
       </pre>
  		</form>
_LOGINFORM;
  }
  
  function thirdDisplay()//needed to spearate navigational instructions from form, so that 
  //           an invalid password/username combination prompt can be placed below the form
  {    //                                             instead of hovering awkwardly above it.
    echo<<<_ASSIGNMENT7PAGES
    <table>
      <tr>
          Log in to navigate to the <strong>user home page</strong>, where you can view the source for that page.
      </tr>
      <br />
      <tr>
        Click <a href="setupusers.php">here</a> to view the page (with source) that adds 2 users to the database.  
      </tr>
    </table>
_ASSIGNMENT7PAGES;
  }
  
  // checks to see if the entered credentials are correct, and if so, logs user in
  function checkCredentials($conn)
  {
    session_start(); // allows session functionality to begin
    if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['check']))
      header('Location: a7userHome.php'); // redirects to user's home page if they're already logged in
      
    if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) // if form is filled and submitted
    {
      $username = get_post($conn, 'username');
      $password = get_post($conn, 'password');
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      elseif ($result->num_rows) // if there exists a row such that the username equals the one given
      {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $result->close();
        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128',"$salt1$password$salt2");
        if ($token == $row['password']) // if password matches username
        {
          ini_set('session.gc_maxlifetime', 60 * 30); // tells session to automatically log off after 30 minutes
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['forename'] = $row['forename'];
          $_SESSION['surname'] = $row['surname'];
          $_SESSION['check'] = hash('ripemd128', $_SERVER['REMOTE_ADDR'] .$_SERVER['HTTP_USER_AGENT']);           
          header('Location: a7userHome.php'); // redirects page to user's home page
        }
        else
        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspInvalid username / password combination";
      }
      else
      echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspInvalid username / password combination";
    }
    $conn->close();
  }
  
  
  
  
  // creates the first display containing the header, instructions, and possible credentials
  function firstDisplay()
  {
    echo "<h1 style = \"text-align: center;\">Drew Misicko's Assignment 7</h1>";
    echo "<h2 style = \"text-align: center;\">Log in here, <a href=\"http://".
    "webprog.cs.ship.edu/webprog12/index.html\">or go back to the index</a></h2>";
    echo "<h4>&nbsp&nbspTo log in, one of these username/password combinations must be used:</h4>";
  
    // displays possible credentials to be used
    echo "<pre>";
    echo "<table>";
      echo "<tr>";
        echo "<th>Username</th>";
        echo "<th>Password</th>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>bsmith</td>";
        echo"<td>mysecret</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>pjones</td>";
        echo "<td>acrobat</td>";
      echo "</tr>";
    echo "</table>";
    echo "</pre>";
  }

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST{$var});
  }
?>