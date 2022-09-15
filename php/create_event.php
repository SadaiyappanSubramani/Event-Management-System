<!-- This page is a template for creating new pages
	for SCOUTS Waikato Event Management system-->

<?php
	require_once("./start_session.php");

	if (!$logged_in){
		header('Location: ./admin_login.php');
	}

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
								<span class="page_label">CREATE EVENT</span><br><br>
						</div>

						<form id="admin_create_event" method="POST" action="./save_create_event.php">
                            <fieldset class="question">
                                <!--Event description -->
                                <label for="event_name" >Event Name:  </label>
                                <input type="text" id="event_name" name="event_name" class="required wide">

                                <label for="event_description" >Event Description: </label>
                                <textarea name="event_description" rows="6"></textarea>

                                <label for="event_date">Date of Event: </label>
                                <input type="text"  id="event_date" name="event_date" class="required">

                                <label for="event_date">Registration Deadline: </label>
                                <input type="text"  id="event_deadline" name="event_deadline" class="required">

                            	<label for="event_startTime" >Start Time: </label>
                                <input type="text" id="event_start_time" name="event_start_time" class="required wide">

                                <label for="event_location" >Location: </label>
                                <input type="text" id="event_location" name="event_location" class="required wide">

                            	<label for="event_duration" >Event Duration: </label>
                                <input type="text" id="event_duration" name="event_duration" class="required wide">

                                <label for="event_type" >Type :</label>
                                <input type="text" id="event_type" name="event_type" class="required wide">

                                <label for="event_age_restriction" >Age Restriction :</label>
                                <input type="text" id="event_age_restriction" name="event_age_restriction" class="required wide">

                                <label for="event_status" >Status :</label>
                                <input type="text" id="event_status" name="event_status" class="required wide">

                                <label for="event_fees" >Event fees :</label>
                                <input type="text" id="event_fees" name="event_fees" class="required wide">

                                <label for="equipment_url">Equipment URL:</label>
                                <input type="text" id="event_equipment_url" name="event_equipment_url" class="required wide">

                                <label for="guideline_url">Guideline URL:</label>
                                <input type="text" id="event_guidline_url" name="event_guideline_url" class="required wide">

                                <label for="photo_url">Photo URL:</label>
                                <input type="text" id="event_photo_url" name="event_photo_url" class="required wide">

                                <div class="submit_create_event">
                                	<br />
                                	<input type="submit" name="saveCreate" value="Create Event">
                                	<input type="submit" name="saveCreate" value="Cancel">
                                </div>
	                      </fieldset>

                     	</form>

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