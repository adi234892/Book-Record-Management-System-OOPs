<?php
include "database.php";
class updation extends database
{
	
	private $size;
	public $records;
	public $status;
	public function update()
	{	
		 $size = sizeof($_POST);
		 $records = $size/4;
		for($i=1; $i<=$records;$i++)
		{
			$index1="bookid".$i;
			$bookid[$i]=$_POST[$index1];
			
			$index2="title".$i;
			$title[$i]=$_POST[$index2];
			
			$index3="price".$i;
		    $price[$i]=$_POST[$index3];
			
			$index4="author".$i;
			$author[$i]=$_POST[$index4];
		}
		for ($k=1; $k<=$records;$k++)
		{
			$q = "update book set title='$title[$k]',price=$price[$k],author='$author[$k]' where id=$bookid[$k]";
			$this->status = $this->con->query($q); 
		}
      //session_start();
      //  $_SESSION['status'] = $this->status;
		$this->con->close();
	}
}
$up = new updation;
$up->update();
?>
<?php 
if($up->status){   
  header('location:http://localhost/BRM_OOPS/updateForm.php?message=Successfully Updated ');
                
}
else
{
  header('location:http://localhost/BRM_OOPS/updateForm.php?message=Error ');
                
}
?>