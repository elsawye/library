<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>login</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["login"]["AdminName"].value == "" )
	         {
	            alert( "enter username" );
	            return false;
	         }

	         if( document.forms["login"]["Adminpass"].value == "" )
	         {
	            alert( "enter password" );
	            return false;
	         }


	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Login</h1></div>
	<form name="login" action="<?php echo base_url(); ?>index.php/library/loginrequest" onsubmit="return validateForm()" method="post">
	 username <br><input type="text" name="AdminName"><br>
	 password <br><input type="password" name="Adminpass"><br>
	 <input type="submit" value="Submit">
	 </form>

</body>
</html>
