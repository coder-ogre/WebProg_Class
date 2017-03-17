<!-- Drew Misicko -->
<html>
<body>
  <script> // this code shows an example of a javascript case statement
    x = 8;
    switch(x)
    {
      case 8:
        document.write("x is greater than 7<br />");
      case 7:
        document.write("x is greater than 6<br />");
      case 6:
        document.write("x is greater than 5<br />");
      case 5:
        document.write("x is greater than 4<br />")
      case 4:
        document.write("x is greater than 3<br />");
      case 3:
        document.write("x is greater than 2<br />");
      case 2:
        document.write("x is greater than 1<br />");
      case 1:
        document.write("x is greater than 0<br />");
      default:
        document.write("this switch statement shows an example of using fall-through<br /><br />");
    }
        
    x = 3;
    switch(x)
    {
      case 8:
        document.write("x is 7<br />");
        break;
      case 7:
        document.write("x is 6<br />");
        break;
      case 6:
        document.write("x is 5<br />");
        break;
      case 5:
        document.write("x is 4<br />");
        break;
      case 4:
        document.write("x is 3<br />");
        break;
      case 3:
        document.write("x is 2<br />");
        document.write("this switch statement shows an example of using breaks so that cases don't fall through<br /><br />");
        break;
      case 2:
        document.write("x is 1<br />");
        break;
      case 1:
        document.write("x is 0<br />");
        break;
      default:
        document.write("this switch statement shows an example of using breaks so that cases don't fall through<br /><br />");
    }
  </script>
</body>
</html>