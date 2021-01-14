<?php
include 'connection.php';
/*
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}else{
  if($_SESSION["username"] != "admin")
  {
    header('Location: login_vendor.php');
  }
}
*/

$result = "SELECT * FROM vendors v ORDER BY v.vendorID ASC";
$result = mysqli_query($conn, $result);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Vendor List | Find Nest</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            body {
                background-color: lightgreen;
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
            <h1>Find Nest | Vendor List</h1>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Vendor ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Gender</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>House Listed</th>
                        </tr>
                    </thead>
                    <?php 
                    while($res = mysqli_fetch_array($result)) {
                        if($res['vendorID']!=0) {
                    ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $res['vendorID']; ?>
                                </td>
                                <td>
                                    <?php echo $res['fullname']; ?>
                                </td>
                                <td>
                                    <?php echo $res['username']; ?>
                                </td>
                                <td>
                                    <?php echo $res['gender'];?>
                                </td>
                                <td>
                                    <?php echo $res['location']; ?>
                                </td>
                                <td>
                                    <?php echo $res['contact'];?>
                                </td>
                                <td>
                                    <?php echo $res['email'];?>
                                </td>
                                <td>
                                    <?php echo $res['houseListed'];?>
                                </td>
                            </tr>
                        </tbody>
                        <?php   
                    }
                }
                    ?>
                </table>
            </div>
            <?php include 'footer.php'; ?>
    </body>

    </html>