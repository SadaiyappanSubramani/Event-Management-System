<!-- This page initializes the connection to the database -->

<?php

   $hostname = $_SERVER['HTTP_HOST'];

   	if ($hostname == "webapp.cms.waikato.ac.nz") {
      $sql_server = "mysql.cms.waikato.ac.nz";
      $db_username = "apm19";
      $db_password = "5SBtDsyjsRxqBwhU";
      $db_name = "apm19";
   } else {
   	  // fill these in if you want to run this on your own server
      $sql_server = "localhost";
      $db_username = "root";
      $db_password = "";
      $db_name = "scoutswaikato";
   }


   $mysql = mysql_connect($sql_server, $db_username, $db_password);
   if ($mysql == FALSE) die("Error connecting to the server: ".$sql_server);

   $db = mysql_select_db($db_name);
   if ($db == FALSE) die("Error conecting to the database: ". $db);

?>
