<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "findnest";
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
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

$result = "SELECT * FROM houselist h ORDER BY h.houseID ASC";
$result = mysqli_query($conn, $result);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Renter List | Find Nest</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            body {
                background-color: lightsalmon;
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
            <h1>Find Nest | House List</h1>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>House ID</th>
                            <th>House Type</th>
                            <th>Address</th>
                            <th>Location</th>
                            <th>Gender Allowance</th>
                            <th>Details</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <?php 
                    while($res = mysqli_fetch_array($result)) { 
                    ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $res['houseID']; ?>
                                </td>
                                <td>
                                    <?php echo $res['houseType']; ?>
                                </td>
                                <td>
                                    <?php echo $res['house_no']." ".$res['street_no']." ".$res['area']; 
                                    ?>
                                </td>
                                <td>
                                    <?php echo $res['location'];?>
                                </td>
                                <td>
                                    <?php echo $res['genderAllowance']; ?>
                                </td>
                                <td>
                                    <?php if($res['garage']){
                                        echo "Garage availabe. ";
                                    }else{
                                        echo "Garage not availabe. ";
                                    }

                                    if($res['bachelors']){
                                        echo "Bachelors are Allowed";
                                    }else{
                                        echo "Bachelors are not Allowed";
                                    }?>
                                </td>
                                <td>
                                    <?php echo $res['houseDetails'];?>
                                </td>
                            </tr>
                        </tbody>
                        <?php   
                    }
                    ?>
                </table>
            </div>
            <?php include 'footer.php'; ?>
    </body>

    </html>