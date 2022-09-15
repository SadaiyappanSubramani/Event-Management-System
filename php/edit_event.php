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
    			<!-- generate menu -->
	    		<?php	include("./common_menu.php");	?>
    		</div>

    		<div class="content">
				<div class="left_column">
						<!--
						<h3>Left Column Content</h3>
						-->
				</div>

				<div class="right_combined_column">
					<div class="middle_column">
						<div class="page_title">
								<span class="page_label">Edit Event</span><br><br>
						</div>

						<?php
							$event_query = "SELECT * FROM event where EventID = '$event_id'";
							// code to execute the query on the database
		     				$event_result = mysql_query($event_query);

		     				// while there is a row returned
							while($event_row = mysql_fetch_assoc($event_result)) {
		     					// put the values of he row in the variavles
		     					$event_name = $event_row['EventName'];
								$event_date = $event_row['EventDate'];
								$event_type = $event_row['Type'];
								$event_location = $event_row['Location'];
								$event_status = $event_row['EventStatus'];
								$event_fees = $event_row['Fees'];
								$event_id = $event_row['EventID'];
								$event_description = $event_row['Description'];
								$event_startTime = $event_row['StartTime'];
								$event_ageRestriction = $event_row['AgeRestrictionYears'];
								$event_equipmentURL = $event_row['EquipmentURL'];
								$event_guidelineURL = $event_row['GuidelineURL'];
								$event_photoURL = $event_row['PhotoURL'];
								$event_duration = $event_row['DurationHours'];

								// start a form for displaying and editing	an event's values
								echo "<form id='edit_event_form' method='POST' action='./save_edit_event.php'>";
								// fieldset
								echo " <fieldset class='question'>";
								echo "<legend class='question_label''>Event Details</legend> ";

								// hidden event id
								echo "<input type='hidden' value='$event_id' name='event_id'>";
								// event name
								echo "<label for='event_name' > Event Name: </label>";
								echo "<input type='text' id='event_name' name='event_name' class='wide' value = '$event_name'>";
								echo " <br /> <br />";
								// event description
								echo "<label for='event_desc' > Event Description: </label>";
								echo "<textarea cols='40' rows='4' id='event_desc' name='event_desc'>$event_description</textarea>";
								echo " <br /> <br />";
								// event date
								echo "<label for='event_date' > Event Date:</label>";
								echo "<input type='text' id='event_date' name='event_date' class='wide' value = '$event_date'>";
								echo " <br /> <br />";
								// event location
								echo "<label for='event_location' > Location:</label>";
								echo "<input type='text' id='event_location' name='event_location' class='wide' value = '$event_location'>";
								echo " <br /> <br />";
								// event startTime
								echo "<label for='event_time' > Time:</label>";
								echo "<input type='text' id='event_time' name='event_time' class='wide' value = '$event_startTime'>";
								echo " <br /> <br />";
								// event duration
								echo "<label for='event_duration' > Time (hours):</label>";
								echo "<input type='text' id='event_duration' name='event_duration' class='wide' value = '$event_duration'>";
								echo " <br /> <br />";
								// age restriction
								echo "<label for='event_ageRestrict' > Age Restriction:</label>";
								echo "<input type='text' id='event_ageRestrict' name='event_ageRestrict' class='wide' value = '$event_ageRestriction'>";
								echo " <br /> <br />";

								// event status
								echo "<label for='event_status' > Event Status:</label>";
								echo "<select name='event_status' id='event_status'>";
								echo "<option value='Open'>Open</option>";
								echo "<option value='Closed'>Closed</option>";
								echo "</select";

								echo " <br /> <br />";
								echo " <br /> <br />";
								// buttons for Export and Archive
								echo "<button type='button' name='exportBtn' id='exportBtn'>Export Data</button>";
								echo "<button type='button' name='archiveBtn' id='archiveBtn'>Archive Data</button>";
								echo " <br /> <br />";

								echo "</fieldset>";

								echo "<input type='submit' name='saveCancel' value='Save Changes'>";
								echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								echo "<input type='submit' name='saveCancel' value='Cancel'>";

								echo "</form>";
							}
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