<?php
			session_start();
			if (!isset($_SESSION['uid'])) 
			{
              header('location:http://localhost/BRM_OOPS/adminLogin.php');
			}	
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Insertion Form</title>
   <link rel="stylesheet" type="text/css" href="CSS/insertForm.css">
  </head>
  <body>
   <h1 id="heading">Book Record Management</h1>
   
   <form action="insertion.php" method="post">
	 <table>
	  <tr>
      <th class="insert">Title</th>
      <td><input class="insert" type="text" name="title" required/><td>
	  </tr>
	  <tr>
	  <th class="insert">Price</th>
	  <td><input class="insert" type="text" name="price" required/></td>
	  </tr>
	  <tr>
	  <th class="insert">Author</th>
	  <td><input class="insert" type="text" name="author" /></td>
	  </tr>
	  <tr>
	  <th></th>
	  <td><input id="sub" type="submit" name="submit" value="Insert"/></td>
	  </tr>
     </table>
   </form>
   <div>
   	<a id="logout" href="logout.php">Logout</a>
   </div>
    <?php
      if(isset($_GET['message'])){
        $msg = $_GET['message'];
        echo  "<h2 style='position:relative; top:200px;
        left:45%; color:#ffb400;'>".$_GET['message']."</h2>";
      }
    ?>
   </body>
</html>