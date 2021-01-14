<?php
session_start();
if(!empty($_SESSION["username"]))
{
      if($_SESSION["username"] =="admin")
      {
        header('Location: admin_profile.php');
      }else{
        header('Location: vendor_profile.php');
      }
}
require 'connection.php';
if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_user ="select * from vendors where username='$username' && password ='$password'";
    $result = $conn->query($login_user);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION["username"] = $row['username'];
       
      }
      if($username =="admin")
      {
        header('Location: admin.php');
      }else{
        header('Location: vendor_profile.php');
      }
    }else{
      echo "<script>alert('wrong username & Password')</script>";
    }
  
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Vendor Log In | Find Nest</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            body {
                background-color: lightgreen;
            }
            
            input {
                left: 100px;
            }
        </style>
    </head>

    <body>
        <?php include 'header.php';?>
            <h1>Find Nest | Vendor Log In</h1>
            <div>
                <form action="login_vendor.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Password">
                    <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password
                    <button type="submit">Log In</button>
                </form>
                <p>Return to <a href="index.php">Home Page</a></p>
            </div>
    </body>

    </html>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
    </script>