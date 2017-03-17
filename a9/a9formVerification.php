<html>
<body>
  <title>Misicko A9</title>
  <h1 style = "text-align: center;">Drew Misicko&#39;s Assignment 8: Javascript examples</h1>
  <h3 style = "text-align: center;">Click <a href="http://webprog.cs.ship.edu/webprog12/index.html">here</a> to go to the main index</h3>
  
  <h2>JavaScript Verification Example</h2>
  
  <!-- makes a table for the form to demonstrate javascript validation -->
  <table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
    <form action = "a9formVerification.php" method = "post" onsubmit = "return validate(this)">
      <tr>
        <td>
          Integer [1-100]:
        </td>
        <td>
          <input type = "text" name = "integer">
        </td>
      </tr>
      <tr>
        <td>
          Decimal Number:
        </td>
        <td>
          <input type = "text" name = "decimalNumber">
        </td>
      </tr>
      <tr>
        <td>
          English alphabet string:
        </td>
        <td>
          <input type = "text" name = "alphabeticalString">
        </td>
      </tr>
      <tr>
        <td>
          Date &#35&#35/&#35&#35/&#35&#35:
        </td>
        <td>
          <input type = 'text' name = 'date'>
        </td>
      </tr>
      <tr>
        <td>
          Hex (A-F must be capitalized):
        </td>
        <td>
          <input type = "text" name = "hexadecimalString">
        </td>
      </tr>
      <tr>
        <td>
          <input type = "submit" name = "submit" value = "Submit">
        </td>
      </tr>
    </form>
  </table>
  <div id="javascriptValidation"></div>
  <br />
        
  <script>
    /* validates to check for valid integers with javascript */
    function validateInteger(field)
    {
      if (field == "")
        return "Integer: Nothing was entered.<br />";
      if (isNaN(field) || /\./.test(field)) // either if it's not a number, or if the number contains a decimal ponit
         return "Integer: Something other than an integer was entered.<br />";
      if (field < 1 || field > 100)
        return "Integer: Integer must be anywhere from 1 to 100.<br />";
      return "";
    }

    /* validates to check for valid decimal numbers with javascript */
    function validateDecimalNumber(field)
    {
      if (field == "")
        return "Decimal Number: Nothing was entered.<br />";
      if (isNaN(field))
        return "Decimal Number: Something other than a decimal was entered.<br />";
      if (!(/\.[0-9]/.test(field)))
        return "Decimal Number: Number must contain a decimal point.<br />";
      return "";
    }

    /* validates to check for valid strings with javascript */
    function validateAlphabeticalString(field)
    {
      if (field == "")
        return "String [a-z], [A-Z]: Nothing was entered.<br />";
      if (/[^a-zA-Z]/.test(field))
        return "String [a-z], [A-Z]: String must only contain characters from the English alphabet.<br />";
      return "";
    }

    /* validates to check for valid dates with javascript */
    function validateDate(field)
    {
      if (field == "")
        return "Date: No date entered.<br />";
      else if (!(/^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9]/.test(field)))
        return "Date: Date must be in ##/##/## format.<br />";
      return "";
    }

    /* validates to check for valid hexadecimals with javascript */
    function validateHexadecimalString(field)
    {
      if (field == "")
        return "Hexadecimal: Nothing was entered.<br />";
      else if (!(/[^0-9A-F]/.test(field)))
        return "Hexadecimal: Input must have only numbers and capital letters A-F.<br />";
      return "";
    }
    
    function validate(form)
    {
      fail  = validateInteger(form.integer.value);
      fail += validateDecimalNumber(form.decimalNumber.value);
      fail += validateAlphabeticalString(form.alphabeticalString.value);
      fail += validateDate(form.date.value);
      fail += validateHexadecimalString(form.hexadecimalString.value);
  
      if(fail == "")
      {
        document.getElementById('javascriptValidation').innerHTML = "JavaScript validation successful";
        return true;
      } 
      document.getElementById('javascriptValidation').innerHTML = "" + fail;
      return false;
    }
  </script>
  
  /*<?php
    echo "<h2>PHP Validation Example</h2>";
    // makes a table to demonstrate form to be validated with PHP 
    echo <<<_PHPFORM
    <table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
      <form action = 'a9formVerification.php' method = 'post'>
        <tr>
          <td>
            Integer [1-100]:
          </td>
          <td>
            <input type = 'text' name = 'phpInt'>
          </td>
        </tr>
        <tr>
          <td>
            Decimal Number:
          </td>
          <td>
            <input type = 'text' name = 'phpDec'>
          </td>
        </tr>
        <tr>
          <td>
            English alphabet string:
          </td>
          <td>
            <input type = 'text' name = 'phpAlpha'>
          </td>
        </tr>
        <tr>
          <td>
            Date &#35&#35/&#35&#35/&#35&#35:
          </td>
          <td>
            <input type = 'text' name = 'phpDate'>
          </td>
        </tr>
        <tr>
          <td>
            Hex (A-F must be capitalized):
          </td>
          <td>
            <input type = 'text' name = 'phpHex'>
          </td>
        </tr>
        <tr>
          <td>
            <input type = 'submit' name = 'submit2' value = 'Submit'>
          </td>
        </tr>
      </form>
    </table>
_PHPFORM;
    if(isset($_POST['phpInt']))
      $phpInt = fix_string($_POST['phpInt']);
    if(isset($_POST['phpDec']))
      $phpDec = fix_string($_POST['phpDec']);
    if(isset($_POST['phpAlpha']))
      $phpAlpha = fix_string($_POST['phpAlpha']);
    if(isset($_POST['phpDate']))
      $phpDate = fix_string($_POST['phpDate']);
    if(isset($_POST['phpHex']))
      $phpHex = fix_string($_POST['phpHex']);
    $fail  = validate_integer($phpInt);
    $fail .= validate_decimalNumber($phpDec);
    $fail .= validate_alphabeticalString($phpAlpha);
    $fail .= validate_date($phpDate);
    $fail .= validate_hexadecimalString($phpHex);
    if(isset($_POST['submit2']))
    {
      if($fail == "")
      {
        echo "PHP validation successful.<br />";
      }
      else 
        echo $fail;
    }
    // validates to check for valid integers with php
    function validate_integer($field)
    {
      if ($field == "")
        return "Integer: Nothing was entered.<br />";
      else if (!is_numeric($field) || preg_match("/\./", $field))
        return "Integer: Something other than an integer was entered.<br />";
      else if ($field < 1 || $field > 100)
        return "Integer: Integer must be anywhere from 1 to 100.<br />";
      return "";
    }
    // validates to check for valid decimal numbers with php 
    function validate_decimalNumber($field)
    {
      if ($field == "")
        return "Decimal Number: Nothing was entered.<br />";
      else if (!is_numeric($field))
        return "Decimal Number: Something other than a decimal was entered.<br />";
      else if ( !preg_match("/\.[0-9]/", $field))
        return "Decimal Number: Number must contain a decimal point.<br />";
      return "";
    }
    // validates to check for valid strings with php 
    function validate_alphabeticalString($field)
    {
      if ($field == "")
        return $label."String [a-z], [A-Z]: Nothing was entered.<br />";
      else if (preg_match("/[^a-zA-Z]/", $field))
        return $label."String [a-z], [A-Z]: String must only contain characters from the English alphabet.<br />";
      return "";
    }
    // validates to check for valid dates with php 
    function validate_date($field)
    {
      $label = "Date: ";
      if ($field == "")
        return $label."Date: No date entered.<br />";
      else if (!preg_match("/^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9]$/", $field))
        return $label."Date: Date must be in ##/##/## format.<br />";
      return "";
    }
    // validates to check for valid hexadecimals with php 
    function validate_hexadecimalString($field)
    {
      $label = "Hex: ";
      if ($field == "")
        return $label."Hexadecimal: Nothing was entered.<br />";
      else if (preg_match("/[^0-9A-F]/",$field))
        return $label."Hexadecimal: Input must have only numbers and capital letters A-F.<br />";
      return "";
    }
    function fix_string($string)
    {
      if(get_magic_quotes_gpc()) $field = stripcslashes($string);
      return htmlentities($string);
    }
    
    echo "<h3>Source Code:</h3>";
    show_source(__FILE__);
  ?>*/
</body>
</html> 