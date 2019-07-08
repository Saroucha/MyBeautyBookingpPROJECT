<?php


// Create connection
$conn = new mysqli('localhost', 'nek', 'aoudjit', 'mybeautybooking');

   /* if($_SERVER['REQUEST_METHOD']=='POST'){

   		if(isset($_POST['email'],$_POST['id_client'])) {
		 $email = $_POST['email'];
		 $password = $_POST['password'];
		 $id_client = $_POST['id_client'];

		$Sql_Query = "DELETE From Client WHERE email = '$email' and id_client = '$id_client'";
		//$Sql_Query = "SELECT * From Client WHERE email = '$email' and password = '$password'";
		

		if(mysqli_query($conn, $Sql_Query))
			{
			$json['success'] = ' Welcome ';
				echo json_encode($json);
			 echo 'Record Deleted Successfully';
			}
		else
			{
			 echo 'Something went wrong';
			 }
	 	}
		else
			{
			 echo 'Wrong';
			 }
	}*/

		//$email = "toto@gmail.com";
		 //$password = "toto12345";
		 //$id_client = 4;
		$id = $_POST['id'];
		 

		$Sql_Query = "DELETE From Client WHERE id = '$id'";
		//$Sql_Query = "SELECT * From Client WHERE email = '$email' and password = '$password'";
		//$Sql_Query = "UPDATE Client SET email='aaaa' WHERE id = '$id'";
		

		if(mysqli_query($conn, $Sql_Query))
			{
			$json['success'] = ' Welcome ';
				echo json_encode($json);
			 echo 'Record Deleted Successfully';
			}
		else
			{
			 echo 'Something went wrong';
			 }
 mysqli_close($conn);
?>
