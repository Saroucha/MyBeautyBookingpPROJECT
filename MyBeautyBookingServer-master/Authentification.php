<?php
 
   if($_SERVER['REQUEST_METHOD']='POST'){

      require_once "confu.php" ;
       
        $username =  $_POST['Email'];
		 $password = md5($_POST['Password']);
		
 	
	 if( $username == '' || $password == '' ){
	        echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
	 }else{
	 	$query= "SELECT * FROM professionels WHERE Email='$username' AND password='$password'and Actif=1";
	        $result= mysqli_query($con, $query);
		 
	        if(mysqli_num_rows($result) > 0){  
	         $query= "SELECT * FROM professionels WHERE Email='$username' AND password='$password'and Actif=1";
	                     $result= mysqli_query($con, $query);
		             $emparray = array();
	                     if(mysqli_num_rows($result) > 0){  
	                     while ($row = mysqli_fetch_assoc($result)) {
									 $emparray[] = $row;
									
                                   }
	                     }
	           echo json_encode(array( "status" => "true","message" => "Connexion réussie !", "data" => $emparray) );
	        }else{ 
	        	echo json_encode(array( "status" => "false","message" => "Identifiant ou MDP invalide ou compte inactif!") );
	        }
	         mysqli_close($con);
	 }
	} else{
			echo json_encode(array( "status" => "false","message" => "Error occured, please try again!") );
	}
?>
