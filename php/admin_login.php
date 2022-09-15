<!-- This page allows an admin to login into the site and
	perform routine CRUD activities-->

<?php
	require_once("./start_session.php");

	if ($logged_in){
		header('Location: ./admin_index.php');
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
					<div class="middle_column margin_left">
						<div class="page_title">
								<span class="page_label">Admin Login</span><br><br>
						</div>

						<div class="login_form">
							<div class="login_form_title"> Log In</div>

							<form action="./validate_admin_login.php" method="POST">
									<br>
									Username : <input type="text" name="username">
						      		<br> <br>
						      		Password : <input type="password" name="password">
						      		<br> <br>
						      		<input type="Submit" value="Login">
						    </form>
				    		<br>
						</div>
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