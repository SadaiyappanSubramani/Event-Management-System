<!-- admin_login.php redirects the user to this page after successful login-->
<?php
	require_once("./start_session.php");
	require_once("./db.php");

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
					<!-- <h3>Left Column Content</h3>-->
				</div>

				<div class="right_combined_column">
					<div class="middle_column margin_left">
						<div class="page_title">
								<span class="page_label">Admin Main Page</span><br><br>
						</div>
						<div class="create_event_button">
							<a href="./create_event.php"><button type="button">Create Event</button></a>
						</div>

						<div class="admin_event_list_content">

							<ul class="admin_event_list">
								<li class="admin_list_header">
									<div class="admin_event_name">Event Name</div>
									<div class="admin_event_date">Date</div>
									<div class="admin_event_time">Time</div>
									<div class="admin_event_location">Location</div>
									<div class="admin_event_status">Status</div>

								</li>

								<!-- Below content generates an event list from the database/ -->
									<?php
		         						$event_query = "SELECT * FROM `event` LIMIT 20";
		         						$event_result = mysql_query($event_query);

		         						while($event_row = mysql_fetch_assoc($event_result)) {

		         							$event_name = $event_row['EventName'];
											$event_date = $event_row['EventDate'];
											$event_time = explode(":",$event_row['StartTime']);
											$event_location = $event_row['Location'];
											$event_status = $event_row['EventStatus'];
											$event_id = $event_row['EventID'];

											if ($event_time[0] >= 12) $AM_PM = "PM";
											else $AM_PM = "AM";

											echo "<li class='list_content'>";
												echo '<div class="admin_event_name">'. $event_name . '</div>';
												echo '<div class="admin_event_date">'. $event_date . "</div>";
												echo '<div class="admin_event_time">'. $event_time[0] . ":" .$event_time[1]. " ". $AM_PM.'</div>';
												echo '<div class="admin_event_location">'. $event_location . "</div>";
												echo '<div class="admin_event_status">'. $event_status . "</div>";
												echo '<a href="./view_event_details.php?event_id='.$event_id.'"><div class="event_crud">View</div></a>';
												echo '<a href="./edit_event.php?event_id='.$event_id.'"><div class="event_crud">Edit</div></a>';
												echo '<a href="./cancel_event.php?event_id='. $event_id.'"><div class="event_crud">Cancel</div></a>';
												echo '<a href="./approve_event_participants.php?event_id='.$event_id.'"><div class="event_crud">Approve</div></a>';
				            				echo "</li>";
		         						}
		         						mysql_close();
		        					?>
							</ul>

						</div>

				    </div>
				    <div class="right_column">
						<!-- <h3>Right Column Content</h3> -->
					</div>
				</div>

				<div class="footer">
					<!-- generate footer -->
					<?php	include("./page_footer.php");	?>
		    	</div>
			</div>
	</body>
</html>