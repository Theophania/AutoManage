<?php
$conn = mysqli_connect('localhost','tiana','5297@Rsa','auto'); 
$output = '';
if(isset($_POST["query"]))
{

	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM masina 
	WHERE Model LIKE '%".$search."%'
	OR Engine LIKE '%".$search."%' 
	OR Power LIKE '%".$search."%' 
	OR Fuel LIKE '%".$search."%' 
	OR Price LIKE '%".$search."%'
	OR Color LIKE '%".$search."%'
	OR Age LIKE '%".$search."%'
	OR History LIKE '%".$search."%'
	";

}
else
{
	$query = "
	SELECT * FROM masina ORDER BY Model";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Model</th>
							<th>Engine</th>
							<th>Power</th>
							<th>Fuel</th>
							<th>Color</th>
							<th>Age</th>
							<th>History</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["Model"].'</td>
				<td>'.$row["Engine"].'</td>
				<td>'.$row["Power"].'</td>
				<td>'.$row["Fuel"].'</td>
				<td>'.$row["Color"].'</td>
				<td>'.$row["Age"].'</td>
				<td>'.$row["History"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>