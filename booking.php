<?php
include 'connection.php';
/*
session_start();
if(!(empty($_SESSION["username"]))
{
session_destroy();
}else{
    header('Location: login_vendor.php');
  }
*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Booking | Find Nest</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        *{
            margin-top: 5px;
        }
        body {
            background-color: lightpink;
        }

 
        .form {
            margin-left: 50px;
            
        }

    </style>
</head>

<body>
    <?php include 'header.php';?>
    <h1>Find Nest | Booking</h1>
    <div>
        <form name="bookingForms" class="form" action="booking.php" method="POST" onsubmit="return validateForm();">
            <label>House ID:</label>
            <input type="number" name="houseID" value="" placeholder="House ID">
            <label id="hidError"></label>
            <br>
            <label>Renter ID:</label>
            <input type="number" name="renterID" value="" placeholder="Renter ID">
            <label id="ridError"></label>
            <br>
            <label>House Details:</label>
            <input type="text" name="comments" value="" placeholder="Notes about House">
            <label id="commentsError"></label>
            <br>
            <input type="Submit" name="" value="Submit"> </form>
    </div>
    <?php
if(isset($_POST['houseID'])){
$houseID = $_POST['houseID'];
$renterID = $_POST['renterID'];
$comments = $_POST['comments'];


if($houseID != ""){

	if (mysqli_query($conn,  "INSERT INTO favourites(hID, rID, comments) VALUES ('$houseID','$renterID','$comments')")) {
	echo "New House added successfully";
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
    
    
}


mysqli_close($conn);
}
?>
    <?php include 'footer.php'; ?>
</body>
<script type="text/javascript">
    function validateForm() {
        var houseID = document.forms["bookingForms"]["houseID"].value;
        var renterID = document.forms["bookingForms"]["renterID"].value;
        var comments = document.forms["bookingForms"]["comments"].value;
        var flag = true;
        if (houseID == "") {
            document.getElementById('hidError').innerHTML = "House ID cannot be empty";
            flag = false;
        }
        if (renterID == "") {
            document.getElementById('ridError').innerHTML = "Renter ID cannot be empty";
            flag = false;
        }
        return flag;
    }

</script>

</html>
