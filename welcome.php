<!DOCTYPE html>

<?php
session_start();
   	if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
	}
?>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo "hello ".$username; ?> 
<br>
<a href="logout.php">logout</a>
</body>
</html>