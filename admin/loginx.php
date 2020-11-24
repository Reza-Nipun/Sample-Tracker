<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="login-inner">
<?php
EOD;
$msg = $_GET['msg'];  //GET the message
if($msg!='') echo '<p>'.$msg.'</p>'; //If message is set echo it

echo $login_form;
?>    
    <form action="check_login.php" method="post">
    
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input name="username" class="login-inp" type="text" id="username" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" class="login-inp" name="password" id="password" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input name="Submit" type="submit" class="submit-login" value="Submit"  /> 
			  </td>
		</tr>
		</table>
        </form>
	</div>
</body>
</html>