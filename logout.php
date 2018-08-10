<?php
session_start();
session_destroy();
header('location:http://localhost/BRM_OOPS/Home.php');
?>