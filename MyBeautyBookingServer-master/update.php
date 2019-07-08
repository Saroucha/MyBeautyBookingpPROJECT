<?php

include_once 'connection.php';
	
	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}
		
		public function update($id,$email,$name,$first_name,$phone,$street,$city,$zip)
		{	
			$query = "UPDATE Client SET email='$email',name='$name',first_name='$first_name',phone='$phone',street='$street',city='$city',zip='$zip' WHERE id = '$id'";
			$result = mysqli_query($this -> connection, $query);
			if($result)
			{
				return $result;
			}else {echo "wrong";}
		}

		public function get_user_byEmail($id)
		{
			$sql_query = "Select id,name,first_name,email,password,phone,street,zip,city from Client where id='$id'";
			$result = mysqli_query($this -> connection, $sql_query);
			if ($result){
				return mysqli_fetch_assoc($result); 
			}else {
			 	return mysqli_error_list($result);
			}
		}
}
	
	$user = new User();
	if(isset($_POST['id'],$_POST['email'],$_POST['name'])) {
		$id = $_POST['id'];
		$email = $_POST['email'];
		$name = $_POST['name']; 
		$first_name = $_POST['first_name']; 	
		$phone = $_POST['phone'];
		$street = $_POST['street'];
		$city = $_POST['city']; 
		$zip = $_POST['zip'];


		if(!empty($id) && !empty($email) && !empty($name) ){
			
			if($user-> update($id,$email,$name,$first_name,$phone,$street,$city,$zip)){
			
						$us = $user-> get_user_byEmail($id);
						$json['success'] = 'Acount updated';
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
	}else{$json['failed'] = ' wrong '.$email;
			echo json_encode($json);}

}else{$json['failed'] = ' wrong '.$email;
			echo json_encode($json);}

?>
