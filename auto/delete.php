<?php 

$conn = mysqli_connect('localhost','tiana','5297@Rsa','auto'); 

	$Model = $_POST['Model'];
	$Engine = $_POST['Engine'];
	$Power = $_POST['Power'];
	$Fuel = $_POST['Fuel'];
	$Price = $_POST['Price'];
	$Color = $_POST['Color'];
	$Age = $_POST['Age'];
	$History = $_POST['History'];


	$sql = "DELETE FROM masina WHERE Model = '".$_POST["Model"]."' "; 

	if(mysqli_query($conn, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>


