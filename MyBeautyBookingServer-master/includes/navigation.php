<nav class="nnavbar navbar-inverse navbar-fixed-top">
<div class="container">
    <style>
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
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
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}
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

        </style>
        
<a href="index.php" class="navbar-brand" style="font-family: Sofia;"> Beauty Booking Administration</a>
<ul class=" dropdown nav navbar-nav" style="margin-left:15%; font-family:Brown">
<!--items menu -->
<li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn">Professionnels</a>
   <div class="dropdown-content">
      <a href="Professionnels.php">Tous les pros </a>
      <a href="#">Pros non traitès 2</a>
      <a href="#">Pros non actifs</a>
    </div>
  </li>
 <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Clients</a>
    <div class="dropdown-content">
      <a href="#">Tous les clients</a>
      <a href="#">Clients non abonnées</a>
      <a href="#">Client abonnées</a>
    </div>
  </li>
<li><a href="Clients.php">Clients</a></li>

<li><a href="admins.php">Utilisateurs</a></li>

<li class="dropdown">

<li  ><a href="logout.php" style="text-align:right;" >Déconnexion</a></li>
</ul>

</div>


</nav>
