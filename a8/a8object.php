<!-- Drew Misicko -->
<html>
<body>
  <script> // this code shows an example of a javascript object
    function User(forename, username, password)
    {
      this.forename = forename;
      this.username = username;
      this.password = password;
      
      User.prototype.showUser = function()
      {
        document.write("Forename: " + this.forename + "<br />");
        document.write("Username: " + this.username + "<br />");
        document.write("Password: " + this.password + "<br /><br />");
      }
    }
    
    details = new User("Wolfgang", "w.a.mozart", "composer");
    
    details.showUser();// here we display the properties of the details instance of User
  </script>
</body>
</html>