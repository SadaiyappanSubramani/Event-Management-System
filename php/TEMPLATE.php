<!-- This page is a template for creating new pages
	for SCOUTS Waikato Event Management system-->

<?php
	require_once("./start_session.php");

	/* The below code logic is to be enable to restrict access to
	 * any page that is used for admin activities
	 *
	 *
	if (!$logged_in){
		header('Location: ./admin_login.php');
	}
	 * */

?>



<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Event Management System</title>
        <link href="../css/styles_new.css" rel="stylesheet" type="text/css">

	</head>

	<body>

		<div class="container">

    		<div class="header">
    			<!-- generate header -->
    				<?php	include("./page_header.php");	?>
    		</div>

    		<div class="menu_bar">
    			<!-- generate menu bar -->
	    		<?php	include("./common_menu.php");	?>
    		</div>

    		<div class="content">
				<div class="left_column">
						<!--
						<h3>Left Column Content</h3>
						-->
				</div>

				<div class="right_combined_column">
					<div class="middle_column margin_left">
						<div class="page_title">
								<span class="page_label">ADD PAGE TITLE</span><br><br>
						</div>

						<!--ADD STUFF HERE -->

				    </div>

				    <div class="right_column">
						<!--
						<h3>Right Column Content</h3>
						-->
					</div>
				</div>

				<div class="footer">
					<!-- generate footer -->
					<?php	include("./page_footer.php");	?>
		    	</div>
			</div>
		</div>
	</body>
</html>