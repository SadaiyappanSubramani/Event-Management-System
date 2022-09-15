<!-- This page displays the registered events for SCOUTS Id submitted
	through view_registered_events.php
	-->

<?php
	require_once("./start_session.php");
	require_once("./db.php");
	$scoutid = $_POST['scout_id'];
	$email = $_POST['email'];
?>

<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Event Management System</title>
        <link href="../css/site.css" rel="stylesheet" type="text/css">
        <link href="../css/member.css" rel="stylesheet" type="text/css">

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
					<div class="middle_column margin_left">
						<div class="page_title">
								<span class="page_label">View Event Registration Status</span><br><br>
								You are registered for the below events.
						</div>
						<br />

						<table class="show_registered_event_list">
							<thead>
								<tr>
									<th>User ID</th>
									<th>Event Name</th>
									<th>Date</th>
									<th>Registration Status</th>
									<th>Role</th>
									<th>Event Status</th>
								</tr>
							</thead>
							<tbody>
								<?php


									$registration_query = "SELECT `RegistrationStatus`,`EventID`,`Role` FROM `registration` WHERE `ScoutID` = '$scoutid'";
		     						$registration_result = mysql_query($registration_query);

									$registration_row = mysql_fetch_assoc($registration_result);

									$registration_status = $registration_row['RegistrationStatus'];
									$event_id = $registration_row['EventID'];
									$role = $registration_row['Role'];


		     						$event_query = "SELECT * FROM Event where EventID = '$event_id'";
		     						$event_result = mysql_query($event_query);

		     						while($event_row = mysql_fetch_assoc($event_result)) {

		     							$event_name = $event_row['EventName'];
										$event_date = $event_row['EventDate'];
										$event_status = $event_row['EventStatus'];


										echo "<tr>";
											echo "<td>". $scoutid . "</td>";
											echo "<td>". $event_name. "</td>";
											echo "<td>". $event_date. "</td>";
											echo "<td>". $registration_status. "</td> ";
											echo "<td>". $role. "</td>";
											echo "<td>". $event_status. "</td>";
										echo "</tr>";


		     						}
		     						mysql_close();
		    					?>
	    					</tbody>
						</table>
				    </div>


				    <div class="right_column">
						<!--
						<h3>Right Column Content</h3>
						-->
					</div>
				</div>
			</div>


		</div>
	</body>
</html>