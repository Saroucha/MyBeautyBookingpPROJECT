<?php

include_once 'connection.php';

	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}


		public function delete($id)
		{
			$query = "DELETE From Client WHERE id = '$id'";
			return 1;

		}
		
	}
	
	
	$user = new User();

	if(isset($_POST['id'])) {

		$id = ($_POST['id']);
		 

		if(!empty($id)){

			if($user-> delete($id)==1){
			
				$json['success'] = ' Delete '.$id;
				echo json_encode($json);
			}else{
				$json['failed'] = ' Wrong '.$id;
				echo json_encode($json);
			}
		}

}
?>
