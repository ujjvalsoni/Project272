<html>
<body>
                    <?php
					$var = htmlspecialchars($_GET["name"]);
//echo 'Product id: ' . htmlspecialchars($_GET["name"]) . '!';
echo $var;
					include 'connection.php';
					
					if($var == 1){

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
					}
					?>
						</body>
						</html>