<!-- This is a test script, IGNORE-->

<?php


	/*echo "__FILE__: ". __FILE__;
	echo "<br> SCRIPT_FILENAME: ". $_SERVER['SCRIPT_FILENAME'];
	echo "<br> PHP_SELF: ". $_SERVER['PHP_SELF'];
	echo "<br> dirname(__FILE__): ". dirname(__FILE__);
	echo '<br> SERVER_ROOT: '. $_SERVER['DOCUMENT_ROOT'];
	echo "<br> cwd: ". getcwd();
	 * 
	 
	 $result3 = mysql_query("SELECT EventID FROM event"); 
	$row4 = mysql_fetch_array($result3);
	$row5 = mysql_num_rows($result3);
	
	echo 'row4: '.var_dump($row4);
	echo '<br />row5: '. $row5;
	echo '<br/> count:'.count($result3);
	 * 
	 * 
	 */

	 
?>


<!DOCTYPE html>
<html>
	<head>
		<title> This is a jquery test page</title>
		<style type="text/css">
			p{
				display: none;
			}
		</style>
		
		<script type="text/javascript" src="../javascript/jquery-1.8.2.js"></script>
	</head>
	
	<body>
		
		
		<p>Hi, this a test of jquery!</p>
		
		<script type="text/javascript" src="../javascript/test.js"></script>
		
		<?php
		
		if ( function_exists( 'mail' ) )
		{
		    echo 'mail() is available';
		}
		else
		{
		    echo 'mail() has been disabled';
		} 

		echo phpinfo();
		?>
	</body>
</html>