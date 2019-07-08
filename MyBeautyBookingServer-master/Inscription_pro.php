<?php
require_once 'configu.php';

if($_SERVER['REQUEST_METHOD']='POST'){

 $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $Email = $_POST['Email'];
 
 $Password = $_POST['password'];

 $Password = sha1($Password);  
 
 $Full_Name = $_POST['NomP'];
  
 $CheckSQL = "SELECT * FROM test WHERE Email='$Email'";
 
 $check = mysqli_fetch_array(mysqli_query($conn,$CheckSQL));
 
 if(isset($check)){

 echo 'Email Already Exist, Please Enter Another Email.';

 }
else{ 
$Sql_Query = "INSERT INTO test (Email,password,NomP) values ('$Email','$Password','$Full_Name')";

 if(mysqli_query($conn,$Sql_Query))
{
 echo 'User Registration Successfully';
}
else
{
 echo 'Something went wrong';

 }
 mysqli_close($conn);
}

}

?>
