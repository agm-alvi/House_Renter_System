<?php
include 'connection.php';

session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}else{
  if($_SESSION["username"] != "admin")
  {
    header('Location: index.php');
  }
}
$username = $_SESSION["username"];
$retrieve = "SELECT * FROM renters r WHERE r.username = '".$username."'";
$retrieve = mysqli_query($conn, $retrieve);

$ret = mysqli_fetch_array($retrieve);
        
$rid  =  $ret['renterID']; 
$fullname = $ret['fullname'];

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php echo $username?> | Profile | Find Nest</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            body {
                background-color: navajowhite;
            }
            
            table {
                width: 100%;
                left: 10px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <?php include 'header.php';?>
            <h1>Find Nest | Profile</h1>
            <h1>Welcome <?php echo $fullname?> |</h1>
            <div>
                <ol>
                    <li><a href="view_renters.php" target="_blank">View Renters List</a></li>
                    <li><a href="view_vendors.php" target="_blank">Edit Vendors List</a></li>
                <li><a href="view_houses.php" target="_blank">View Houses</a></li>
                    <li><a href="view_bookings.php" target="_blank">View Bookings</a></li>
                    <li><a href="Dashboard.php" target="_blank">View Reviews</a></li>
                </ol>
            </div>
            <?php include 'footer.php'; ?>
    </body>

    </html>