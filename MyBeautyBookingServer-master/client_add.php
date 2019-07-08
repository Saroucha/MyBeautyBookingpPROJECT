<?php
include_once 'connection.php';
	
	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}
		
		public function does_user_exist($email,$password,$name,$first_name,$phone,$street,$city,$zip)
		{
			$query = "Select * from Client where email='$email'";
			$result = mysqli_query($this->connection, $query);
			if(mysqli_num_rows($result)>0){
				$json['exist'] = ' Welcome ';
				echo json_encode($json);
				mysqli_close($this -> connection);
			}else{
				$query = "insert into Client (email, password,name,first_name,phone,street,zip,city) values ( '$email','$password','$name','$first_name','$phone','$street','$zip','$city')";
				$inserted = mysqli_query($this -> connection, $query);
				if($inserted == 1 ){
					$sql_query = "Select id,name,first_name,email,password,phone,street,zip,city from Client where email='$email'";
					$result = mysqli_query($this -> connection, $sql_query);
					if ($result){
						$us = mysqli_fetch_assoc($result);
						$json['success'] = 'Acount created';
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
	
					}
				}else{
					$json['error'] = 'Wrong password';
				}
				echo json_encode($json);
				mysqli_close($this->connection);
			}
			
		}
		
	}
	
	
	$user = new User();
	if(isset($_POST['email'],$_POST['password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_encrypt = sha1($password);
		$name = $_POST['name']; 
		$first_name = $_POST['first_name']; 	
		$phone= '';
		$street= '';
		$city = ''; 
		$zip= '';
		
		if(!empty($email) && !empty($password)){
			
			$encrypted_password = md5($password);
			$user-> does_user_exist($email,$encrypted_password,$name,$first_name,$phone,$street,$city,$zip);
			
		}else{
			$json['error'] = 'you must type both inputs';
			echo json_encode($json);
		}
		
	}
?>