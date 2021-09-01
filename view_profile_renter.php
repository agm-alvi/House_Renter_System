<?php
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}
if(($_SESSION["username"])=='admin')
{
  header('Location: admin_profile.php');
}
require 'connection.php';
$username = $_SESSION["username"];
$resultu = "SELECT * FROM renters r where r.username = '".$username."' ";
$resultu = mysqli_query($conn, $resultu);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username?> | Renter Profile | Find Nest</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include 'Header.php'; ?>
    <?php  $resu = mysqli_fetch_array($resultu); ?>
    <h1>Welcome <?php echo $resu['fullname'];?></h1>
    <?php if ($resu['gender']=="Male"){?> <img src="profile-pic-male.jpg">
    <?php
    
                                        } else{?> <img src="profile-pic-female.jpg">
    <?php
    
} ?>
    <?php 
                   // while($resi = mysqli_fetch_array($resultu)) { ?>
    <table class="table">
        <tr>
            <td>Username: </td>
            <td>
                <?php echo $resu['username']; ?>
            </td>
        </tr>

        <tr>
            <td>Gender:</td>
            <td>
                <?php echo $resu['gender']; ?>
            </td>
        </tr>
        <tr>
            <td>Contact no:</td>
            <td>
                <?php echo $resu['contact']; ?>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>
                <?php echo $resu['email'];?>
            </td>
        </tr>
        <tr>
            <td>Location:</td>
            <td>
                <?php echo $resu['location']; ?>
            </td>
        </tr>
        <tr>
            <td>Booked:</td>
            <td>
                <?php echo $resu['booked'];?>
            </td>
        </tr>
    </table>
    <?php   //}                    ?>


    <a href="view_houses.php">View Houses</a>
    <br>
    <a href="view_favourites_renter.php">View Favourites</a>
    <br>
    <a href="Logout.php">Logout</a>

    <?php include 'Footer.php'; ?>
</body>

</html>
