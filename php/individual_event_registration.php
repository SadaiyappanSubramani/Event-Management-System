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
								<span class="page_label">Member Event Registration</span><br><br>
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

							<form id="event_registration_form" method="POST" action="./save_event_registration.php">
								<fieldset class="question">
          							<legend class="question_label">Personal Details</legend>
						          	<div class="question_content" id="A2">
						          		<!--Last Name -->
							            <label for="last_name" >Last Name: </label>
							            <input type="text" id="last_name" name="last_name"  class="required">
										<!--First Name -->
							            <label for="first_name" >First name: </label>
							            <input type="text" id="first_name" name="first_name" class="required wide">
							            <!--Gender-->
							            <br />
							            <label for="gender">Gender: </label>
							            <input type="radio"  id="male" name="gender" value="male">male
							            <input type="radio"  id="female" name="gender" value="female" checked>female
							            <br/> <br/>
						            	<!--DOB-->
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
							            <label for="email" >Re-enter Email: </label>
							            <input type="text" id="email_check" name="email_check" class="required wide">
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
							            <br />
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
							            <!--Member Role -->
							            <br /> <br />
							            <label for="role" >Role: </label>
							            <select name="role">
							            	<option value="member">Member</option>
							            	<option value="leader">Leader</option>
							            </select>
						          </div>
						        </fieldset>
						        <br /> <br />

						        <fieldset class="question">
          							<legend class="question_label">Medical Information</legend>
						          	<div class="question_content">
						          		<span>Does the applicant have to take medication? </span>
						            	Yes
					          			<input type="radio" name="medication"  value="yes" id="medication_yes" >
					          			No
					          			<input type="radio" name="medication"  value="no" id="medication_no" checked>
					          			<br /> <br />
					          			<p class="note">Note: If yes, clearly mark these and arrange details to  be handed to the leader incharge of his/her group.</p>
						          	</div>

						          	<div class="question_content">
						          		<span>Does the applicant suffer from any allergies? </span>
						            	Yes
					          			<input type="radio" name="allergies"  value="yes" id="allergies_yes" >
					          			No
					          			<input type="radio" name="allergies"  value="no" id="allergies_no" checked>
					          			<br /> <br />
					          			<p class="note">Note: If yes, clearly mark these and arrange details to  be handed to the leader incharge of his/her group.</p>
						          	</div>

						          	<div class="question_content">
						          		<span>Does the applicant suffer from any disability? </span>
						            	Yes
					          			<input type="radio" name="disability"  value="yes" id="disability_yes" >
					          			No
					          			<input type="radio" name="disability"  value="no" id="disability_no" checked>
					          			<br /> <br />
					          			<p class="note">Note: If yes, clearly mark these and arrange details to  be handed to the leader incharge of his/her group.</p>
						          	</div>
						          	<br />
						          	<div class="question_content">
						          		<span>Please provide any other medical or health related information below: </span>
						            	<textarea name="other_info" rows="6"></textarea>
									</div>
						        </fieldset>
						        <br /> <br />

						        <fieldset class="question">
          							<legend class="question_label">Parent / Caregiver Consent</legend>
						          	<div class="question_content">
						          		<input type="checkbox" name="parent_willing_to_allow" value="yes"/>
						          		I am willing to allow the applicant to attend the event.
						          		<br /> <br />
					  					<input type="checkbox" name="parent_accept_risk" value="yes"/>
					  					I accept the risks involved and agree that the applicant will be amenable to the instructions of the adult leaders in whose charge he/she will be placed
										<br />
						          </div>
						        </fieldset>
						        <br /> <br />
						         <fieldset class="question">
          							<legend class="question_label">Consent</legend>
						          	<div class="question_content">
						          		<input type="checkbox" name="apply_to_attend" value="yes"/>I apply to attend the event.
					  					<br/><br/><input type="checkbox" name="accept_risk" value="yes"/>I accept the risks involved. I accept that I must fully participate in all activities and that I will satisfactorily complete all duties as reasonably required of me.
					 					<br /><br/><input type="checkbox" name="agree_to_abide" value="yes"/>I agree to abide by the rules the event.
					 					<br/><br/><input type="checkbox" name="agree_copyright" value="yes"/>I agree that photographs taken during the course of the event are the properties of used in publicity material.

						          </div>
						        </fieldset>
						        <br/>
						        <br/>

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
		<!--<script type="text/javascript" src="../javascript/jquery-1.8.2.js"></script>
		<script type="text/javascript" src="../javascript/validate_registration.js"></script>-->

	</body>
</html>

