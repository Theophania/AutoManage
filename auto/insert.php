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


 $sql = "INSERT INTO Masina VALUES('".$_POST["Model"]."', '".$_POST["Engine"]."','".$_POST["Power"]."' ,'".$_POST["Fuel"]."' ,'".$_POST["Price"]."' ,'".$_POST["Color"]."' ,'".$_POST["Age"]."' ,'".$_POST["History"]."'  )";  

 if(mysqli_query($conn, $sql))  
	{  
		echo 'Data Inserted';  
	} 
 
 ?>