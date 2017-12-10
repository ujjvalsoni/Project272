
<?php

//for descending
$resultd = mysqli_query($conn ,"SELECT pid, pprice FROM products ORDER BY pprice DESC") or die(mysql_error());
while($r1 = mysqli_fetch_array($resultd))
{
    $deslist[$r1[0]] = $r1[1];
    
}

//for ascending
$resulta = mysqli_query($conn ,"SELECT pid, pprice FROM products ORDER BY pprice") or die(mysql_error());
while($r2 = mysqli_fetch_array($resulta))
{
    $asclist[$r2[0]] = $r2[1];
}

//for rating list
$r = mysqli_query($conn ,"SELECT pid FROM products ORDER BY pid DESC LIMIT 1");        
while($row = mysqli_fetch_array($r))
{
    $total_rows = $row[0];
}

for ($x = 1; $x <= $total_rows ; $x++)
{
    $resultrate = mysqli_query($conn ,"SELECT AVG(rating) FROM ratings WHERE pid=$x") or die(mysql_error());        
    while($r3 = mysqli_fetch_array($resultrate))
    {
        if (empty($r3['AVG(rating)'])) {
            $ratelist[$x] = 0;
        }
        else{
            $ratelist[$x] = $r3['AVG(rating)'];
        }
    }

}
arsort($ratelist);

					$var = htmlspecialchars($_GET["name"]);
        //echo 'Product id: ' . htmlspecialchars($_GET["name"]) . '!';
        echo $var;
					include 'connection.php';
                    $v = 3;
					$var = "";
            if ($v == 1)
            {
                foreach ($deslist as $key=>$val)
                {    
					$sql = "SELECT * FROM products where pid=$key";
					$result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
						// output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
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
                    } else 
                    {
						echo "0 results";
                    }
                }
            }
            else if ($v==2)
            {
                foreach ($asclist as $key=>$val)
                {    
					$sql = "SELECT * FROM products where pid=$key";
					$result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
						// output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
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
                    } else 
                    {
						echo "0 results";
                    }
                }        
            }
            else if ($v==3)
            {
                foreach ($ratelist as $key=>$val)

                {    
                    #echo $val."<br>";
                    echo $key."<br>";
					$sql = "SELECT * FROM products where pid=$key";
					$result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
						// output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
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
                    } else 
                    {
						//echo "0 resultsdgjgj";
                    }
                }
            }
?>
