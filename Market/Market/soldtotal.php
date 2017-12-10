<?php 
include 'connection.php';
    
    $result = mysqli_query($conn ,"SELECT pid, soldnum FROM products ORDER BY soldnum DESC") or die(mysql_error());
        
        while($row = mysqli_fetch_array($result))
        {
            $list[$row[0]] = $row[1];
            echo "The total sales for product " .$row[0]. " is ".$row[1];
            echo "<br>";
        }
    
    $topfivea = array_slice($list, 0, 5, true);
    
    foreach ($topfivea as $key => $value)
    {
        echo "{$key} = {$value}";
        echo "<br>";
    }
	
?>