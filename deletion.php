<?php
include "database.php";
class deletion extends database
{
 	public function delete(){
	   $size = sizeof($_POST);
	   $j=1;
	   if (!$size==0) 
	   {
		for($i=1;$i<=$size;$i++,$j++)
		{
			$index="b".$j;
			if (isset($_POST[$index])) {
				$b_id[$i] = $_POST[$index];
			}
			else
				$i--;
		}
		for ($k=1; $k<=$size; $k++) { 
			 $q="delete from book where id=".$b_id[$k];
			 $status = $this->con->query($q);
		}
		$this->con->close();
	?>
	<?php 
		    if($status)
			    header('location:http://localhost/BRM_OOPS/deleteForm.php?message=Successfully Deleted');
	 
	        else
	            header('location:http://localhost/BRM_OOPS/deleteForm.php?message=Error');
	 	}

		else
		{
	     header('location:http://localhost/BRM_OOPS/deleteForm.php?message=Please select a value');
		}
	}
}
$del = new deletion;
	$del->delete();
?>