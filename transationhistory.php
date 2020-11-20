<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>
<style>
body {
  /* The image used */
  background-image: url("image.jpg");

  /* Add the blur effect */
  
  
 
  /* Full height */
  height: 100%;
  width:100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-size: auto;
}
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: white;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: brown;
  color: white;
}
.table table-hover table-striped table-condensed table-bordered {
  font-family: arial, sans-serif;
  border-collapse: collapse;
 
 
  width: 100%;
  border: 3px solid #dddddd;
}
.py-2{
  border: 3px solid #dddddd;
  text-align: left;
 
  padding: 8px;
}

table, th, td {
  border: 3px solid black;
 
}
h2 {
  color: black;
  
  text-shadow: 0 0 3px #FF0000;
  text-shadow: 2px 2px 4px #000000;
}
</style>
<body>
<div class="topnav">
  <a class="active" href="index.php">HOME</a>
  <a href="userdetails.php">USERS</a>
  <a href="transationhistory.php">TRANSACTION HISTORY</a>
  <a href="transfermoney.php">TRANSFER MONEY</a>
</div>
	<div class="container">
        <h2 class="text-center pt-4">TRANSACTION HISTORY</h2>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">Sender</th>
                
                <th class="text-center">Receiver</th>
               
                <th class="text-center">Amount</th>
                <th class="text-center">Date </th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'connection.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>
<thead>
            <tr>
           <!-- <td class="py-2"><?php echo $rows['sno']; ?></td>-->
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
            </thead>             
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>

</body>
</html>