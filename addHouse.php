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
            body {
                background-color: gold;
            }
            
            input {
                left: 100px;
            }
        </style>
    </head>

    <body>
        <?php include 'header.php';?>
            <h1>Find Nest | House Registration</h1>
            <div>
                <form name="LoginForms" class="" action="addHouse.php" method="POST" onsubmit="return validateForm();">
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
                    <label>Bachelors Allowed:</label>
                <input type="radio" name="bachelor" value="Bachelors Alllowed">
                <label>Yes</label>
                <input type="radio" name="bachelor" value="Bachelors not Alllowed">
                <label>No</label>
                <input type="radio" name="bachelor" value="Bachelors Alllowance on Discussion">
                <label>On Disscussion</label>
                <label id="bachelorError"></label>
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
                    <input type="Submit" name="" value="Submit"> </form>
            </div>
            <?php
if(isset($_POST['uname'])){
$fname = $_POST['fullName'];
$uname = $_POST['uname'];
$psw = $_POST['psw'];
$gender = $_POST['gender'];

$contact = $_POST['contact'];
$email = $_POST['email'];
$location = $_POST['location'];



if($fname != ""){
	if (mysqli_query($conn,  "INSERT INTO renters(username, fullname, password, gender, location, contact, email) VALUES ('$uname','$fname','$psw','$gender','$location','$contact','$email')")) {
	echo "New record created successfully";
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
            var name = document.forms["LoginForms"]["fullName"].value;
            var username = document.forms["LoginForms"]["uname"].value;
            var password = document.forms["LoginForms"]["psw"].value;
            var contact = document.forms["LoginForms"]["contact"].value;
            var gender = document.forms["LoginForms"]["gender"].value;
            var location = document.forms["LoginForms"]["location"].value;
            var flag = true;
            if (name == "") {
                document.getElementById('nameError').innerHTML = "Name cannot be empty";
                flag = false;
            }
            if (username == "") {
                document.getElementById('usernameError').innerHTML = "Username cannot be empty";
                flag = false;
            }
            else {
                for (var i = 0; i < username.length; i++) {
                    if (username[i] == ' ') {
                        flag = false;
                        document.getElementById('usernameError').innerHTML = "Username cannot contain whitespace";
                        break;
                    }
                }
            }
            if (password == "") {
                document.getElementById('passwordError').innerHTML = "Password cannot be empty";
                flag = false;
            }
            else {
                if (!(password.length >= 8 && password.length <= 32)) {
                    flag = false;
                    document.getElementById('passwordError').innerHTML = "Password Length must be within 8-32 chars";
                }
            }
            if (gender == "") {
                document.getElementById('genderError').innerHTML = "Gender must be selected";
                flag = false;
            }
            if (contact == "") {
                document.getElementById('contactError').innerHTML = "Contact cannot be empty";
                flag = false;
            }
            else {
                for (var i = 0; i < contact.length; i++) {
                    if (!(contact[i] == '0' || contact[i] == '1' || contact[i] == '2' || contact[i] == '3' || contact[i] == '4' || contact[i] == '5' || contact[i] == '6' || contact[i] == '7' || contact[i] == '8' || contact[i] == '9')) {
                        flag = false;
                        document.getElementById('contactError').innerHTML = "Contact no contains number only";
                        break;
                    }
                }
            }
            if (location == "") {
                document.getElementById('locationError').innerHTML = "location must be selected";
                flag = false;
            }
            return flag;
        }
    </script>

    </html>