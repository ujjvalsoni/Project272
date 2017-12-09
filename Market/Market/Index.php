<?php
/*
session_start();
if(!isset($_SESSION['access_token'])){
header('location: login.php');
exit();
}
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Market Place!</title>
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
<?php include 'connection.php'; ?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><strong>BC</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Signup</a></li>

                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="well well-lg offer-box text-center">


                    Welcome to the MARKET PLACE!                
              
               
                </div>
                <div class="main box-border">
                    <div id="mi-slider" class="mi-slider">
                        <?php



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
            <li><a href="<?php echo "card/product.php?name=" .$row["pid"] ?>">
            <img src="assets/img/<?php echo $row["pimg"] ?>" alt="img05"><h4><?php echo $row["pname"] ?></h4>
            </a></li>
			<?php
			$var++;
			if($var>3 )
			{
				break;	
			}
			?>
                       
		<?php
    }
	$sid++;
} else {
    //echo "No results for user '$sid'";
	$sid++;
}

?>
</ul>
<?php } ?>
                        <nav>
                            <a href="#">Coffee</a>
                            <a href="#">Accessories</a>
                            <a href="#">Watches</a>
                            <a href="#">Bags</a>
                            <a href="#">Bags</a>
                        </nav>
                    </div>
                    
                </div>
                <br />
            </div>
            <!-- /.col -->
            
                
            <div class="col-md-3 text-center">
                <div class=" col-md-12 col-sm-6 col-xs-6">
                    <div class="thumbnail product-box">
                        <div class="caption">
                          <p>Original Websites</p>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                
                    <a href="#" class="list-group-item active">Click for more!
                    </a>
                    <ul class="list-group">

                        <a href = "//www.sannisthsoni.com/lab272/home.php"> <li class="list-group-item">Soni's Cafe</li></a>
                        <a href = "//Tintinvu.com"> <li class="list-group-item">Tin's Cell Phone Shop</li></a>
                        <a href = "//projectmilind.com"> <li class="list-group-item">Adventure Junkies Club</li></a>
                        <a href = "//Phatsweb.com"> <li class="list-group-item">PT Travel</li></a>
                        <a href = "//mandipsinh.000webhostapp.com"> <li class="list-group-item">KiriMaan-Software Consultancy</li></a>
                        <a href = "//ujjvalsoni.com"> <li class="list-group-item">Coffee - Better than Starbucks!</li></a>

                       
                    </ul>
                </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Top 5!!! 
                    </a>
                    <ul class="list-group">						
						<?php
						
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
		//echo "$key";
		$result = mysqli_query($conn ,"SELECT pname FROM products WHERE pid=$key");        
        while($row = mysqli_fetch_array($result))
        {
           
		   ?>
		  <a href = "<?php echo "card/product.php?name=" .$key ?>"> <li class="list-group-item"><?php echo $row['pname']; ?> 
      					<span class="label label-primary pull-right"><?php echo round($value);?>/5</span>
           </li></a>
		   <?php
        }
    }
?>  
                    </ul>
                </div>

				<?php
				//individual websites top 5
				
				    for ($x = 1; $x <= 3 ; $x++)

    {
		?>
					
					<div>
                    <a href="#" class="list-group-item active">Website - <?php echo $x; ?> Top 5!
                    </a>
                    <ul class="list-group">
					<?php
					
        $result = mysqli_query($conn ,"SELECT pid,AVG(rating) ar FROM ratings where pid IN (SELECT pid FROM products 
        WHERE sid=$x) GROUP BY pid ORDER BY ar DESC") or die(mysql_error());

        while($row = mysqli_fetch_array($result))
        {
            $allids[$row[0]] = $row[1];
        }
        
		$topfivei = array_slice($allids , 0 ,5 ,true); 
        //echo "Product array: <br>";
        foreach ($topfivei as $key => $value)
        {
            //echo "{$key} = {$value}";
			$result = mysqli_query($conn ,"SELECT pname FROM products WHERE pid=$key");        
			while($row = mysqli_fetch_array($result))
			{
			   //echo $row['pname'];
			   ?>


                        <a href = "<?php echo "card/product.php?name=" .$key ?>"><li class="list-group-item"><?php echo $row['pname']; ?>
      					<span class="label label-primary pull-right"><?php echo round($value); ?>/5</span>
                        </li></a>
                       
             
			   <?php
			}
			}

        unset($topfivei); 
		unset($allids); 
		
				?>
					
					       </ul>
					</div>
					<?php
    }
				
					
				
				?>
                               
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Sort Products &nbsp;
      <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <?php

					$var = "";

					$sql = "SELECT * FROM products";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							?>
							
									<div class="col-md-4 text-center col-sm-6 col-xs-6">
											<div class="thumbnail product-box">
												<img src="assets/img/<?php echo $row["pimg"] ?>" alt="" style="width:166px;height:162px;"/>
												<div class="caption">
													<h3><a href="<?php echo "card/product.php?name=" .$row["pid"] ?>"><?php echo $row["pname"] ?></a></h3>
													<p>Price : <strong>$<?php echo $row["pprice"] ?></strong>  </p>
													<p>No. of Products remaining: <?php echo $row["pavail"] ?>  </p>
													<p>Details: <?php echo $row["pdesc"] ?>  </p>
													<p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="<?php echo "card/product.php?name=" .$row["pid"] ?>" class="btn btn-primary" role="button">See Details</a></p>
												</div>
											</div>
									</div>
									<?php
						}
					} else {
						echo "0 results";
					}
					?>

                </div>
                <!-- /.row -->
                
                <!-- /.row -->
                
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        
                        <div class="btn-group">
                           
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    

    <!--Footer -->
    <div class="col-md-12 footer-box">


        
        <div class="row">
            <div class="col-md-4">
                <strong>Send a Quick Query </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Our Location</strong>
                <hr>
                <p>
                     1 Washington Sq,<br />
                     San Jose, CA 95192<br />
                     Call: +1 (999) 999 9999<br>
                    Email: coolgroup@cmpe272.com<br>
                </p>
            </div>
            <div class="col-md-4 social-box">
                <strong>We are Social </strong>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="assets/ItemSlider/js/jquery.catslider.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
</body>
</html>
