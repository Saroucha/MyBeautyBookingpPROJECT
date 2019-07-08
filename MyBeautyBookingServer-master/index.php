  <?php
require_once 'Connexion.php';
if(!is_logged_in()){
    header('Location:login.php');
}
//include 'includes/head.php';
//include 'includes/navigation.php';

$now = time();
// checking the time now when home page starts

   if($now > $_SESSION['expire'])

   {

       session_destroy();

       echo "<p align='center'>votre session est resté 20 minutes inactif ! <a href='login.php'>Connectez vous ici</a></p>";

   }

   else

   {
?>
<style>
  @font-face {
    font-family: "Sofia";
    src: url("Sofia-Regular.ttf") format("truetype");
    font-weight: 400;
    font-style: normal;
    font-family: "Brown";
    src: url("Brown-Regular.ttf") format("truetype");
    font-weight: 400;
    font-style: normal;
}
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<div class="topnav" id="myTopnav">
<a href="index.php" class="navbar-brand" style="font-family: Sofia;"> Beauty Booking Administration</a>

  <div class="dropdown">
    <button class="dropbtn">Professionnels 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Professionnels.php">Tous les professionnels</a>
      <a href="Professionnels_non_traite.php">Pros non traités</a>
      <a href="Professionnels_non_actif.php">Pros non actifs</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Client 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Clients.php">Tous les Clients</a>
      <a href="Clients_non_abonnes.php">Client non abonnées</a>
      <a href="Clients_abonnes.php">Client abonnées</a>
    </div>
  </div> 
  <a href="edit/index.php">Utilisateurs</a>
<a href="logout.php" style="text-align:right;" >Déconnexion</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<p style='float:left;'><img src="images/logo.png" width="100" height="100" /> </p>

<p style='float:left;margin-left:68%;'><img src="images/avatar.png" width="50" height="50" /> </p><p style='line-height:65px;  padding-left:3%;'><h1 style="font-family:Brown; margin-left:68%; ">Bienvenue <b style="font-family:Sofia; "><?=$user_data['first']; ?></b>!</h1></p>
<br/><br/><br/>

<?php

$result = $con->query('SELECT sum(Traite = 0) AS yes FROM Professionels'); 

while($record = $result->fetch_array()){
    $total = $record['yes'];
}if($total!=0)
echo "<p style='float:left; margin-left:12%;font-family:Brown;'><img src='images/icon_message.png' width='30' height='30'/></p><p style='line-height:65px; margin-left:12%; padding-left:3%;'>vous avez"."\n".$total."\n"."dossier (s) non traités!! :  <a href='Professionnels_non_traite.php'>Cliquer ici pour consulter</a></p> ";
else
echo "<p style='float:left; margin-left:12%;font-family:Brown;'><img src='images/icon_check.png' width='30' height='30'/></p><p style='line-height:65px; margin-left:12%; padding-left:3%;'>AUCUN DOSSIER NON TRAITE </p>";

?>

<?php

$resultt = $con->query('SELECT sum(Actif = 0) AS non FROM Professionels'); 

while($record = $resultt->fetch_array()){
    $total2 = $record['non'];
}if($total2!=0)
echo "<p style='float:left; margin-left:12%;font-family:Brown;'><img src='images/icon_message.png' width='30' height='30'/></p><p style='line-height:65px; margin-left:12%; padding-left:3%;'>vous avez"."\n".$total2."\n"."dossier (s) non actifs!! :  <a href='Professionnels_non_actif.php'>cliquer ici pour voir</a></p> ";
else
echo "<h3 class='text-center' style='margin-left:30%;margin-top:10%;font-family:Brown;'>TOUT LES DOSSIERS SONT ACTIVES </h3>";

?>




<?php
}?>
