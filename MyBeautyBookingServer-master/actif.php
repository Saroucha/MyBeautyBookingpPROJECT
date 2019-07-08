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
    if($_GET['actif_p'] == $pro['id']){
        $actif_id=$_GET['actif_p'];
        $actif =$pro['Actif'];
        $Traite =$pro['Traite'];
    } 


//if(isset($_GET['actif_p'])){
   /* $actif_id=$_GET['actif_p'];

    $actif =$pro['Actif'];
    $Traite =$pro['Traite'];
    */
    if($actif==0){
        $actif=1;
       
    }else{
        $actif=0;  
    }
    $actif_p="update professionels SET Actif =".$actif." WHERE id=".$actif_id;
    $run_actif=mysqli_query($con,$actif_p);
  
       if($run_actif && $actif==0 ){
            $actif=1;

       // echo"<script>alert('Le compte a été desactivé')</script>";
        echo"<script>window.open('Professionnels.php','_self')</script>";
   
        }else {
            $actif=0;
          //  echo"<script>alert('Le compte a été activé')</script>";
            echo"<script>window.open('Professionnels.php','_self')</script>";
        }
    endwhile;
//}




   
//}
?>
</body>
</html>
