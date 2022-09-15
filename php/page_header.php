<!-- This page generates the main header for the page -->

<?php

	$rootDir = getcwd(); /* function to get the current working directory*/

 	$root_check = strpos($rootDir,"php");  /* check if the directory path has the string php in it*/


	/* generate path for the menu links */
	if ($root_check == FALSE){
		$root_loc = "./";
	}
	else {
		$root_loc = "../";
	}

	echo '<div class="banner">'	;
	echo '<span class="page_title"> <a href="'. $root_loc. 'index.php">Event Management System </a> </span>' ;
	echo '</div>';
?>