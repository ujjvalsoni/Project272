<?php
include '..\connection.php';

$rating = $_POST['rating'];
$review = $_POST['review'];
$pid = $_POST['pid'];



$sql = "INSERT INTO ratings (pid, rating, review) VALUES ('$pid', '$rating','$review')";
//include "..\index.php";
Header("Location: ..\index.php");

if( !mysqli_query($conn, $sql))
{
    die ("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
    echo "<script type='text/javascript'>alert('Thank You for Rating and Review');</script>";
}

?>