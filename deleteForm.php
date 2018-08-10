<?php
            session_start();
			if (!isset($_SESSION['uid'])) 
			{
              header('location:http://localhost/BRM_OOPS/adminLogin.php');
			}


include 'database.php';
class query extends database
{ public $num;
  public $result;
  public function fetchBook()
  {
    $q = "select * from book";
    $this->result = $this->con->query($q);
    $this->num = $this->result->num_rows;
    $this->con->close();
  }
}
$que = new query;
$que->fetchBook(); 
?>
<html>
<head>
 <title>Delete Book Record</title>
 <link rel="stylesheet" type="text/css" href="CSS/deleteForm.css">
 <style>

 </style>
 </head>
 <body>
 <h1 id="heading">Book Record Management</h1>
  <form action="deletion.php" method="post">
    <table border="solid" cellspacing="0px"  id="viewTable">
    <tr>
    <th>Bookid</th>
    <th>Title</th>
    <th>Price</th>
    <th>Author</th>
    <th>Select To Delete</th>
    </tr>
    <?php
    for($i=1;$i<=$que->num;$i++)
    {

      $row=$que->result->fetch_assoc();
      ?>
      <tr>
    <td> <?php echo $row['id'];?></td>
    <td> <?php echo $row['title'];?></td>
    <td> <?php echo $row['price'];?></td>
    <td> <?php echo $row['author'];?></td>
    <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="b<?php echo $i; ?>"/></td>
    </tr>
    <?php
    }
    ?>

    </table>
    <input id="sub" type="submit"  value="Delete">
  </form>
  <a id="logout"  href="logout.php">Logout</a>
    <?php
      if(isset($_GET['message'])){
        $msg = $_GET['message'];
        echo  "<h2 style='margin-left:50px; color:#ffb400;';>".$_GET['message']."</h2>";
      }
    ?>
  </body>
</html>