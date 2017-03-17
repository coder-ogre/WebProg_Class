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
<!--<h2>JavaScript Verification Example</h2>-->
  <div id="javascriptValidation"></div>
  <!-- makes a table for the form to demonstrate javascript validation -->
  <table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
    <form  method = "post" onsubmit = "return validate(this)">
      <tr>
        <td>
          Username (English alphabet, no spaces):
        </td>
        <td>
          <input type = "text" name = "userName" id = "userName">
        </td>
      </tr>
      <tr>
        <td>
          Password (English alphabet, no spaces):
        </td>
        <td>
          <input type = "text" name = "password" id = "password">
        </td>
      </tr>
      <tr>
        <td>
          UserType (English Alphabet, no spaces):
        </td>
        <td>
          <input type = "text" name = "userType" id = "userType">
        </td>
      </tr>
      <tr>
        <td>
          <input type = "submit" name = "submit" value = "Submit" id = "submitButton">
        </td>
      </tr>
    </form>
  </table>
  <br />
        
  <script>
    /* validates to check for valid usernames with javascript */
    function validateUserNameJS(field)
    {
      if (field == "")
        return "UserName [a-z], [A-Z]: Nothing was entered.<br />";
      if (/[^a-z A-Z]/.test(field))
        return "UserName [a-z], [A-Z]: String must only contain characters from the English alphabet, or spaces.<br />";
      return "";
    }

    /* validates to check for valid passwords with javascript */
    function validatePasswordJS(field)
    {
      if (field == "")
        return "Password [a-z], [A-Z]: Nothing was entered.<br />";
      if (/[^a-zA-Z]/.test(field))
        return "Password [a-z], [A-Z]: Password must only contain characters from the English alphabet.<br />";
      return "";
    }

    /* validates to check for valid user types with javascript */
    function validateUserTypeJS(field)
    {
      if (field == "")
        return "String [a-z], [A-Z]: Nothing was entered.<br />";
      if (/[^a-zA-Z]/.test(field))
        return "String [a-z], [A-Z]: String must only contain characters from the English alphabet.<br />";
      return "";
    }
      
    function validate(form)
    {
       fail = "";
      fail += validateUserNameJS(form.userName.value);
      fail += validatePasswordJS(form.password.value);
      fail += validateUserTypeJS(form.userType.value);
      if(fail == "")
      {
        document.getElementById('javascriptValidation').innerHTML = "JavaScript validation successful";
         /*call to php addUser file, which validates in php, before adding the user to the database, and assigning a random, unique planet location */
    $("#submitButton").click(function() {
            $.ajax({
				method: 'POST',
				url: 'addUser.php',
				data: { /*url: $('#theURL').val() */userName: $('#userName').val(), password: $('#password').val(), userType: $('#userType').val()  },
				success: function(r) {
					$('#javascriptValidation').html(rUser successfully added );
				},
				error: function(e){
					console.log('%c'+'ERROR','color: firebrick;',e);
				}
			});
        });
        return true;
      } 
      document.getElementById('javascriptValidation').innerHTML = "" + fail;
      return false;
    }
    
    
    
  </script>
  
  
<!--//     END OF FORM FOR REGISTRATION            //-->
</body>
</html>