<?php 
include 'connection.php';

    for ($x = 1; $x <= 3 ; $x++)
    {
        $result = mysqli_query($conn ,"SELECT pid,AVG(rating) ar FROM ratings where pid IN (SELECT pid FROM products 
        WHERE sid=$x) GROUP BY pid ORDER BY ar DESC") or die(mysql_error());

        while($row = mysqli_fetch_array($result))
        {
            $allids[$row[0]] = $row[1];
        }
        
        //echo "Product array: <br>";
        foreach ($allids as $key => $value)
        {
            //echo "{$key} = {$value}";
			$result = mysqli_query($conn ,"SELECT pname FROM products WHERE pid=$key");        
			while($row = mysqli_fetch_array($result))
			{
			   echo $row['pname'];
			}
			}

        unset($allids); 
    }
?>