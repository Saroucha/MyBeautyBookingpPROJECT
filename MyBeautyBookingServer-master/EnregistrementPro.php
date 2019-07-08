<?php

include 'configu.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
mysqli_set_charset($conn,"utf-8");
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId = 0;
 
 $ImageData = $_POST['image_data'];
 $ImageName = $_POST['image_tag'];
 $name=$_POST['NomP'];
 $email = $_POST['Email'];
 $password=md5($_POST['Password']);
 $adresse=$_POST['Adresse'];
 $postale=$_POST['Postale'];
 $distance=$_POST['Distance'];
 $nomEntreprise=$_POST['NomEntreprise'];
 $registre =$_POST['Registre'];
 $description=$_POST['Description'];
 $tel=$_POST['Telephone'];
 $categorie=$_POST['Categorie'];
 $cat=htmlspecialchars($categorie, ENT_NOQUOTES, "UTF-8");

 //$im=$_POST['image_path'];

 $server_ip = gethostbyname(gethostname());

 $ImagePath = "upload/$ImageName.jpg";
 
 $ServerURL = "http://$server_ip/ProjetClient2/MyBeautyBookingServer-master/$ImagePath";
 
 $InsertSQL = "INSERT INTO Professionels (NomP,Email,Password,Telephone,Categorie,image_path,image_name,Adresse,Postale,Distance,NomEntreprise,Registre,Description,Traite,Actif) values('$name','$email','$password','$tel','$cat','$ServerURL','$ImageName','$adresse','$postale','$distance','$nomEntreprise','$registre','$description','0','0')";
 
 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Votre demande a été effectué, Nous traitons votre dossier dans les meilleurs delais";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 }

?>