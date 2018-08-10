<?php
			session_start();
			if (!isset($_SESSION['uid'])) 
			{
              header('location:http://localhost/BRM_OOPS/adminLogin.php');
			}	
?>
<html>
	<head>
		<title>Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="CSS/adminPanel.css">
	</head>
	<body>
		<div>
			<div>
				<a class="anchor" href="insertForm.php">Insert Form</a>
				<a class="anchor" href="updateForm.php">Update Form</a>
				<a class="anchor" href="deleteForm.php">Delete Form</a>
				<a id="logout" href="logout.php">Logout</a>
			</div>
		</div>
	</body>
</html>