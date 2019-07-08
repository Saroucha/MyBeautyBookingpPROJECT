<?php
case 'login':
 //for login we need the username and password 
 if(isTheseParametersAvailable(array('Email', 'password'))){
 //getting values 
 $username = $_POST['Email'];
 $password = md5($_POST['password']); 
 
 //creating the query 
 $stmt = $conn->prepare("SELECT id, Email,password FROM professionels WHERE Email = ? AND password = ?");
 $stmt->bind_param("ss",$username, $password);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 //if the user exist with given credentials 
 if($stmt->num_rows > 0){
 
 $stmt->bind_result($id, $username, $password);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'Email'=>$username,
 'password'=>$password
 );
 
 $response['error'] = false; 
 $response['message'] = 'Login successfull'; 
 $response['user'] = $user; 
 }else{
 //if the user not found 
 $response['error'] = false; 
 $response['message'] = 'Invalid username or password';
 }
 }
 break;

 ?>