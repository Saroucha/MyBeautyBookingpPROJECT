<?php

include_once 'connection.php';
	
	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}


		public function does_user_exist($id_client)
		{
			$query = "Select * from Client where id_client='$id_client' ";
			$result = mysqli_query($this -> connection, $query);
			echo $result;
			return $result; 
		}
		
		public function deleteUser($id_client)
		{
			$query = "Delete Client where id_client= '$id_client'";
			$deleted = mysqli_query($this -> connection, $query);
			
			echo $deleted;
			//return mysqli_fetch_assoc($result); 
				if($deleted == 1 ){
					echo 'Acount deleted';
				}else{
					echo 'Wrong ';
				}
		}
		
	
		
	}
	
	
	$user = new User();
	if(isset($_POST['id_client'])) {
		$id_client = $_POST['id_client'];
		
		
		if(!empty($id_client) ){
			
			$encrypted_id_client = md5($id_client);
			if(mysqli_num_rows($user-> does_user_exist($id_client))>0){
				$us = $user-> deleteUser($id_client);
			
					$json['id'] = $us['id_client'];
					echo json_encode($json);
			
		}else{
			echo json_encode("you must type both inputs");
		}	
		
	}

}
?>
