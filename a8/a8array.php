<!-- Drew Misicko -->
<html>
<body>
  <script> // this code shows an example of a javascript for statement
    x = [1, 2, 3, 4, 5];
    document.write("array x has " + x.length + " elements in it<br />");
    document.write("those elements are: <br />");
    for(i = 0; i < x.length - 1; i++)
    {
      document.write(x[i] + ", ");
    }
    document.write(x[x.length - 1] + "<br />");
    x.push(6);
    document.write("an additional element has been pushed to x<br />");
    document.write("x now has " + x.length + " elements in it<br />");
    document.write("those elements are: ");
    for(i = 0; i < x.length - 1; i++)
    {
      document.write(x[i] + ", ");
    }document.write(x[x.length - 1] + "<br />");
    document.write(x.pop() + " has been popped off the stack<br />");
    document.write("x now has " + x.length + " elements in it<br />");
    document.write("those elements are: ");
    for(i = 0; i < x.length - 1; i++)
    {
      document.write(x[i] + ", ");
    }document.write(x[x.length - 1] + "<br />");
  </script>
</body>
</html>