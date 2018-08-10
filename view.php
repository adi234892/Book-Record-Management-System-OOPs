<?php
include "database.php";
/**
 * 
 */
class view extends database
{
	public $result;
	public $num;
	public function query()
	{
		$q = "select * from book";
		$this->result = $this->con->query($q);
		$this->num = $this->result->num_rows;
		$this->con->close();
	}
}
$que = new view;
$que->query();
?>
<html>
<head>
 <title>View Book Record</title>
  <link rel="stylesheet" type="text/css" href="CSS/updateForm.css">
 <style>
   body{
      background-image: url(http://localhost/BRM_OOPS/IMAGES/view.jpg);
  background-size: cover;
   }
   #heading
   {
      color: #CCFFCC;
      border: solid #CCFFCC;
   }
   td,tr
   {
      border-color: #CCFFCC;
   }
   table
   {
     border-color: #CCFFCC;
   }
 </style>
 </head>
 <body>
 <h1 id="heading">Book Record Management</h1>
  <table border="solid" cellspacing="0px" callpadding="5px">
  <tr>
  <th>Bookid</th>
  <th>Title</th>
  <th>Price</th>
  <th>Author</th>
  </tr>
  <?php
  for($i=1;$i<=$que->num;$i++)
  {
	
	$row=mysqli_fetch_array($que->result);
	?>
	<tr>
  <td> <?php echo $row['id'];?></td>
  <td> <?php echo $row['title'];?></td>
  <td> <?php echo $row['price'];?></td>
  <td> <?php echo $row['author'];?></td>
  </tr>
  <?php
  }
  ?>
  </table>
   
  </body>
  </html>