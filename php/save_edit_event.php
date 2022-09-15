<?php
	require_once("./start_session.php");
	require_once("./db.php");
	$event_id = $_POST['event_id'];	
	
	if ($_POST['saveCancel'] == 'Cancel'){
		 header('Location: ./admin_index.php');
	}
	
	// get the values of the variables from POST
	$event_name = $_POST['event_name'];
	$event_desc = $_POST['event_desc'];
	$event_date = $_POST['event_date'];
	$event_location = $_POST['event_location'];
	$event_startTime = $_POST['event_time'];
	$event_duration  = $_POST['event_duration'];
	$event_ageRestriction = $_POST['event_ageRestrict'];
	$event_status = $_POST['event_status'];
	
	// construct query to update values
	$update_query = "	UPDATE event 
						SET EventName='$event_name', Description='$event_desc', EventDate='$event_date', Location='$event_location',
							StartTime='$event_startTime', DurationHours=$event_duration, AgeRestrictionYears=$event_ageRestriction, EventStatus='$event_status'
						WHERE EventID=$event_id;
					";
	
	$insert = mysql_query($update_query);
		
    mysql_close();
    
	echo "<script type='text/javascript'>
				alert('Event updated successfully');
				window.location.href = './admin_index.php';
			</script>";
?>