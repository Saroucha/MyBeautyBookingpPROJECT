<?php

include 'configu.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

    if($_SERVER['REQUEST_METHOD']=='POST'){

   
 $ID = $_POST['id'];

$Sql_Query = "UPDATE professionels SET Actif='0' WHERE id = '$ID'";

if(mysqli_query($conn, $Sql_Query))
{
 echo 'Record Deleted Successfully';
}
else
{
 echo 'Something went wrong';
 }
 }
 mysqli_close($conn);
?>