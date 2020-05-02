<?php  
$conn = mysqli_connect('localhost','tiana','5297@Rsa','auto');  
 $output = '';  
 $sql = "SELECT * FROM masina ORDER BY Price DESC";  
 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Model</th>  
                     <th width="40%">Engine</th>  
                     <th width="40%">Power</th>  
                     <th width="10%">Fuel</th>
                     <th width="40%">Price</th>    
                     <th width="10%">Color</th>  
                     <th width="40%">Age</th> 
                     <th width="10%">History</th>   
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM masina LIMIT $delete_records";
		  mysqli_query($conn, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["Model"].'</td>  
                     <td class="Engine" data-id1="'.$row["Model"].'" contenteditable>'.$row["Engine"].'</td>  
                     <td class="Power" data-id2="'.$row["Model"].'" contenteditable>'.$row["Power"].'</td>
                     <td class="Fuel" data-id3="'.$row["Model"].'" contenteditable>'.$row["Fuel"].'</td>
                     <td class="Price" data-id4="'.$row["Model"].'" contenteditable>'.$row["Price"].'</td>
                     <td class="Color" data-id5="'.$row["Model"].'" contenteditable>'.$row["Color"].'</td>
                     <td class="Age" data-id6="'.$row["Model"].'" contenteditable>'.$row["Age"].'</td>
                     <td class="History" data-id7="'.$row["Model"].'" contenteditable>'.$row["History"].'</td>

                     <td><button type="button" name="delete_btn"data-id8="'.$row["Model"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="Model" contenteditable> </td> 
                <td id="Engine" contenteditable> </td>    
                <td id="Power" contenteditable></td>  
                <td id="Fuel" contenteditable></td>  
                <td id="Price" contenteditable></td>  
                <td id="Color" contenteditable></td>  
                <td id="Age" contenteditable></td>  
                <td id="History" contenteditable></td>  

                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td id="Model" contenteditable> </td> 
          <td id="Engine" contenteditable> </td> 
          <td id="Power" contenteditable></td>  
          <td id="Fuel" contenteditable></td>  
          <td id="Price" contenteditable></td>  
          <td id="Color" contenteditable></td>  
          <td id="Age" contenteditable></td>  
          <td id="History" contenteditable></td>  
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>