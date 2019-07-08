<?php 
include_once("db_connect.php");
include("header.php"); 
?>
<title>Administration</title>
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<?php include('container.php');?>
<div class="container home" style="margin-top:5%;">	
	<h2 style="text-align:center;">Liste des utilisateurs (Admins)</h2>		 
	<table id="data_table" class="table table-striped">
		<thead>
			<tr>
			<th>Id</th>
<th>Name</th>
<th>Gender</th>
<th>Année de modification</th>
<th>Password</th>
<th>Email</th>
				
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql_query = "SELECT id, name, gender, address, Password, annee FROM developers LIMIT 10";
			$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
			while( $developer = mysqli_fetch_assoc($resultset) ) {
			?>
			   <tr id="<?php echo $developer ['id']; ?>">
			   <td><?php echo $developer ['id']; ?></td>
<td><?php echo $developer ['name']; ?></td>
<td><?php echo $developer ['gender']; ?></td>
<td><?php echo $developer ['annee']; ?></td>
<td><?php echo $developer ['Password']; ?></td>
<td><?php echo $developer ['address']; ?></td>
			   </tr>
			<?php } ?>
		</tbody>
    </table>	

</div>
<script type="text/javascript" src="custom_table_edit.js"></script>
<?php include('footer.php');?>
 



                                                                                                       