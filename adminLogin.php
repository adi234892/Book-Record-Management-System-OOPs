<?php
include "database.php";
session_start();
if(isset($_SESSION['uid']))
		header('location:http://localhost/BRM_OOPS/adminPanel.php');
class adminLogin extends database
{
	public function admin()
	{	
		$user = $_POST['user'];
		$password = $_POST['Password'];
		$q = "select * from admin where user='$user' and password='$password'";
		$result = $this->con->query($q);
		$num = $result->num_rows;
		$row = $result->fetch_assoc();
		if($num<1)
		{?>
			<script>
				alert("please enter valid user Name and password");
			</script>
			<?php
			//header('Location:http://localhost/BRM_OOPS/updateForm.php');

		}
		else
		{	
			
			$_SESSION['uid'] = $row['id'];
			header('location:http://localhost/BRM_OOPS/adminPanel.php');

		}
	}

}
$ad = new adminLogin;
if(isset($_POST['submit']))
	$ad->admin();
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
  <link rel="stylesheet" type="text/css" href="CSS/adminLogin.css">
</head>
<body>
	<div id="admin">
		<form action="adminLogin.php" method="post">
          <table align="center"; style="position:relative; top:280px;">
            <tr>
              <th><label style="color:#144182;">User Name :</label></th>
			  <td><input type="input" name="user" autofocus required></td><br>
            </tr>
            <tr>
			 <th><label  style="color:#144182;">Password :</label></th>
              <td><input type="Password" name="Password" required></td></tr>
		     <tr>
               <th><input class="btn" type="submit" name="submit"></th></tr>  
          </table>
		</form>
	</div>
</body>
</html>