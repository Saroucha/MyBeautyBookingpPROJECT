<?php
$con = mysqli_connect("localhost:3307","root","","test");

if(mysqli_connect_errno()){
    echo"Base de données echoué avec les erreurs suivantes :" .mysqli_connect_error();
    die();
}
session_start();
include 'config.php';
require_once 'helpers.php';
if(isset($_SESSION['SBUser'])){
    $user_id=$_SESSION['SBUser'];
    $query=$con->query("SELECT * FROM developers WHERE id='$user_id'");
    $user_data=mysqli_fetch_assoc($query);
    $fn=explode(' ',$user_data['name']);
    $user_data['first']=$fn[0];
    $user_data['last']=$fn[1];
}

if(isset($_SESSION['success_flash'])){
    echo'<div class="bg-success"><p class="text-success text-center">'.$_SESSION['success_flash'].'</p></div>';
    unset($_SESSION['success-flash']);

}

if(isset($_SESSION['error_flash'])){
    echo'<div class="bg-danger"><p class="text-danger text-center">'.$_SESSION['error_flash'].'</p></div>';
    unset($_SESSION['error_flash']);
    
}



//$con->close();
?>