<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bootstrap E-Commerce Template- DIGI Shop mini</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<div class="row">
<?php

include 'connection.php';

$sid = 1;

while($sid < 7){

$var = 0;

$sql = "SELECT * FROM products WHERE sid = $sid";
$result = $conn->query($sql);

?>
<ul>
<?php

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		?>
            <li><a href="#">
            <img src="assets/img/<?php echo $row["pimg"] ?>" alt="img05"><h4><?php echo $row["pname"] ?></h4>
            </a></li>
			<?php
			$var++;
			if($var>4 )
			{
				break;	
			}
			?>
                       
		<?php
    }
	$sid++;
} else {
    echo "No results for user '$sid'";
	$sid++;
}

?>
</ul>
<?php } ?>
</div>				
<body>
</html>