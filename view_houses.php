<?php
include 'connection.php';

session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}

$username = $_SESSION["username"];
$msg="";
$result = "SELECT * FROM houselist h ORDER BY h.houseID ASC";
$result = mysqli_query($conn, $result);

$retrieve = "SELECT * FROM renters r WHERE r.username = '".$username."'";
$retrieve = mysqli_query($conn, $retrieve);

$ret = mysqli_fetch_array($retrieve);
        
$rid  =  $ret['renterID'];   
if(isset($_POST['submit']))
{
  $hid =$_POST['addFav'];
  $addToFav = "INSERT INTO favourites(hID, rID) VALUES ('$hid','$rid')";
  if ($conn->query($addToFav) === TRUE) {
    $msg="successfully Added to Favorites";
  }
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title><?php echo $username?> | House List | Find Nest</title>
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
                    <h1>Find Nest | House List</h1>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>House ID</th>
                                    <th>House Type</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Details</th>
                                    <th>Notes</th>
                                    <th>Action</th>
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
                                            <?php if($res['garage']){
                                        echo "Garage: YES ";
                                    }else{
                                        echo "Garage: NO ";
                                    }
                                    echo nl2br("\n",false);
                        
                                    if($res['bachelors']){
                                        echo "Bachelors: YES ";
                                    }else{
                                        echo "Bachelors: NO ";
                                    }
                                        echo nl2br("\n",false);
                        
                                    if($res['lift']){
                                        echo "Lift: YES ";
                                    }else{
                                        echo "Lift: NO ";
                                    }
                                        echo nl2br("\n",false);
                        
                                    if($res['security']==3){
                                        echo "Security Guard and CC Camera: YES ";
                                    }else if($res['security']==2){
                                        echo "Security Guard: YES ";
                                    }else if($res['security']==1){
                                        echo "CC Camera: YES ";
                                    }else{
                                        echo "Security Guard and CC Camera: NO ";
                                    }
                                        echo nl2br("\n",false);
                                    if($res['genderAllowance']==2){
                                        echo "Allowance: only Female";
                                    }else if($res['genderAllowance']==1){
                                        echo "Allowance: only Male";
                                    }else{
                                        echo "Allowance: Both Male and Female";
                                    }
                                        echo nl2br("\n",false);
                        
                                    ?>
                                        </td>
                                        <td>
                                            <?php echo $res['houseDetails'];?>
                                        </td>
                                        <td>
                                            <form action="view_houses.php" method="post">
                                                <input type="hidden" name="addFav" value="<?php echo $res['houseID'] ?>">
                                                <input type="submit" name="submit" value="add to Fav"> </form>
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