<?php ?>
<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Product Card</title>
<link rel="stylesheet" href="css/Product_card_style.css">
</head>
<?php
 include '..\connection.php'; 
$pid = htmlspecialchars($_GET["name"]);
					$var = "";

					$sql = "SELECT * FROM products WHERE pid = $pid";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							?>
							
<div class="product">
<div class="header">
<div class="back"></div>
</div>
<div class="main">
<div class="left">
<h2><?php echo $row["pname"] ?></h2>
<h3>$<?php echo $row["pprice"] ?></h3>
<img src="../assets/img/<?php echo $row["pimg"] ?>" alt="" style="width:300px;height:200px;"/>
</div>
<div class="right">
<p><?php echo $row["pdesc"] ?> </p>
<?php $conn->close(); ?>
<?php
include '..\connection.php';

					$sql = "SELECT AVG(rating) from ratings WHICH PID =$pid";
					$result = $conn->query($sql);
					//echo $result;

					if ($result->num_rows > 0) {
						// output data of each row
					while($row = $result->fetch_assoc()) {
						echo $rows;
						
					}
					
					}

?>

<p>
<span class="fa fa-star yellow"></span>
<span class="fa fa-star yellow"></span>
<span class="fa fa-star yellow"></span>
<span class="fa fa-star yellow"></span>
<span class="fa fa-star"></span>
<span>(4.67 - 172 reviews)</span>
</p>
<p class="quantity">QUANTITY <span id="qt">1</span></span></p>
 <form method = "POST" action = "rating.php">

<table>
			<tr>
               <td>Rate This Product:</td>
               <td>
               <input type="hidden" name="pid" value="1" />
               <select name="rating">
  					<option value="1">1 Star</option>
  					<option value="2">2 Star</option>
  					<option value="3">3 Star</option>
  					<option value="4">4 Star</option>
  					<option value="5">5 Star</option>
			   </select>
                  
               </td>
            </tr>
            <tr>
               <td>Write a Review:</td>
               <td> <textarea name = "review" rows = "5" cols = "20"></textarea></td>
            </tr>
            <tr>
               <td>
			   <input type="hidden" name="pid" value="<?php echo $pid;?>"/>
                  <input type = "submit" name = "submit" value = "Submit"> 
               </td>
            </tr>
            </table>
            </form>
</div>
</div>
<div class="footer">

<div class="left">
</div>
<div class="right">
<p>Add to Cart</p>
</div>
</div>
</div>
									<?php
						}
					} else {
						echo "0 results";
					}
					?>
<body>

<script src='http://facebook.github.io/rebound-js/rebound.js'></script>

<script src="js/Product_card_index.js"></script>

</body>
</html>