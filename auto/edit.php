<?php  
	$conn = mysqli_connect('localhost','tiana','5297@Rsa','auto'); 

	$Model = $_POST["Model"];  
	// $Engine = $_POST['Engine'];
	// $Power = $_POST['Power'];
	// $Fuel = $_POST['Fuel'];
	// $Price = $_POST['Price'];
	// $Color = $_POST['Color'];
	// $Age = $_POST['Age'];
	// $History = $_POST['History'];

	$text = $_POST["text"];  
	$column_name = $_POST["column_name"]; 
	$sql = "UPDATE masina SET ".$column_name."='".$text."' WHERE Model='".$Model."'"; 

	if(mysqli_query($conn, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?>