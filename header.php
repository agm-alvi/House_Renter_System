<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{

    margin: 0;
    padding: 0;
    font-family: 'Times New Roman', Times, serif;
    font-weight: 700;

}

header{

    background-image: linear-gradient(rgba(80, 80, 80, 0.9),rgba(0,0,0,0.8));
    box-shadow: 0px 2px 2px 5px black;
    background-size: cover;
    background-position: center;
    height: 8vh;
    margin-bottom: 50px;
    
}

ul{
    float: right;
    list-style-type: none;
    margin-top: 20px;
}

ul li{

    display: inline;
}

ul li a{

    text-decoration: none;
    color: rgb(250, 250, 250);
    padding: 10px 20px;
    border: 2px solid rgb(61, 160, 226);
    margin: 2px;
    transition: 1s ease;
   
}

ul li a:hover{
        background-color: cornsilk;
        color: black;
}

ul li.home a{
    background-color: cornsilk;
    color: black;
}


.logo img{
    float: left;
    width: 100px;
    height: auto;
    margin: 5px;
}

	</style>
</head>
<body>

        <header>

            <div class= "main">

                <div class="logo">
                    <img src="logo.jpg">
                </div>


            <ul>
                <li class="home"><a href = "index.php"> Home </a> </li>
                <li> <a href = "#"> Service </a> </li>
                <li> <a href = "#"> About Us </a> </li>
                <li> <a href = "Contact.php"> Contact Us </a> </li>
                <li> <a href = "Logout.php"> Logout </a> </li>
            </ul>
            </div>
        </header>
</body>
</html>