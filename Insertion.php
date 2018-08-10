<?php
include "database.php";

class insert extends database
{
	
	public $status;


	public function insertForm()
	{	
		  $title=$_POST['title'];
		  $price=$_POST['price'];
		  $author=$_POST['author'];
	 	$q="insert into book (title,price,author) values('$title',$price,'$author')";
	 	$this->status=$this->con->query($q);
	 	$this->con->close();
	}
}



$in = new insert;
if(isset($_POST["submit"]))
{
	$in->insertForm();
	echo $_POST["submit"];
}
 ?>
 <?php 
	if($in->status==1)
		header('location:http://localhost/BRM_OOPS/insertForm.php?message=Record Inserted');
	else
		header('location:http://localhost/BRM_OOPS/insertForm.php?message=Insertion Failed');
	?>