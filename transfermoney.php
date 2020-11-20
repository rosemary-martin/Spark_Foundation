<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:brown;
        color: white;
      }
      
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
h2 {
  color: black;
  
  text-shadow: 0 0 3px #FF0000;
  text-shadow: 2px 2px 4px #000000;
}
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

<div class="container">
        <h2 class="text-center pt-4">SELECT USER</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                           <th scope="col" class="text-center py-2">Id</th><!--show web-->
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Transation</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                    
                       <td class="py-2"><?php echo $rows['id'] ?></td><!--name as same as db-->
                        <td class="py-2"><?php echo $rows['NAME']?></td>
                        <td class="py-2"><?php echo $rows['EMAIL']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                        <td><a href="selectuserdetails.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Select</button></a></td> 
                    </tr>
                    

                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>