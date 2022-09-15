<?php
	session_start();
	
   $logged_in = FALSE;
   $username = "";

   if(isset($_SESSION['logged_in'])) {
      $logged_in = TRUE;
      $username = $_SESSION['user'];
   }
	
?>