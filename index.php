<!-- This is the main/index page for the SCOUTS Waikato site -->

<?php
	require_once("./php/start_session.php");
	require_once("./php/db.php");
?>



<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Event Management System</title>
        <link href="./css/site.css" rel="stylesheet" type="text/css">
        <link href="./css/member.css" rel="stylesheet" type="text/css">

	</head>

	<body>

		<div class="container">

			<div class="header">
				<!-- generate header -->
	    		<?php 	include("./php/page_header.php"); 	?>
    		</div>


    		<div class="menu_bar">
    			<!-- generate menu bar-->
	    		<?php   include("./php/common_menu.php"); 	?>
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
								<span class="page_label">Upcoming Event List</span><br><br>
						</div>

						<p> Please click on the event name to register for the event.</p>

						<ul class="event_list">
							<li class="event_list_header">
								<div class="event_name">Event Name</div>
								<div class="event_date">Date</div>
								<div class="event_type">Type</div>
								<div class="event_location">Location</div>
								<div class="event_status">Status</div>
								<div class="event_fees">Fees</div>
							</li>
							<!-- Below content generates an event list from the database/ -->
							<?php
         						$event_query = "SELECT * FROM `event` LIMIT 10";
         						$event_result = mysql_query($event_query);

         						while($event_row = mysql_fetch_assoc($event_result)) {

         							$event_name = $event_row['EventName'];
									$event_date = $event_row['EventDate'];
									$event_type = $event_row['Type'];
									$event_location = $event_row['Location'];
									$event_status = $event_row['EventStatus'];
									$event_fees = $event_row['Fees'];
									$event_id = $event_row['EventID'];

									echo "<li class='event_list_content'>";
										echo '<div class="event_name"> <a href="./php/event_details.php?event_id='. $event_id . '">' . $event_name . "</a></div>";
										echo '<div class="event_date">'. $event_date . "</div>";
										echo '<div class="event_type">'. $event_type . "</div>";
										echo '<div class="event_location">'. $event_location . "</div>";
										echo '<div class="event_status">'. $event_status . "</div>";
										echo '<div class="event_fees"> $'. $event_fees . "</div>";
		            				echo "</li>";
         						}
         						mysql_close();
        					?>
						 </ul>
				    </div>

				    <div class="right_column"> <!-- float_left -->
						<!--
						<h3>Right Column Content</h3>
						-->
					</div>

				</div>

			</div>


			<div class="footer">
				<!-- generate footer -->
	    		 <?php include("./php/page_footer.php"); ?>
	    	</div>
		</div>
	</body>
</html>

