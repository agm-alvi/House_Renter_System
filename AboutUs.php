<?php
include 'connection.php';
$creator1 = "SELECT * FROM creators c1 where c1.id = 1 ";
$creator1 = mysqli_query($conn, $creator1);
$c1 = mysqli_fetch_array($creator1);

$creator2 = "SELECT * FROM creators c2 where c2.id = 2 ";
$creator2 = mysqli_query($conn, $creator2);
$c2 = mysqli_fetch_array($creator2);

$creator3 = "SELECT * FROM creators c3 where c3.id = 3 ";
$creator3 = mysqli_query($conn, $creator3);
$c3 = mysqli_fetch_array($creator3);
?>
<!DOCTYPE html>
<html>

<head>
    <title>About Us | Find Nest</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        body {
            background-color: linear-gradient(rgba(255, 100, 100, 0.5), rgba(00, 00, 00, 0.8), rgba(00, 255, 00, 0.5));
        }

        h1 {
            text-align: center;
        }

        a {
            color: red;
        }

        .r1 {
            width: 5%;
        }

        .rp {
            width: 30%;
        }

        table {
            width: 100%;
        }

        table,
        tr,
        td {
            border: 0px;
        }

    </style>
</head>

<body>
    <?php include 'header.php';?>
    <h1>Find Nest | About Us</h1>
    <table>

        <tr>
            <td class="r1"></td>
            <td class="rp"><img src=<?php echo $c1['img'];?>></td>
            <td class="rp"><img src=<?php echo $c2['img'];?>></td>
            <td class="rp"><img src=<?php echo $c3['img'];?>></td>
            <td class="r1"></td>
        </tr>
        <tr>
            <td class="r1"></td>
            <td class="rp"><b><?php echo $c1['name'];?></b></td>
            <td class="rp"><b><?php echo $c2['name'];?></b></td>
            <td class="rp"><b><?php echo $c3['name'];?></b></td>
            <td class="r1"></td>
        </tr>
        <tr>
            <td class="r1"></td>
            <td class="rp"><?php echo $c1['nsu_id'];?></td>
            <td class="rp"><?php echo $c2['nsu_id'];?></td>
            <td class="rp"><?php echo $c3['nsu_id'];?></td>
            <td class="r1"></td>
        </tr>
        <tr>
            <td class="r1"></td>
            <td class="rp"><?php echo $c1['position'];?></td>
            <td class="rp"><?php echo $c2['position'];?></td>
            <td class="rp"><?php echo $c3['position'];?></td>
            <td class="r1"></td>
        </tr>
    </table>

    <?php include 'footer.php';?>
</body>

</html>
