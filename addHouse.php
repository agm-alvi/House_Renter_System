<?php
include 'connection.php';

session_start();
if(empty($_SESSION["username"]))
{
  header('Location: index.php');
}

$username = $_SESSION["username"];
$retrieve = "SELECT * FROM vendors v WHERE v.username = '".$username."'";
$retrieve = mysqli_query($conn, $retrieve);

$ret = mysqli_fetch_array($retrieve);
        
$vid  =  $ret['vendorID'];   

?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>House Registration | Find Nest</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            * {
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
                    <nav>
                        <label>Vendor ID:</label>
                        <input type="text" name="vendorID" value="<?php
                                echo $vid?>" disabled>
                        <label id="vidError"></label>
                    </nav>
                    <nav>
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
                    </nav>
                    <nav>
                        <label>House No:</label>
                        <input type="text" name="houseNo" value="" placeholder="House No">
                        <label id="hNoError"></label>
                    </nav>
                    <nav>
                        <label>Street No:</label>
                        <input type="text" name="streetNo" value="" placeholder="Street No">
                        <label id="sNoError"></label>
                    </nav>
                    <nav>
                        <label>Area:</label>
                        <input type="text" name="area" value="" placeholder="Area">
                        <label id="areaError"></label>
                    </nav>
                    <nav>
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
                    </nav>
                    <nav>
                        <label>Bachelors Allowed:</label>
                        <input type="radio" name="bachelor" value="1">
                        <label>Yes</label>
                        <input type="radio" name="bachelor" value="0">
                        <label>No</label>
                        <label id="bachelorError"></label>
                    </nav>
                    <nav>
                        <label>Garage Availabe:</label>
                        <input type="radio" name="garage" value="1">
                        <label>Yes</label>
                        <input type="radio" name="garage" value="0">
                        <label>No</label>
                        <label id="garageError"></label>
                    </nav>
                    <nav>
                        <label>Lift Availabe:</label>
                        <input type="radio" name="lift" value="1">
                        <label>Yes</label>
                        <input type="radio" name="lift" value="0">
                        <label>No</label>
                        <label id="liftError"></label>
                    </nav>
                    <nav>
                        <label>Gender Allowance:</label>
                        <input type="radio" name="genderAllowance" value="0">
                        <label>Both Male and Female</label>
                        <input type="radio" name="genderAllowance" value="1">
                        <label>Only Male</label>
                        <input type="radio" name="genderAllowance" value="2">
                        <label>Only Female</label>
                        <label id="genderAllowanceError"></label>
                    </nav>
                    <nav>
                        <label>Security Info:</label>
                        <input type="radio" name="security" value="0">
                        <label>No Security</label>
                        <input type="radio" name="security" value="1">
                        <label>Only CC Camera</label>
                        <input type="radio" name="security" value="2">
                        <label>Only Security Guard</label>
                        <input type="radio" name="security" value="3">
                        <label>Both Security Guard and CC Camera</label>
                        <label id="securityError"></label>
                    </nav>
                    
                    <nav>
                        <label>House Details:</label>
                        <input type="text" name="houseDetails" value="" placeholder="Notes about House">
                        <label id="houseDetailsError"></label>
                    </nav>
                    <nav>
                        <input type="Submit" name="" id="btn" value="Submit"> </nav>
                </form>
            </div>
            <?php
if(isset($_POST['hType'])){
$hType = $_POST['hType'];
$houseNo = $_POST['houseNo'];
$streetNo = $_POST['streetNo'];
$area = $_POST['area'];
$location = $_POST['location'];
$bachelor = $_POST['bachelor'];
$garage = $_POST['garage'];
$lift = $_POST['lift'];
$security = $_POST['security']; 
$gAllow = $_POST['genderAllowance'];  
$houseDetails = $_POST['houseDetails'];  

$sql = "failed";

if($hType != ""){
	if ((mysqli_query($conn,  "INSERT INTO `houselist`(`houseType`, `houseDetails`, `house_no`, `street_no`, `area`, `location`, `garage`, `bachelors`, `lift`, `security`, `genderAllowance`, `vID`) VALUES  ('$hType','$houseDetails','$houseNo','$streetNo','$area','$location',$garage,$bachelor,'$lift', '$security', $gAllow','".$vid."')")) && (mysqli_query($conn,  "UPDATE vendors SET houseListed=houseListed+1 WHERE vendorID= '$vid'"))) {
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