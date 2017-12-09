<?php 
include 'connection.php';
$array = [];

    $dummy = mysqli_query($conn, "SELECT * FROM products");
    $total_rows = mysqli_num_rows($dummy);        

    for ($x = 1; $x <= $total_rows ; $x++)
    {
        $count = mysqli_query($conn, "SELECT * FROM ratings WHERE pid=$x");
        $num_rows = mysqli_num_rows($count);
        echo $num_rows;
        echo "<br>";  
        $array[$x] = $num_rows;      
    }
    print_r($array);
	
?>