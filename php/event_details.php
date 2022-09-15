<!-- This page displays details for an event selected
	from the event list on index.php -->

<?php
	require_once("./start_session.php");
	require_once("./db.php");
	$event_id = $_GET['event_id'];
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
	    		<?php 	include("./page_header.php"); 	?>
    		</div>

    		<div class="menu_bar">
    			<!-- generate menu bar-->
	    		<?php
	    			include("./common_menu.php");
	    		?>
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

						<!-- Below content generates details for an event from the database/ -->
						<table class="event_details">
							<tbody>
								<?php
		     						$event_query = "SELECT * FROM Event where EventID = '$event_id'";
		     						$event_result = mysql_query($event_query);

		     						while($event_row = mysql_fetch_assoc($event_result)) {

		     							$event_name = $event_row['EventName'];
										$event_date = $event_row['EventDate'];
										$event_type = $event_row['Type'];
										$event_location = $event_row['Location'];
										$event_status = $event_row['EventStatus'];
										$event_fees = $event_row['Fees'];
										$event_id = $event_row['EventID'];
										$event_description = $event_row['Description'];
										$event_startTime = explode(":", $event_row['StartTime']) ;
										$event_ageRestriction = $event_row['AgeRestrictionYears'];
										$event_equipmentURL = $event_row['EquipmentURL'];
										$event_guidelineURL = $event_row['GuidelineURL'];
										$event_photoURL = $event_row['PhotoURL'];

										if ($event_startTime[0] >= 12) $AM_PM = "PM";
										else $AM_PM = "AM";




										echo "<tr>";
											echo '<td>EVENT NAME: </td><td><a href="#">' . $event_name . "</a></td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>DATE: </td><td>". $event_date . "</td>";
										echo "</tr>";

										echo "<tr>";
											echo "<td>TYPE: </td><td>". $event_type . "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>STATUS: </td><td>". $event_status . "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>LOCATION: </td><td>". $event_location . "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>FEES: </td><td> $". $event_fees . "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>DESCRIPTION: </td><td>". $event_description . "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>START TIME: </td><td>". $event_startTime[0] .':'.$event_startTime[1]." ". $AM_PM." </td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>AGE RESTRICTION: </td><td>". $event_ageRestriction . " yrs</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>EQUIPMENT NEEDED: </td><td><a href='#'>". $event_equipmentURL . "</a></td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>EVENT GUIDELINES: </td><td><a href='#'>". $event_guidelineURL . "</a></td>";
										echo "</tr>";

										echo "<tr>";
											echo '<td style="text-align:center"><a href="./individual_event_registration.php?event_id='.$event_id.
																														   '&event_name='.$event_name.
																											    	       '&age_restriction='.$event_ageRestriction.
																														   '&event_start_date='.$event_date.
																														   '&event_location='.$event_location.
																														   '">
																														   <button type="button">INDIVIDUAL REGISTRATION </button> </a></td>';
											echo '<td style="text-align:center" colspan="2"><a href="./group_event_registration.php?event_id=' .$event_id.
																																  '&event_name='.$event_name.
																																  '&age_restriction='.$event_ageRestriction.
																														   		  '&event_start_date='.$event_date.
																														          '&event_location='.$event_location.
																																  '">
																																  <button type="button">GROUP REGISTRATION </button> </a></td>';
										echo "</tr>";

										/* echo '<td></td><td> <a href="./event_registration.php?event_id=' . $event_id.'&event_name='.$event_name . '"> <button type="button">REGISTER </button> </a></td><td></td>';
										 * style="text-align:center" colspan="2"
										 * */


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

			<div class="footer">
	    		 <!-- generate footer -->
	    		 <?php include("./page_footer.php"); ?>
	    	</div>
		</div>
	</body>
</html>

