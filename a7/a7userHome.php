  <?php
  // Drew Misicko
  ob_start();// keeps output from being displayed, while still allowing functions to perform
  include_once "CreateConnection.php"; // provides code to establish a connection to my database
  $conn = createConnection();// establishes a connection to my database
  ob_end_clean(); // end of output restriction.  things will be able to be output normally
  
  
  firstDisplay($conn); // displays a welcome to the user that just logged in
  secondDisplay(); // displays instructions for user to go to other pages
  
  echo "<h2>Login Page Source Code:</h2>";
  echo show_source('a7login.php'); // shows source
  echo "<h2>This user's Welcome Page Source Code:</h2>";
  echo show_source(__FILE__); // shows source
  echo "<h2>Setting Up User Database Source Code:</h2>";
  echo show_source('setupusers.php'); // shows source
  echo "<h2>CreateConnection Source Code:</h2>";
  echo show_source('CreateConnection.php'); // shows source
  
  // displays directions to go to other pages
  function secondDisplay()
  {
    echo<<<_ASSIGNMENT7PAGES
    <table>
      <tr>
          Log out to navigate to the <strong>Log In</strong> page, where you can view the source for that page.
      </tr>
      <br />
      <tr>
        Click <a href="setupusers.php">here</a> to view the page (with source) that adds 2 users to the database.  
      </tr>
    </table>
_ASSIGNMENT7PAGES;
  }

  // displays a welcome to the user that just logged in
  function firstDisplay($conn)
  {
    echo "<h1 style = \"text-align: center;\">Drew Misicko's Assignment 7</h1>";
  
    session_start();  // collects data from session to properly greet user by name
    if(isset($_SESSION['username']) && $_SESSION['check'] == 
      hash('ripemd128', $_SERVER['REMOTE_ADDR'] .$_SERVER['HTTP_USER_AGENT']) )// if a session exists...
    {
      $forename = $_SESSION['forename'];
      $surname = $_SESSION['surname'];
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      echo "<h3 style = \"text-align: center;\">Welcome "."<strong>$forename $surname</strong>"."! <br /> Your username is <strong>$username</strong>, and your password is <strong>$password</strong>. <br />Click the log out button on this page to go back to the".
        " login screen, <a href=\"http://"."webprog.cs.ship.edu/webprog12/index.html\">or go back to the index</a></h3>";
    }
    else header('Location: a7login.php'); // redirects to the login screen if a session doesn't already exist
    if (isset($_POST['logout'])) // if the log out button is clicked...
    {
      destroy_session_and_data();
      header('Location: a7login.php');
    }
    echo <<<_END
    <form action = 'a7userHome.php' method = 'post'>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type = 'submit' name = 'logout' value = 'Log Out'>
    </form>
_END;
  }
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST{$var});
  }
  
  // destroys session, logging user out, and unsetting all session variables
  function destroy_session_and_data()
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
  }
  ?>