<!-- This page allows the user to submit SCOUTS ID and email to check
	for registered events-->
<?php

	require_once("./start_session.php")
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
								<span class="page_label">View Event Registration Status</span><br><br>
						</div>

						<div class="view_registered_events">

							<form class="view_event" method="POST" action="./show_registered_events.php">
								<fieldset class="question">
          							<legend class="question_label">Please enter your details</legend>
          							<br />
						          	<div class="question_content" id="A2">
						          		<!--Scouts ID-->
							            <label for="scout_id" >User ID: </label>
            							<input type="text" id="scout_id" name="scout_id" class="required_wide">
							            <br />
							            <!--Email-->
							            <label for="email" >Email: </label>
							            <input type="text" id="email" name="email" class="required wide">
						          	</div>

						          	<div class="submit_view_events">
						          		<input type="submit" value="SUBMIT">
						           </div>
						        </fieldset>

							</form>
						</div>
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
				<?php	include("./page_footer.php");	?>
		    </div>
		</div>
	</body>
</html>