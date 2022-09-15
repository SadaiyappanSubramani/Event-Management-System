<!-- This page generates the menu bar for the site and has to be included
	in every page generated for the site.
	Any changes to the menu bar have to be made in just this single page.
	 -->

<?php
		$rootDir = getcwd(); /* function to get the current working directory*/

	 	$php_check = strpos($rootDir,"php");  /* check if the directory path has the string php in it*/


		/* generate path for the menu links */
		if ($php_check == FALSE){
			$php_loc = "./php/";
		}
		else {
			$php_loc = "./";
		}

	 /* generate menu bar list */
	 	echo "<ul>";
	 		echo '<div class="nav">';
				echo '<li><a href="/Online_event/index.php">Home</a></li>';
				echo '<li><a href="' . $php_loc . 'view_registered_events.php">View Registered Events</a></li>';
				echo '<li><a href="' . $php_loc . 'about_us.php">About Us</a></li>';
				if ($logged_in) {
					echo '<li><a href="' . $php_loc . 'admin_index.php">Admin</a></li>';
					echo '<li><a href="' . $php_loc . 'admin_logout.php">Logout</a></li>';
				}
				else
					echo '<li><a href="' . $php_loc . 'admin_login.php">Admin Login</a></li>';
			echo "</div>";
		echo "</ul>";

?>
