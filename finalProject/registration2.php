<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Admin Index</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<div id="centerColumn">
  <div id="navbar">
    <ul>
      <li><a href="../login.php">Login</a></li>
    </ul>
  </div>
  <div id="header">
    <h1>Simple Game</h1>
  </div>
  <br>
  <!--//end #footer//-->
</div>
<!--//end #centerColumn//-->
<!--//     BEGINNING OF FORM FOR REGISTRATION      //-->
  // note for password: use $salt1$password$salt2, use the same salt1 and salt2 we did in class, and hash the password with ripemd128
  <script>
    function validate(form)
    {
      fail  =  validateUsername(form.username.value)
      fail += validatePassword(form.password.value)
      fail += validateUserType(form.usertype.value)
      
      if (fail == "") return true
      else {alert(fail); return false }
    }
    
    function validateUsername(field)
    {
      if(field == "") return "No username was entered.\n"
      else if(field.length < 5)
        return "Usernames must be at least 5 characters.\n"
      else if(/[^a-zA-Z0-9_-]/.test(field))
        return "Only a-z, A-Z, 0-9, - and _ allowed in usernames.\n"
      return ""
    }
    
    function validatePassword(field)
    {
      if(field == "") return "No Password was entered.\n"
      else if(field.length < 6)
        return "Passwords must be at least 6 characters.\n"
      else if(!/[a-z]/.test(field) || ! /[A-Z]/.test(field) ||
          !/[0-9]/.test(field))
        return "Passwords require one of each of a-z, A-Z, and 0-9.\n"
      return ""
    }
    
  </script>
  <table border = "0" cellpadding = "2" cellspacing = "5" bgcolor="#eeeeee">
    <th colspan="2" align="center">Signup Form</th>
    <form method="post" action="adduser.php" onsubmit="return validate(this)">
      <tr><td>Username</td>
        <td><input type = "text" maxlength="45" name="username"></td></tr>
      <tr><td>Password</td>
        <td><input type = "text" maxlength="45" name="password"></td></tr>
      <tr><td>UserType</td>
        <td>
        <input type = "radio" name = "userType" value = "Regular">
      <label>Regular</label></td>
      <td>
      <input type = "radio" name = "userType" value = "Admin">
      <label>Admin</label>
        </td></tr>
      <tr><td colspan="2" align="center"><input type="submit"
        value="Signup"></td></tr>
        
    </form>
  </table>
      
  
  
<!--//     END OF FORM FOR REGISTRATION            //-->
</body>
</html>