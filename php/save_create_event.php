<?php
	require_once("./start_session.php");
	require_once("./db.php");
	
	if ($_POST['saveCreate'] == 'Cancel'){
		 header('Location: ./admin_index.php');
	}
	else{
		// get the values of the variables from POST
		$event_name = $_POST['event_name'];
		$event_date = $_POST['event_date'];
		$event_start_time = $_POST['event_start_time'];
		$event_duration = $_POST['event_duration'];
		$event_description = $_POST['event_description'];
		$event_type = $_POST['event_type'];
		$event_location = $_POST['event_location'];
		$event_age_restriction = $_POST['event_age_restriction'];
		$event_status = "Open";
		$event_fees =  $_POST['event_fees'];
		$event_equipment_url = $_POST['event_equipment_url'];
		$event_guideline_url = $_POST['event_guideline_url'];
		$event_photo_url = $_POST['event_photo_url'];
		
		// construct query to insert data into the event table
		$insert_event_query = "	INSERT INTO `event`(`EventName`, `EventDate`, `StartTime`, 
		 									`DurationHours`, `Description`, `Type`, `Location`, 
		 										`AgeRestrictionYears`, `EventStatus`, `Fees`, 
		 										`EquipmentURL`, `GuidelineURL`, `PhotoURL`) 
		 						VALUES ('$event_name','$event_date','$event_start_time','$event_duration','$event_description',
		 								'$event_type','$event_location','$event_age_restriction','$event_status','$event_fees',
		 								'$event_equipment_url','$event_guideline_url','$event_photo_url')
							 ";
		
		$insert_result = mysql_query($insert_event_query);
		
		if ($insert_result == FALSE) echo ("Error, couldn't insert data into Event");
		
	    mysql_close();
	    
		echo "<script type='text/javascript'>
					alert('Event has been created successfully');
					window.location.href = './admin_index.php';
				</script>";
	}
?>