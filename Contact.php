
<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact | Find Nest</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		label{
left: 20px;
		}
	</style>
</head>
<body>
<header>
        <h1>Find Nest | Contacts</h1>
</header>

<div>
	<form class="" action="Contact.php" method="post">
		<label>Name:</label> <input type="text" name="name" placeholder="Name" required><br>
		<label>Email:</label> <input type="Email" name="email" placeholder="Email" required><br>
		<label>Comments:</label> <textarea rows="10" cols="20" name="comments" required></textarea><br>
		<input type="Submit" name="" value="Submit">

	</form>
</div>

<?php
if(isset($_POST['name'])){
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

if($name != ""){
	if (mysqli_query($conn,  "INSERT INTO Contact (name, email, comments) VALUES ('$name', '$email', '$comments')")) {
	echo "Thanks for your precious Response";
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



mysqli_close($conn);
}
?>

<footer style="text-align: center;">&copy 2021 Find Nest. All Rights Reserved</footer>
</body>
</html>

