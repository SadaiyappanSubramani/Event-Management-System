<!-- This page displays a registration form for an event selected
	through event_details.php-->
<?php

	require_once("./start_session.php");
	require_once("./db.php");

	$event_id = $_GET['event_id'];
	$event_name = $_GET['event_name'];
	$event_start_date = $_GET['event_start_date'];
	$age_restriction = $_GET['age_restriction'];
	$event_location = $_GET['event_location'];
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

    		<!-- generate menu bar-->
    		<div class="menu_bar">
    		<?php
    			include("./common_menu.php");
    		?>
    		</div>

    		<div class="content ">
				<div class="left_column">
						<!--
						<h3>Left Column Content</h3>
						-->
				</div>

				<div class="right_combined_column">
					<div class="middle_column margin_left">

						<div class="event_registration_form">
							<div class="page_title">
								<span class="page_label">Group Event Registration</span><br><br>
								<fieldset class="details_table">
									<legend>You are registering for</legend>
									<table id="registration_for_event_table">
										<thead>
											<th>Event</th>
											<th>Location</th>
											<th>Date</th>
											<th>Age Requirements</th>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $event_name;?></td>
												<td><?php echo $event_location;?></td>
												<td><?php echo $event_start_date;?></td>
												<td><?php echo $age_restriction. ' yrs and above';?></td>
											</tr>
										</tbody>
									</table>
								</fieldset>

							</div>

							<form id="group_event_registration_form" method="POST" action="./save_event_registration.php">
								<fieldset class="question">
          							<legend class="question_label">Personal Details</legend>
						          	<div class="question_content" id="A2">
						          		<!--Last Name -->
							            <label for="last_name" >Last Name: </label>
							            <input type="text" id="last_name" name="last_name"  class="required wide">

							            <label for="first_name" >First name: </label>
							            <input type="text" id="first_name" name="first_name" class="required wide">

							            <!--Gender-->
							            <br />
							            <span>Gender: </span>
							            <input type="radio"  id="male" name="gender" value="male" >
							            male
							            <input type="radio"  id="female" name="gender" value="female" checked>
							            female
						            	<!--DOB-->
						            	<br /> <br />
							            <label for="dob">Date of Birth: </label>
							            <input type="text"  id="dob" name="dob" class="required">
						          	</div>
						        </fieldset>
								<br />

								<fieldset class="question">
          							<legend class="question_label">Contact Information</legend>
						          	<div class="question_content" id="A2">
						          		<!--Street address-->
							            <label for="street_address" >Street address: </label>
							            <input type="text" id="st_address" name="street_address" class="required wide">

							            <!--City-->
							            <label for="city" >City: </label>
							            <input type="text" id="city" name="city" class="required wide">

							            <!--Email-->
							            <label for="email" >Email: </label>
							            <input type="text" id="email" name="email" class="required wide">

							            <!--Landline, home phone number-->
							            <label for="home_phone" >Home phone number: </label>
            							<input type="text" id="home_phone" name="home_phone" class="medium">

							            <!--Mobile phone number-->
							            <label for="mobile" >Mobile phone number: </label>
            							<input type="text" id="mobile" name="mobile" class="medium">

						          </div>
						        </fieldset>
						        <br/>

						        <fieldset class="question">
          							<legend class="question_label">Other Details</legend>
						          	<div class="question_content" >
						          		<!--Scouts ID-->
							            <label for="scout_id" >User ID: </label>
            							<input type="text" id="scout_id" name="scout_id" class="required wide">

							            <!--Zone name -->
							            <label for="zone" >Zone: </label>
							            <select name="zone">
							            	<!-- Generate the zone name from the database -->
							            	<?php
								            	$query = "select ZoneName from Zone";
	            								$result = mysql_query($query);

												if ($result == FALSE) echo ("Error connecting to database");
	            								while($row = mysql_fetch_assoc($result)) {
	               								echo "<option value='" . $row['ZoneName'] . "'>" . $row['ZoneName'] . "</option>";
												}
												mysql_close();
							            	?>
							            </select>
							            <br /> <br />
							            <!--Member Role -->
							            <label for="role" >Role: </label>
							            <select name="role">
							            	<option value="member">Member</option>
							            	<option value="leader">Leader</option>
							            </select>
						          </div>
						        </fieldset>
						        <br /> <br />
						        <div class="submit_registration_button"> <input type="submit" value="SUBMIT REGISTRATION"></div>
								<?php
									echo '<input type="hidden" name="event_id" value="'.$event_id.'"/>';
									echo '<input type="hidden" name="event_name" value="'.$event_name.'"/>';
								?>
							</form>
						</div>

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
				<?php	include("./page_footer.php");	?>
		    </div>
		</div>
	</body>
</html>

