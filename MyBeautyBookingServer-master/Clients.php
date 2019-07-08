<?php
require_once 'Connexion.php';
if(!is_logged_in()){
    login_error_redirect();
}
//on place le head et la nav
//include 'includes/head.php';
//include 'includes/navigation.php';
?> 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">

<script src="js/bootstrap.min.js"></script>
</head>
<body>
<style>
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

<h2 style="margin-top:5%; padding:8px; text-align:center;font-family:Sofia;text-shadow: 0px 6px #fce3dc;">Liste des Clients</h2>

<table class="table table-bordered table-striped table-condensed" align="center" style="font-family:Brown;align:center;">
<thead style="Background-color:black; color:white; letter-spacing:2px;"><th></th><th>Nom</th><th>Prénom</th><th>Email</th><th>Phone</th><th>Adresse</th><th>Postale</th><th>Ville</th></thead>
<tbody>
<?php 
$proQuery= $con->query("SELECT `id`,`name`,`first_name`,`email`,`phone`,`street`,`zip`,`city` FROM `client`");

while($pro=mysqli_fetch_assoc($proQuery)):
?>
<tr>
<td></td>
<td><?=$pro['name']; ?></td>
<td><?=$pro['first_name']; ?></td>
<td><?=$pro['email']; ?></td>
<td><?=$pro['phone']; ?></td>
<td><?=$pro['street']; ?></td>
<td><?=$pro['zip']; ?></td>
<td><?=$pro['city']; ?></td>


<td>
</tr>
<?php endwhile;?>
</tbody>
</table>
</body>
</html>
