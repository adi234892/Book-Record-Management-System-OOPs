<?php
 class database 
 {
 	public $con;
 	public function __construct()
	{ 	 $db_name = 'brm_oops';
		 $db_user = 'root';
		 $db_pass = '';
		 $db_hos = 'localhost';
 		$this->con = new mysqli($db_hos,$db_user,$db_pass,$db_name);
 
 	}
  }
?>