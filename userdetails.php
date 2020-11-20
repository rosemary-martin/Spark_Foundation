<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style>
      
      

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
 
 
  width: 100%;
  border: 3px solid #dddddd;
}
td, th {
  border: 3px solid #dddddd;
  text-align: left;
 
  padding: 8px;
}

table, th, td {
  border: 3px solid black;
 
}
body, html {
  height: 100%;
  margin: 0;
 
 
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
  background-color:white;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: brown;
  color: white;
}
body {
  /* The image used */
  background-image: url("image.jpg");
  height: 20%;
  background-position: center;
  background-repeat: no-repeat;
  background-size:auto;
}


h2 {
  color: black;
  
  text-shadow: 0 0 3px #FF0000;
  text-shadow: 2px 2px 4px #000000;
}
        
 /* The image used */
 


    </style>
</head>

<body>

<?php
   include 'connection.php';
   $sql = "SELECT * FROM bank";
   $result = mysqli_query($conn,$sql);
  
   
?>

<?php

  //include 'navbar.php';
?>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="userdetails.php">USER</a>
  <a href="transationhistory.php">TRANSATION HISTORY</a>
  <a href="transfermoney.php">TRANSFER MONEY</a>
</div>
     
<div class="container">

        <h2 class="text-center pt-4">USER DETAILS</h2>
        <br>
          
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-striped table-condensed table-bordered">
                        <thead>
                            <tr> 
                          <b> <th scope="col" class="text-center py-2">Id</th><!--show web--></b>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">BALANCE</th>
                            <!--<th scope="col" class="text-center py-2">Operation</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?> <tread>
                    <tr>
                   
                      <b> <td class="py-2"><?php echo $rows['id'] ?></td><!--name as same as db--></b>
                        <td class="py-2"><?php echo $rows['NAME']?></td>
                        <td class="py-2"><?php echo $rows['EMAIL']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                        <!--<td><a href="selectuserdetails.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Transact</button></a></td> -->
                    </tr>
                    </tread>

                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
            
</body>
</html>