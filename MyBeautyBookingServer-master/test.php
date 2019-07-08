<?php
$con = mysqli_connect("localhost", "root", "", "BeautyBooking");

if ($_SERVER['REQUEST_METHOD']='POST') {

    $Email=isset($_POST['Email']);
    $Password = isset($_POST['Password']);
echo "test". $Email;
}
  ?>