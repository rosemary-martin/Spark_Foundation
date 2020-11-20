<?php
$conn = mysqli_connect('localhost','root','','user') or die("could not connect to database");
if(!$conn){
    die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
}
?>
