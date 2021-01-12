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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | Find Nest</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            body {
                background-color: snow;
            }
            
            input {
                left: 100px;
            }
            table {
                width: 100%;
            }
        </style>    

	<script>
function usersearchTxt(str) {
console.log(str);
}
</script>

	</head>
<body>

	<header>
        <h1>Find Nest | Dashboard</h1>
	</header>


	<div>
		<h1>You are Logged In</h1>
	</div>
	<div>
	<input id="searchBox" type="text" name="search" value="" placeholder="Enter key to search" onkeyup="usersearchTxt(this.value)">
<!--<button type="button" name="button"
onclick="usersearchTxt(document.getElementById('searchBox').value);">search</button> -->
<div id="searchTable">
<table width="100%">
	  <tr>
	  	<th  width= "30%">Name</th>
	  	<th  width= "30%">Email</th>
	  	<th  width= "40%">Comments</th>
	  </tr>

<?php
include 'DBManager.php';
echo fetch('');
?>
</table>
<a href="Logout.php">Logout</a>
        </div>
    </div>
	<footer style="text-align: center;">&copy 2021 Find Nest. All Rights Reserved</footer>
</body>

  <script type="text/javascript">

function usersearchTxt(str) {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
if(this.readyState == 4 && this.status == 200){
document.getElementById('searchTable').innerHTML =
this.responseText;
}
}
xmlhttp.open("GET","Dashboard.php?search="+str,true);
xmlhttp.send();
}
</script>

</html>