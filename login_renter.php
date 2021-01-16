<?php
session_start();
if(!empty($_SESSION["username"]))
{
      if($_SESSION["username"] =="admin")
      {
        header('Location: admin_profile.php');
      }else{
        header('Location: renter_profile.php');
      }
}
require 'connection.php';
if(isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_user ="select * from renters where username='$username' && password ='$password'";
    $result = $conn->query($login_user);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION["username"] = $row['username'];
       
      }
      if($username =="admin")
      {
        header('Location: admin_profile.php');
      }else{
        header('Location: renter_profile.php');
      }
    }else{
      echo "<script>alert('wrong username & Password')</script>";
    }
  
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Renter Log In | Find Nest</title>
        <link rel="stylesheet" type="text/css" href="loginstyle.css">
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
            <h1>Find Nest | Renter Log In</h1>
            <div class="loginform">
                <form action="login_renter.php" method="post">
                    <nav>
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
                    </nav>
                    <nav>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required placeholder="Password">
                        <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password </nav>
                    <nav>
                        <button type="submit">Log In</button>
                    </nav>
                </form>
                <p>Not Registered Yet? Get <a href="Registration_renter.php">Registered Now.</a></p>
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