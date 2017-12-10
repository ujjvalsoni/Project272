<?php 
include 'connection.php';
    for ($x = 1; $x <= 4 ; $x++)
    {
        $result = mysqli_query($conn ,"SELECT pid,soldnum FROM products WHERE sid=$x ORDER BY soldnum DESC") or die(mysql_error());
        
        echo "Seller $x : <br>";
        echo "<table border='1'>
        <tr>
        <th>Product ID</th>
        <th>Total sales</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
            $sales[$row[0]] = $row[1];
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        $salestop = array_slice($sales, 0, 5, true);
        
        echo "Product array: <br>";
        foreach ($salestop as $key => $value)
        {
            echo "{$key} = {$value}";
            echo "<br>";
			$result = mysqli_query($conn ,"SELECT pname FROM products WHERE pid=$key");        
			while($row = mysqli_fetch_array($result))
			{
			  echo $row['pname'];
			}
			
        }
        echo "<br><br>";
        unset ($salestop);
        unset ($sales); 
    }
?>