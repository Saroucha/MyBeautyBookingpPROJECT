<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['name'])) {
		$update_field.= "name='".$input['name']."'";
		} else if(isset($input['gender'])) {
		$update_field.= "gender='".$input['gender']."'";
		} else if(isset($input['address'])) {
		$update_field.= "address='".$input['address']."'";
		} else if(isset($input['annee'])) {
		$update_field.= "annee='".$input['annee']."'";
		} else if(isset($input['Password'])) {
		$update_field.= "Password='".$input['Password']."'";
		}
	if($update_field && $input['id']) {
		$sql_query = "UPDATE developers SET $update_field WHERE id='" . $input['id'] . "'";	
		echo "test".$sql_query;
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));		
	}
}


