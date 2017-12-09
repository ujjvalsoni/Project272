<?php 
include 'connection.php';

   $result = mysqli_query($conn ,"SELECT pid FROM products ORDER BY pid DESC LIMIT 1;");        
        while($row = mysqli_fetch_array($result))
        {
			$total_rows = $row[0];
        }
		
    for ($x = 1; $x <= $total_rows ; $x++)
    {
        $result = mysqli_query($conn ,"SELECT AVG(rating) FROM ratings WHERE pid=$x") or die(mysql_error());        
        while($row = mysqli_fetch_array($result))
        {
            if (empty($row['AVG(rating)'])) {
				$data[$x] = 0;
			}
			else{
			$data[$x] = $row['AVG(rating)'];
			}
        }
    
    }
    //print_r($data);
	arsort($data);
	
    
    $topfive = array_slice($data, 0, 5, true);
    
    foreach ($topfive as $key => $value)
    {
		
		$result = mysqli_query($conn ,"SELECT pname FROM products WHERE pid=$key");        
        while($row = mysqli_fetch_array($result))
        {
           //echo $row['pname'];
        }
		
        echo "{$key} = {$value}";
        echo "<br>";
    }

	
?>