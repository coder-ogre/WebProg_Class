<?php
  // Drew Misicko
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