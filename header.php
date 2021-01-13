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

    background-image: linear-gradient(rgba(50, 130, 210, 0.9),rgba(210,130,0,0.8));
    background-size: cover;
    background-position: center;
    height: 8vh;
    
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
                    <img src="h.jpg">
                </div>


            <ul>
                <li class="home"><a href = "index.php"> Home </a> </li>
                <li> <a href = "#"> Service </a> </li>
                <li> <a href = "#"> About Us </a> </li>
                <li> <a href = "#"> Contact Us </a> </li>
                <li> <a href = "#"> Our Reviews </a> </li>
            </ul>
            </div>
        </header>
</body>
</html>