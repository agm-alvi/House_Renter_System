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
    <title>House Registration | Find Nest</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        *{
            margin-top: 5px;
        }
        body {
            background-color: gold;
        }

 
        .form {
            margin-left: 50px;
            
        }

    </style>
</head>

<body>
    <?php include 'header.php';?>
    <h1>Find Nest | House Registration</h1>
    <div>
        <form name="addHouseForms" class="form" action="addHouse.php" method="POST" onsubmit="return validateForm();">
            <label>Vendor ID:</label>
            <input type="text" name="vendorID" value="" placeholder="Vendor ID">
            <label id="vidError"></label>
            <br>
            <label>House Type:</label>
            <select name="hType">
                <option value="">Select House Type</option>
                <option name="hType" id="hType" value="Flat">Flat</option>
                <option name="hType" id="hType" value="Co-Op/Mess">Co-Op/Mess</option>
                <option name="hType" id="hType" value="Condo"> Condo</option>
                <option name="hType" id="hType" value="Single Family"> Single Family</option>
                <option name="hType" id="hType" value="Multi-Family"> Multi-Family</option>
                <option name="hType" id="hType" value="Cottage"> Cottage</option>
                <option name="hType" id="hType" value="Villa"> Villa</option>
                <option name="hType" id="hType" value="Yurt"> Yurt</option>
                <option name="hType" id="hType" value="Bunglow"> Bunglow</option>
            </select>
            <label id="hTypeError"></label>
            <br>
            <label>House No:</label>
            <input type="text" name="houseNo" value="" placeholder="House No">
            <label id="hNoError"></label>
            <br>
            <label>Street No:</label>
            <input type="text" name="streetNo" value="" placeholder="Street No">
            <label id="sNoError"></label>
            <br>
            <label>Area:</label>
            <input type="text" name="area" value="" placeholder="Area">
            <label id="areaError"></label>
            <br>
            <label>Location:</label>
            <select name="location">
                <option value="">Select Location</option>
                <option value="Old Dhaka" name="location">Old Dhaka</option>
                <option value="Uttara" name="location">Uttara</option>
                <option value="Rampura" name="location">Rampura</option>
                <option value="Mirpur" name="location">Mirpur</option>
                <option value="Khilgao" name="location">Khilgao</option>
                <option value="Moghbazar" name="location">Moghbazar</option>
                <option value="Jatrabari" name="location">Jatrabari</option>
                <option value="Dhanmondi" name="location">Dhanmondi</option>
                <option value="Mohammadpur" name="location">Mohammadpur</option>
                <option value="Farmgate" name="location">Farmgate</option>
                <option value="Baridhara" name="location">Baridhara</option>
            </select>
            <label id="locationError"></label>
            <br>
            <label>Bachelors Allowed:</label>
            <input type="radio" name="bachelor" value="TRUE">
            <label>Yes</label>
            <input type="radio" name="bachelor" value="FALSE">
            <label>No</label>
            <label id="bachelorError"></label>
            <br>
            <label>Garage Availabe:</label>
            <input type="radio" name="garage" value="TRUE">
            <label>Yes</label>
            <input type="radio" name="garage" value="FALSE">
            <label>No</label>
            <label id="garageError"></label>
            <br>
            <label>Gender Allowance:</label>
            <input type="radio" name="genderAllowance" value="Both Male and Female">
            <label>Both Male and Female</label>
            <input type="radio" name="genderAllowance" value="Only Male">
            <label>Only Male</label>
            <input type="radio" name="genderAllowance" value="Only Female">
            <label>Only Female</label>
            <label id="genderAllowanceError"></label>
            <br>
            <label>House Details:</label>
            <input type="text" name="houseDetails" value="" placeholder="Notes about House">
            <label id="houseDetailsError"></label>
            <br>
            <input type="Submit" name="" value="Submit"> </form>
    </div>
    <?php
if(isset($_POST['vendorID'])){
$vendorID = $_POST['vendorID'];
$hType = $_POST['hType'];
$houseNo = $_POST['houseNo'];
$streetNo = $_POST['streetNo'];
$area = $_POST['area'];
$location = $_POST['location'];
$bachelor = $_POST['bachelor'];
$garage = $_POST['garage']; 
$gAllow = $_POST['genderAllowance'];  
$houseDetails = $_POST['houseDetails'];  



if($vendorID != ""){
	if ((mysqli_query($conn,  "INSERT INTO houselist( houseType, houseDetails, house_no, street_no, area, location, garage, bachelors, genderAllowance, vID) VALUES ('$hType','$houseDetails','$houseNo','$streetNo','$area','$location',$garage,$bachelor,'$gAllow','$vendorID')")) && (mysqli_query($conn,  "UPDATE vendors SET houseListed=houseListed+1 WHERE vendorID= '$vendorID'"))) {
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
        var vendorID = document.forms["addHouseForms"]["vendorID"].value;
        var hType = document.forms["addHouseForms"]["hType"].value;
        var houseNo = document.forms["addHouseForms"]["houseNo"].value;
        var streetNo = document.forms["addHouseForms"]["streetNo"].value;
        var area = document.forms["addHouseForms"]["area"].value;
        var location = document.forms["addHouseForms"]["location"].value;
        var garage = document.forms["addHouseForms"]["garage"].value;
        var bachelor = document.forms["addHouseForms"]["bachelor"].value;
        var genderAllowance = document.forms["addHouseForms"]["genderAllowance"].value;
        var flag = true;
        if (vendorID == "") {
            document.getElementById('vidError').innerHTML = "Vendor ID cannot be empty";
            flag = false;
        }
        if (hType == "") {
            document.getElementById('hTypeError').innerHTML = "House Type Must be selected";
            flag = false;
        }
        
        if (houseNo == "") {
            document.getElementById('hNoError').innerHTML = "House No cannot be empty";
            flag = false;
        }
        if (location == "") {
            document.getElementById('locationError').innerHTML = "Location Must be selected";
            flag = false;
        }
        if (bachelor == "") {
            document.getElementById('bachelorError').innerHTML = " Must be selected";
            flag = false;
        }
        if (garage == "") {
            document.getElementById('garageError').innerHTML = " Must be selected";
            flag = false;
        }
        if (genderAllowance == "") {
            document.getElementById('genderAllowanceError').innerHTML = " Must be selected";
            flag = false;
        }
        return flag;
    }

</script>

</html>
