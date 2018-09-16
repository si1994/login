<!DOCTYPE html>

<?php
require('connect.php');
$fmsg=""
if(isset($_POST['submit'])){
    $query = "INSERT INTO user (username, password)
    VALUES ('".$_POST["username"]."','".$_POST["password"]."')";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	//$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($result){
      $fmsg = "insert recode successfully.";
  }else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
      $fmsg = "Invalid Login Credentials.";
  }   
}

?>

<html>
<head>
	<title></title>
</head>
<body>
    <table align="center">
       <form method="post"> 
        <tr>
            <td><strong><?php echo "$fmsg"; ?></strong></td>
        </tr>
        
        <tr>
         <td>

            <label id="first">username</label><br/>
            <input type="text" name="username"><br/>
        </td>
    </tr>
    <tr><td>
        <label id="first">Password</label><br/>
        <input type="password" name="password"><br/>
    </td>
</tr>
<tr>
	<td>
        <button type="submit" name="submit">register user</button>
    </td>
</tr>
</form>
</table>
</body>
</html>