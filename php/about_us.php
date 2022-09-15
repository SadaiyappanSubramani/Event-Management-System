<!-- This is an ABOUT US page for SCOUTS Waikato organization-->


<?php
	require_once("./start_session.php");
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
    			<!-- generate menu bar-->
	    		<?php	include("./common_menu.php");	?>
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
								<span class="page_label">About Us</span><br><br>
						</div>

						<div class="about_us_content">
							<img src="../images/IMG_3802.jpg" alt="scout activity image" height="190" width="225"/>
 							Welcome :
 							<br /> <br />
 							As a result of solving problem, reducing the paper work and manual processes with online registration


							<br/> <br />

							We believe in the value of the work we do, challenging young New Zealanders to be active, extra-ordinary and adventurous...
							<br /> <br/>
							Our project emphasis on making the task user friendly and easy for students and faculties to register for various events organized by the college through the common server and also see the ongoing events at a particular time
							<br /> <br />
							It allows you provide to the students and faculties with a comprehensive set of online self service functionality. With event management system, there’s no more need for paper trails or time consuming manual processes
							<br /> <br/>

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