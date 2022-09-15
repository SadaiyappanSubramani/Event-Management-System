<!-- This page validates username/password submitted through login.php and redirects to appropriate target page -->
<?php
   session_start();

   require_once ("./db.php");

   $username = $_POST['username'];
   $password = $_POST['password'];

   $login_query = "select * from adminuser where UserName='$username' and Password='$password'";
   $login_result = mysql_query($login_query);

   if(mysql_num_rows($login_result) == 1) {
      $row = mysql_fetch_assoc($login_result);
      $_SESSION['logged_in'] = TRUE;
      $_SESSION['user'] = $username;
      mysql_close();
      header('Location: ./admin_index.php');
   } else {
      mysql_close();
      header('Location: ./admin_login.php');
   }
?>