<?php
 
include_once 'connection.php';

class User {
		
		private $db;
		private $connection;
		public $con;	


		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}

		function con(){
				$con = $this->connection;
				return $con;		
		}
 
			public function select_vente()
					{

			$query = "SELECT NomP,Adresse,Categorie,Telephone,NomEntreprise,Distance,Registre,Description FROM professionels where Actif='1'";
			$result = mysqli_query($this->connection, $query);
			return $result; 

			}

}

	$user = new User();
			//$today = CURDATE();

			$result= $user-> select_vente();
			// Confirm there are results
			if ($result)
			{	
				// We have results, create an array to hold the results
					// and an array to hold the data
				$resultArray = array();
				$tempArray = array();

				// Loop through each result
				while($row = $result->fetch_object())
				{
					// Add each result into the results array
					$tempArray = $row;
					array_push($resultArray, $tempArray);
				}
			 
				// Encode the array to JSON and output the results
				echo json_encode($resultArray);
			}
			 
// Close connections

mysqli_close($user->con());
?>
