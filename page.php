<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db = "petshopdb";
	$conn = mysql_connect($servername, $username, $password);
	mysql_select_db('petshopdb', $conn);
?>



<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>petshop</title>  
  <link rel="stylesheet" href="page.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>


<div class="header">
  <a href="index.php" class="name">Petshop.com</a>
  <div class="header-right">
    <a href="index.php">Login</a>
    <a  class="active" href="#contact">Shop</a>
    <a href="#about">About</a>
  </div>
</div>

<form class="choose"action="page.php" method="get">
<button class="types" type="submit" value="cats" name="cats">Cats</button>
<button class="types" type="submit" value="dogs" name="dogs">Dogs</button>
</form>
<?php

	$type=$_GET['type'];
	if(isset($_GET['type'])) {
		$sql = "SELECT name, price FROM pets WHERE type='$type'";
		$result=mysql_query($sql);
	} 

	elseif (isset($_GET['cats'])) {
		header("Location: page.php?type=cat");
	}
	else
	{
		header("Location: page.php?type=dog");
		exit;
	 }
?>

<div class="wrapper">
<table class="table1">
<?php
         echo "<tr><th>Images</th><th>Names</th><th>Price</th><th>Add to cart</th></tr>";
		while ($row = mysql_fetch_assoc($result)) {
			if($row['name']=='bull dog'){
				$img = "<td><img src='img/bulldog.JPG'></td>";
			}elseif($row['name']=='Bombay cat'){
				$img = "<td><img src='img/bombay cat.jpg'></td>";
			}elseif($row['name']=='german sheapord'){
				$img = "<td><img src='img/german sheapord.jpg'></td>";
			}elseif($row['name']=='pug'){
				$img = "<td><img src='img/pug.jpg'></td>";
			}elseif($row['name']=='Labrador'){
				$img = "<td><img src='img/labrador.jpg'></td>";
			}elseif($row['name']=='siamese'){
				$img = "<td><img src='img/siamese.jpg'></td>";
			}elseif($row['name']=='british shorthair'){
				$img = "<td><img src='img/brit.jpg'></td>";
			}
			elseif($row['name']=='persian'){
				$img = "<td><img src='img/persian.jpg'></td>";
			}
			else{
				$img = "<td>image</td>";
			}
			echo "<tr>". $img ."<td>". $row['name'] ."</td><td>".$row['price'] ." $</td><td><button type='button' class = 'cart'><img src='img/addcart.png'></button></td></tr>";
		}
?>
</table>
</div>
<div class = "sqlquery">
<?php
echo "<div class='queryused'>SQL Query Used : <div class='query'>$sql;</div></div>";
?>
</div>

<footer>
      <div class="credits">
      <ul >
        <li><h3><a href="http://moveforward100.com">Moveforward</a></h3></li>
        <li>SQL injection practice website</li>
        <li>Ethical hacking L1</li>
      </ul>  
    </div>
    </footer>
</body>
</html>
</html>