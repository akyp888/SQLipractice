
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset='utf-8'>
   
    <title>petshop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
  

</head>
<body>

<div class="header">
  <a href="index.php" class="name">Petshop.com</a>
  <div class="header-right">
    <a class="active" href="index.php">Login</a>
    <a href="#contact">Shop</a>
    <a href="#about">About</a>
  </div>
</div>


<div class="main">
<div class="container-contact100">
<div class="wrap-contact100">
  <form class="contact100-form validate-form"  action="index.php" method="post">
   
    <div class="wrap-input100 validate-input">
      <input class="input100" type="text" name="un" placeholder="username">
      <span class="focus-input100"></span>
    </div>
    
      <div class="wrap-input100 validate-input">
        <input class="input100" type="text" name="pw" placeholder="password">
        <span class="focus-input100"></span>
      </div>
    <div class="container-contact100-form-btn">
      <button class="contact100-form-btn" type="submit" value="Login" name="Login" >
        <span>
          <i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
          Login
        </span>
      </button>
    </div>
    <div class="container-contact100-form-btn">
        <button class="contact100-form-btn" type="submit" value="Signup" name="Signup"  >
          <span>
            <i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
            Signup
          </span>
        </button>
      </div>
  </form>
</div>
</div>
<?php	
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "root";
$db = "petshopdb";
$conn = mysql_connect($servername, $username, $password);
mysql_select_db('petshopdb', $conn);
  
  if(isset($_POST['Login'])) {
    $un=$_POST['un'];
    $pw=$_POST['pw'];
    $sql="SELECT * FROM users WHERE usernames='$un' and passwords='$pw'";
    $result= mysql_query($sql);
    $count=mysql_num_rows($result);
    if($count>0){
      echo "<div class='inc'>Login successful!</div>";
      echo "<div class='queryused'>SQL Query Used : <div class='query'>SELECT * FROM users WHERE usernames='$un' and passwords='$pw';</div></div>";
      echo "<script>window.open('page.php', '_blank');</script>";
    }
    else{
      echo "<div class='inc'>Incorrect username or password! Try again.</div>";
      echo "<div class='queryused'>SQL Query Used : <div class='query'>SELECT * FROM users WHERE usernames=$un and passwords=$pw;</div></div>";
    }
  }
  elseif($_POST['Signup']){
  $un=$_POST['un'];
	$pw=$_POST['pw'];
  $sql="INSERT INTO users(usernames,passwords) VALUES('$un','$pw')";
  $result= mysql_query($sql);
  echo "<div class='inc'>successfully signed up !</div>";
  echo "<div class='queryused'>SQL Query Used : <div class='query'>INSERT INTO users(usernames,passwords) VALUES('$un','$pw');</div></div>";
  mysql_close($conn);
   }
   
?>


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