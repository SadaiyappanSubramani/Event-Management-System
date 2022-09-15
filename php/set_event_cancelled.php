<?php
	require_once("./start_session.php");
	require_once("./db.php");
	$event_id = $_POST['event_id'];	
	
	if ($_POST['cancel'] == 'No'){
		// go back to admin index page
		 header('Location: ./admin_index.php');
	}
	// value is yes so cancel event
	// construct query to update values
	$update_query = "	UPDATE event 
						SET EventStatus='Cancelled'
						WHERE EventID=$event_id;
					";
	// execute the query
	$update = mysql_query($update_query);
	// close db connection	
    mysql_close();
    
	// pop-up message
	echo "<script type='text/javascript'>
				alert('Event cancelled successfully');
				window.location.href = './admin_index.php';
			</script>";
?>