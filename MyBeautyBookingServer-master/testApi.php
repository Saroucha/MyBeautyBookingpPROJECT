<?php 
        //getting the database connection
 require_once 'testCon.php';
 
 //an array to display response
 $response = array();
 
 //if it is an api call 
 //that means a get parameter named api call is set in the URL 
 //and with this parameter we are concluding that it is an api call 
 if(isset($_GET['apicall'])){
 
 switch($_GET['apicall']){
 
 case 'signup':
 
 //in this part we will handle the registration
 
 break; 
  
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

 
 default: 
 $response['error'] = true; 
 $response['message'] = 'Invalid Operation Called';
 }
 
 }else{
 //if it is not api call 
 //pushing appropriate values to response array 
 $response['error'] = true; 
 $response['message'] = 'Invalid API Call';
 }
 
 //displaying the response in json structure 
 echo json_encode($response);

  //function validating all the paramters are available
 //we will pass the required parameters to this function 
 function isTheseParametersAvailable($params){
 
    //traversing through all the parameters 
    foreach($params as $param){
    //if the paramter is not available
    if(!isset($_POST[$param])){
    //return false 
    return false; 
    }
    }
    //return true if every param is available 
    return true; 
    }
    ?>