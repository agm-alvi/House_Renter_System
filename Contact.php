<?php
include 'connection.php';

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Contact | Find Nest</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            body{
                background-color: linear-gradient(rgba(100, 100, 100, 0.5),rgba(00,00,00,0.8));
                
            }
            h1 {
                text-align: center;
            }
            
            .contactform {
                background: linear-gradient(rgba(00, 00, 00, 0.9),rgba(150,150,150,0.3));
                /* opacity: .6; */
                margin-left: 35%;
                margin-right: 30%;
                margin-top: 5%;
                padding: 20px;
                color: white;
                box-shadow: -5px -6px 5px 5px #000000;
            }
            
            label {
                font-size: larger;
                color: whitesmoke;
            }
            
            nav {
                margin: 25px 0px;
            }
            
            #button {
                background: white;
                padding: 10px 115px;
            }
            input, textarea{
                padding: 5px 100px;
            }
            
            a {
                color: red;
            }
        </style>
    </head>

    <body>
        <?php include 'header.php';?>
            <h1>Find Nest | Contacts</h1>
            <div class="contactform">
                <form class="form" action="Contact.php" method="post">
                    <nav>
                        <label>Name:</label>
                        <input type="text" name="name" placeholder="Name" required>
                    </nav>
                    <nav>
                        <label>Email:</label>
                        <input type="Email" name="email" placeholder="Email" required>
                    </nav>
                    <nav>
                        <label>Comments:</label>
                        <textarea rows="10" cols="20" name="comments" placeholder="message...." required></textarea>
                    </nav>
                    <nav>
                        <input type="Submit" name="" id="button"
                               value="Submit"> </nav>
                </form>
            </div>
            <?php
if(isset($_POST['name'])){
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

if($name != ""){
	if (mysqli_query($conn,  "INSERT INTO contact (name, email, comments) VALUES ('$name', '$email', '$comments')")) {
	echo "Thanks for your precious Review";
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



mysqli_close($conn);
}
?>
                <?php include 'footer.php';?>
    </body>

    </html>