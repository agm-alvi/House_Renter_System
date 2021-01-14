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

$result = "SELECT * FROM favourites f ORDER BY f.fID ASC";
$result = mysqli_query($conn, $result);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Booking List | Find Nest</title>
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
            <h1>Find Nest | Booking List</h1>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>House ID</th>
                            <th>Renter ID</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <?php 
                    while($res = mysqli_fetch_array($result)) { 
                        if($res['fID']!=0) {
                    ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $res['fID']; ?>
                                </td>
                                <td>
                                    <?php echo $res['hID']; ?>
                                </td>
                                <td>
                                    <?php echo $res['rID']; ?>
                                </td>
                                <td>
                                    <?php echo $res['comments'];?>
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