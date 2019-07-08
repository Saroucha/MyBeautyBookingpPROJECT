<?php

include_once 'connection.php';
	
	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}
		
		public function does_user_exist($email,$password)
		{
			$query = "Select * from Client where email='$email' and password = '$password' ";
			$result = mysqli_query($this -> connection, $query);
			return $result; 
		}
		
		public function get_user_byEmail($email)
		{
			$query = "Select id,name,first_name,email,password,phone,street,zip,city from Client where email='$email'";
			$result = mysqli_query($this -> connection, $query);
			if ($result){
				return mysqli_fetch_assoc($result); 
			}else {
			 	return mysqli_error_list($result);
			}
		}
		
	}
	
	
	$user = new User();
	if(isset($_POST['email'],$_POST['password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		
		if(!empty($email) && !empty($password)){	
			
			$encrypted_password = md5($password);
			if(mysqli_num_rows($user-> does_user_exist($email,$password))>0){
				$us = $user-> get_user_byEmail($email);
					$json['success'] = ' Welcome '.$email;
					$json['id'] = $us['id'];
					$json['name'] = $us['name'];
					$json['firstname'] = $us['first_name'];
					$json['email'] = $us['email'];
					$json['password'] = $us['password'];
					$json['phone'] = $us['phone'];
					$json['street'] = $us['street'];
					$json['zip'] = $us['zip'];
					$json['city'] = $us['city'];
					echo json_encode($json);

			
		}else{
			$json['failed'] = ' wrong '.$email;
			echo json_encode($json);
		}
		
	}
    }
?>
