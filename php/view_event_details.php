<!-- This page is a template for creating new pages
	for SCOUTS Waikato Event Management system-->

<?php
	require_once("./start_session.php");
	require_once("./db.php");

	if (!$logged_in){
		header('Location: ./admin_login.php');
	}

	$event_id = $_GET['event_id'];
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
								<span class="page_label">Event Details</span><br><br>
						</div>
						<br />

						<div class="save_view_details">
							<button type="button">PRINT</button>
							&nbsp; &nbsp;
							<button type="button">SAVE</button>
							&nbsp; &nbsp;
							<a href="./admin_index.php"><button type="button">CANCEL</button></a>
						</div>
						<br />
						<?php
							$event_query = "SELECT * FROM `Event` where EventID = '$event_id'";
		         			$event_result = mysql_query($event_query);

							if (mysql_num_rows($event_result) == 1){
								$event_row = mysql_fetch_assoc($event_result);
								// put the values of the row in the variables
								$event_name = $event_row['EventName'];
								$event_location = $event_row['Location'];
								$event_date = $event_row['EventDate'];
								$event_startTime = explode(":",$event_row['StartTime']);
								$event_ageRestriction = $event_row['AgeRestrictionYears'];
								$event_type = $event_row['Type'];
								$event_status = $event_row['EventStatus'];
								$event_fees = $event_row['Fees'];

								if ($event_startTime[0] >= 12) $AM_PM = "PM";
											else $AM_PM = "AM";
							}


						?>
						<fieldset class="admin_view_event_details">
									<legend>Event Details</legend>
									<table id="admin_view_event_table">
										<thead>
											<th>Event</th>
											<th>Location</th>
											<th>Date</th>
											<th>Time</th>
											<th>Age Requirements</th>
											<th>Status</th>
											<th>Fees</th>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $event_name; ?></td>
												<td><?php echo $event_location; ?></td>
												<td><?php echo $event_date; ?></td>
												<td><?php echo $event_startTime[0].":".$event_startTime[1]. ' ' .$AM_PM; ?></td>
												<td><?php echo $event_ageRestriction. ' yrs and above'; ?></td>
												<td><?php echo $event_status;?></td>
												<td><?php echo '$'.$event_fees; ?></td>
											</tr>
										</tbody>
									</table>
						</fieldset>

						<fieldset class="admin_view_member_details">
									<legend>Member Details</legend>
									<table id="admin_view_member_table">
										<thead>
											<th>User ID</th>
											<th>Zone</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Gender</th>
											<th>Landline</th>
											<th>Registration Status</th>
										</thead>
										<tbody>
											<?php
												$member_query = "SELECT a.ScoutID, b.ZoneName, b.FirstName, b.LastName,  b.Gender, b.Landline, a.RegistrationStatus
																 FROM `registration` a, `ScoutMember` b
																 WHERE b.ScoutID = a.ScoutID
																 AND a.EventID = '$event_id'
																 AND a.Role = 'Member'
																 ORDER BY b.FirstName, b.LastName";
												$member_result = mysql_query($member_query);

												if (mysql_num_rows($member_result) > 0 ){
													while($member_row = mysql_fetch_assoc($member_result)){
															$scout_id = $member_row['ScoutID'];
															$zone_name = $member_row['ZoneName'];
															$first_name = $member_row['FirstName'];
															$last_name = $member_row['LastName'];
															$gender = $member_row['Gender'];
															$landline = $member_row['Landline'];
															$registration_status = $member_row['RegistrationStatus'];

														echo '<tr>';
															echo '<td>'.$scout_id. '</td>';
															echo '<td>'.$zone_name. '</td>';
															echo '<td>'.$first_name. '</td>';
															echo '<td>'.$last_name. '</td>';
															echo '<td>'.$gender. '</td>';
															echo '<td>'.$landline. '</td>';
															echo '<td>'.$registration_status. '</td>';
														echo '</tr>';
													}
												}
												else{
													echo '<tr>';
														echo '<td class="empty_table" colspan="7"> No rows present! </td';
													echo '</tr>';
												}

											?>
										</tbody>
									</table>
						</fieldset>

						<fieldset class="admin_view_leader_details">
									<legend>Leader Details</legend>
									<table id="admin_view_leader_table">
										<thead>
											<th>User ID</th>
											<th>Zone</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Gender</th>
											<th>Landline</th>
											<th>Registration Status</th>
										</thead>
										<tbody>
											<?php
												$leader_query = "SELECT a.ScoutID, b.ZoneName, b.FirstName, b.LastName,  b.Gender, b.Landline, a.RegistrationStatus
																 FROM `registration` a, `ScoutMember` b
																 WHERE b.ScoutID = a.ScoutID
																 AND a.EventID = '$event_id'
																 AND a.Role = 'Leader'
																 ORDER BY b.FirstName, b.LastName";
												$leader_result = mysql_query($leader_query);

												if (mysql_num_rows($leader_result) > 0 ){
													while($leader_row = mysql_fetch_assoc($leader_result)){
															$scout_id = $leader_row['ScoutID'];
															$zone_name = $leader_row['ZoneName'];
															$first_name = $leader_row['FirstName'];
															$last_name = $leader_row['LastName'];
															$gender = $leader_row['Gender'];
															$landline = $member_row['Landline'];
															$registration_status = $leader_row['RegistrationStatus'];

														echo '<tr>';
															echo '<td>'.$scout_id. '</td>';
															echo '<td>'.$zone_name. '</td>';
															echo '<td>'.$first_name. '</td>';
															echo '<td>'.$last_name. '</td>';
															echo '<td>'.$gender. '</td>';
															echo '<td>'.$landline. '</td>';
															echo '<td>'.$registration_status. '</td>';
														echo '</tr>';
													}
												}
												else{
													echo '<tr>';
														echo '<td class="empty_table" colspan="7"> No rows present! </td';
													echo '</tr>';
												}

											?>
										</tbody>
									</table>
						</fieldset>





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
	</body>
</html>