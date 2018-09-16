<?php  //Start the Session
session_start();
require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
$fmsg="";
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
	$username = $_POST['username'];
	$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
	$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";

	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
	if ($count == 1){
		$_SESSION['username'] = $username;
	}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
		$fmsg = "Invalid Login Credentials.";
	}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
	header('location: welcome.php');
	

}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
}
?>
<html>
<head>
	<title></title>
</head>
<body>

	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<form name="form1" method="post">
				<td>
					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
						<tr>
							<td colspan="3"><strong><?php echo "$fmsg"; ?></strong></td>
						</tr>
						<tr>
							<td colspan="3"><strong>User Login </strong></td>
						</tr>
						<tr>
							<td width="78">Username</td>
							<td width="6">:</td>
							<td width="294"><input name="username" type="text" id="username"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input name="password" type="text" id="password"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Login"></td>
						</tr>
					</table>
				</td>
			</form>
		</tr>
	</table>

</body>
</html>