<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script language="javascript"></script>
</head>
<body>
    
<?php
// actif pro
include 'Connexion.php';
$proQuery= $con->query("SELECT `id`,`NomP`,`Email`,`Telephone`,`image_path`,`Adresse`,`Postale`, `Distance`,`NomEntreprise`,`Registre`,`Description`,`Traite`,`Actif` FROM `professionels`");

while($pro=mysqli_fetch_assoc($proQuery)): 
    if($_GET['traite_p'] == $pro['id']){
        $traite_id=$_GET['traite_p'];
        $Traite =$pro['Traite'];
    } 

    if($Traite==0){
        $Traite=1;
       
    }
    $traite_p="update professionels SET Traite =".$Traite." WHERE id=".$traite_id;
    $run_traite=mysqli_query($con,$traite_p);
  
       if($run_traite && $Traite==0 ){
            $Traite=1;

       // echo"<script>alert('Le compte a été desactivé')</script>";
        echo"<script>window.open('Professionnels.php','_self')</script>";
     
        }else if($Traite==1) {
            $Traite=0;
           // echo"<script>alert('Le compte est déjà traité')</script>";
            echo"<script>window.open('Professionnels.php','_self')</script>";
        }
    endwhile;
//}





   
//}
?>
</body>
</html>
