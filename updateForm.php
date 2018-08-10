<?php

			session_start();
			if (!isset($_SESSION['uid'])) 
			{
              header('location:http://localhost/BRM_OOPS/adminLogin.php');
			}	

include 'database.php';
class updateForm extends database
{
  public $num;
  public $result;
  public function update()
  {
    $q = "select * from book";
    $this->result = $this->con->query($q);
    $this->num = $this->result->num_rows;
    $this->con->close();
  } 
}
$up = new updateForm;
$up->update();
?>
<html>
<head>
 <title>Update Book Record</title>
  <link rel="stylesheet" type="text/css" href="CSS/updateForm.css">
  <script>
     function call()
     {
       message();
       alert("h");
     }
   </script>
 </head>
 <body>
 <h1 id="heading">Book Record Management</h1>
 <form action="updation.php" method="post">
    <table  cellspacing="0px" border="solid" id="viewTable">
    <tr>
    <th>Bookid</th>
    <th>Title</th>
    <th>Price</th>
    <th>Author</th>
    </tr>
    <?php
    for($i=1;$i<=$up->num;$i++)
    {

      $row=mysqli_fetch_array($up->result);
      ?>
      <tr>
    <td> <?php echo $row['id'];?><input type="hidden"  name="bookid<?php echo $i;?>" value="<?php echo $row['id'];?>"/></td>
    <td><input type="text" name="title<?php echo $i; ?>" value="<?php echo $row['title'];?>"/></td>
    <td><input type="text" name="price<?php echo $i; ?>" value="<?php echo $row['price'];?>"/></td>
    <td><input type="text" name="author<?php echo $i; ?>" value="<?php echo $row['author'];?>"/></td>
    </tr>
    <?php
    }
    ?>
    </table>
    <input id="sub" type="submit" name="sub" onclick="" value="Update"/>
   
  </form>
    <a id="logout"  href="logout.php">Logout</a>
   <?php
      if(isset($_GET['message'])){
        $msg = $_GET['message'];
        echo  "<h2 style='margin-left:50px';>".$_GET['message']."</h2>";
      }
    ?>
      
   
  </body>
  </html>
 