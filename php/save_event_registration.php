<?php
	require_once("./start_session.php");
	require_once("./db.php");


	$event_id = $_POST['event_id'];
	$event_name = $_POST['event_name'];

	/* Following variables to be inserted into the scoutmember table */

	$scoutid = $_POST['scout_id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$mobile = $_POST['mobile'];
	$landline = $_POST['home_phone'];
	$street_address = $_POST['street_address'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$zone = $_POST['zone'];

	/* Following variables to be inserted into the registration table*/

	$role = $_POST['role'];
	$registration_status = 'Pending';
	$medication = $_POST['medication'];
	$disability = $_POST['disability'];
	$allergies = $_POST['allergies'];
	$other_info = $_POST['other_info'];

	/* $ = $_POST['']; */

	$scoutmember_query = "INSERT INTO `scoutmember`(`ScoutID`, `FirstName`, `LastName`, `StreetAddress`, `City`, `Email`, `Landline`, `MobilePhone`, `DOB`, `Gender`, `ZoneName`)
			              VALUES ('$scoutid','$first_name','$last_name','$street_address','$city','$email','$landline','$mobile','$dob','$gender','$zone')";

	$registration_query = "INSERT INTO `registration`(`Role`, `RegistrationStatus`, `Medication`, `Disability`, `Allergies`, `OtherInfo`, `ScoutID`, `EventID`)
						   VALUES ('$role','$registration_status','$medication','$disability','$allergies','$other_info','$scoutid','$event_id')";

	$insert_into_scoutmember = mysql_query($scoutmember_query);
	$insert_into_registration = mysql_query($registration_query);


	/*send email */
	/*
	$to = $email;
	$subject = "Registration application for ". $event_name . " has been submitted";
	$message = "Hi, Your application for ".$event_name. " has been submitted. Please print out the attached form and submit it to your group leader. Thanks, SCOUTS Waikato";

	$from = "apm19@students.waikato.ac.nz";
	$headers = "From: ". $from;
	if (mail($to,$subject,$message,$headers)) {
		echo("<p>Message successfully sent!</p>");
		}
		else {
		echo("<p>Message delivery failed...</p>");
		}
	 *
	 */
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
    				<div class="banner">
    				<span class="page_title"> <a href="../index.php">Event Management System </a>
    				</span>
    				</div>

    		</div>


    		<!-- generate menu bar-->
    		<div class="menu_bar">
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

				<div class="right_combined_column"> <!--margin_left -->
					<div class="middle_column margin_left">
						<div class="page_title">
								<span class="page_label">Registration Confirmation</span><br><br>
						</div>

						<div class="confirmation_result">
							Your event registration application for the event <b><?php echo $event_name; ?></b> has been successfully submitted!.
							<br> <br>

							Please save or print the forms and submit them to your group leader.
							<br> <br>
							<button type="button">SAVE FORM</button>
							<button type="button">PRINT FORM</button>
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