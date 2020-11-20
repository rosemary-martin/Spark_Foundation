<?php
include 'connection.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from bank where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from bank where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);




    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  

    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
               
                $newbalance = ($sql1['balance']) - $amount;
                $sql = "UPDATE user.bank set balance = '$newbalance' where id = '$from' ";
                $query=mysqli_query($conn,$sql);
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE user.bank set balance = '$newbalance' where id = '$to' ";
                $query=mysqli_query($conn,$sql);
                $sender = $sql1['NAME'];
                $receiver = $sql2['NAME'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);
                
                if($query){
                    echo "<script> alert('Transaction Successful');
                                    window.location='transationhistory.php';
                          </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
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
.bg-image {
  /* The image used */
  background-image: url("image.jpg");

  /* Add the blur effect */
  
  /* Full height */
  height: 60%;
  width:100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: auto;
}
h6 {
    color: white;
  text-shadow: -1px 0 brown, 0 1px black, 1px 0 black, 0 -1px brown;
  
}
h1 {
  color: black;
  
  text-shadow: 0 0 3px #FF0000;
  text-shadow: 2px 2px 4px #000000;
}

    </style>
</head>

<body>


	<div class="container">
        <h1 class="text-center pt-4">TRANSACTION</h1>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  user.bank where id = $sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
           
            <form method="post" name="tcredit" class="tabletext" ><br>
        <br><br><br>
       
        <h6><label>Select Reciever:</label> </h6>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM user.bank where id != $sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['NAME'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br><div class="bg-image"></div>
            <h6><label>Enter Amount:</label></h6>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
            <div class="bg-image"></div>
           <h6> <label>Confirm Amount:</label></h6S>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Proceed</button>
            </div>
        </form>
    </div>
</body>
</html>