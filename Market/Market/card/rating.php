<?php
include '..\connection.php';

$rating = $_POST['rating'];
$review = $_POST['review'];
$pid = $_POST['pid'];



$sql = "INSERT INTO ratings (pid, rating, review) VALUES ('$pid', '$rating','$review')";

$url = "product.php?name=".$pid;
echo $url;



if( !mysqli_query($conn, $sql))
{
    die ("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
}


Header("Location: $url");

?>