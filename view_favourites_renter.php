<?php
include 'connection.php';
session_start();
if(empty($_SESSION["username"]))
{
  header('Location: login_renter.php');
}else{
  if($_SESSION["username"] == "admin")
  {
    header('Location: view_bookings.php');
  }
}
$username = $_SESSION["username"];

$retrieve = "SELECT * FROM renters r WHERE r.username = '".$username."'";
$retrieve = mysqli_query($conn, $retrieve);
$ret = mysqli_fetch_array($retrieve);
$rid  =  $ret['renterID'];
$fname = $ret['fullname'];

$result = "SELECT f.*, h.* FROM favourites f  JOIN houselist h ON f.hID = h.houseID WHERE f.rID = '".$rid."'";
$result = mysqli_query($conn, $result);

$msg="";
if(isset($_POST['submit']))
{
  $fid =$_POST['deleteFav'];
  $deleteFav = "DELETE FROM favourites WHERE fID= '$fid'";
  if ($conn->query($deleteFav) === TRUE) {
    $msg="successfully Deleted from Favorites";
  }
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php echo $username?> | Favourite List | Find Nest</title>
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
            <?php
          if(isset($_POST['submit']))
          { 
          ?>
                <div> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $msg;?>
                </div>
                <?php
          }
      ?>
                <h1>Find Nest | Favourite List</h1>
                <h1>Renter: <?php echo $fname?> </h1>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>House Type</th>
                                <th>Address</th>
                                <th>Location</th>
                                <th>Action</th>
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
                                        <?php echo $res['houseType']; ?>
                                    </td>
                                    <td>
                                        <?php echo $res['house_no']." ".$res['street_no']." ".$res['area']; 
                                    ?>  </td>
                                    <td>
                                        <?php echo $res['location'];?>
                                    </td>
                                    <td>
                                        <form action="view_favourites_renter.php" method="post">
                                            <input type="hidden" name="deleteFav" value="<?php 
$fid = $res['fID'];
                                            echo $fid;  ?>">
                                            <input type="submit" name="submit" value="Delete From Fav"> </form>
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