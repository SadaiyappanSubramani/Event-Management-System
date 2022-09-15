<!-- This page is a template for creating new pages
	for SCOUTS Waikato Event Management system-->

<?php
	require_once("./start_session.php");
	require_once("./db.php");

	/*
	 * This stores the event_id obtained from the admin_index page when the Edit link is clicked for a row in the table of events
	 * I used the GET method, but yu can replace it with POST as required
	 */
	$event_id = $_GET['event_id'];

	/* The below code logic is to be enable to restrict access to
	 * any page that is used for admin activities
	 */
	if (!$logged_in){
		header('Location: ./admin_login.php');
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Event Management System</title>
        <link href="../css/site.css" rel="stylesheet" type="text/css">
        <link href="../css/admin.css" rel="stylesheet" type="text/css">

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
								<span class="page_label">Edit Event</span><br><br>
						</div>

						<?php
							echo "<form id='cancel_event_form' method='POST' action='./set_event_cancelled.php'>";
							echo " <fieldset class='question'>";
							echo "<legend class='question_label'>Cancel Event:</legend> ";

							echo "<input type='hidden' value='$event_id' name='event_id'>";

							echo "<label > Are you sure you want to cancel the event? </label>";


							echo " <br /> <br />";
							// button for Yes
							echo "<input type='submit' name='cancel' value='Yes'>";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							// button for No
							echo "<input type='submit' name='cancel' value='No'>";

							echo "</fieldset>";
							echo "</form>";

						?>
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
	</body>
</html>