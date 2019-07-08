<?php 
include 'Connexion.php';
include 'includes/head.php';
$_SESSION['start'] = time();
 
// il sera expiré apres 20 inutes
$_SESSION['expire'] = $_SESSION['start'] + (20 * 60) ; 

$email = ((isset($_POST['Email']))?sanitize($_POST['Email']):'');
$email = trim($email);
$password = ((isset($_POST['Password']))?sanitize($_POST['Password']):'');
$password = trim($password);


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

body{
    font-family:"Sofia";
    background-image:url("images/background1.jpg");  
    background-attachment: fixed;
  
    
}
#login-form{
    font-family:"Brown";
    width:50%; height:60%; border:2px rgba(0,0,0,0.19); margin:8% auto; border-radius:15px; padding:15px; box-shadow: 5px 5px 0px rgba(0,0,10,16); background:#fff;
    background-size: auto 250px; 
    
}
</style>

<div id="login-form">
<div>

<?php
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con,$_POST['Email']);
    $password = mysqli_real_escape_string($con,$_POST['Password']);


    $user ="select * from developers where Address='$email' AND Password ='$password'";
    $query=$con->query($user);
    $check_user = mysqli_fetch_assoc($query);

    if($check_user ==0){
        echo"<script>alert('Mot de passe Ou email INCORRECT')</script>";
    }else{
        $user_id = $check_user['id'];
        login($user_id);
        header('Location:index.php');
    }

}

?>

</div>
<img src="images/logo.PNG" style="position:center; margin:2% auto; margin-left:32%; "/>
<h2 class="text-center" style="font-family:Sofia; font-size:380%; padding:5px; text-shadow: 0px 6px #fce3dc;">Connexion Admin</h2>

<form action="login.php" method="post">
<div class="form-group col-md-12">
<label for="Email" style="letter-spacing: 3px;">MAIL</label>
<input type="Email" name="Email" class="form-control input-sm" id="Email" value="<?=$email;?>">
</div>

<div class="form-group col-md-12">
<label for="Password" style="letter-spacing: 3px;">PASSWORD</label>
<input type="Password" name="Password" id="Password" class="form-control input-sm" value="<?=$password;?>">

</div>
<div class="clearfix"></div>
<hr>
<div class="form-group">

<input type="submit" name="login" class="btn btn-default" value="Connexion" style="background-color:#fce3dc; margin-left:42%; font-size:150%;letter-spacing: 2px;" >

</div>


</form>


