<?php
include 'configu.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 { 
  
     $adresse= isset($_POST['Adresse']) ? $_POST['Adresse'] : NULL;

    $distance=isset($_POST['Distance']) ? $_POST['Distance'] : NULL;
    $description=isset($_POST['Description']) ? $_POST['Description'] : NULL;
    $tel=isset($_POST['Telephone']) ? $_POST['Telephone'] : NULL;
    $id=isset($_POST['id']) ? $_POST['id'] : NULL;

    $sql= "UPDATE `professionels` SET `Telephone`=$tel,`Adresse`=$adresse,`Distance`=$distance,`Description`=$description, WHERE `id`='$id' ";

    if(mysqli_query($conn, $sql)){

       
        echo "Votre demande a été effectué";
        }
        
        mysqli_close($conn);
        }else{
        echo "Please Try Again";
        }
?>


