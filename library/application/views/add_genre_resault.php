<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit(redirect('/library/login'));

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Library</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #f7f7f7;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 13px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		background-color: #fff;
	}
	a {
		text-decoration: none;
		padding: 6px;
		transition: background-color .5s;
	}
	td {
		text-align: center;
	}
	td a.edit-book {
		background-color: #1573ff;
		color: white;
	}
	td a.delete-book {
		background-color: red;
		color: white;
	}
	td a:hover {
		background-color: black;
	}
	input[type="text"], input[type="date"], input[type="number"] {
		text-align: left;
		padding: 5px;
		width: 30%;
	}
	h1 {
		text-align: center;
	}
	p.footer {
		text-align: center;
	}
	#header a {
		margin: 0 10px;
	}
	#header a.add-book {
		font-size: 15px;
		color: white;
		background-color: green;
		text-align: right;
		float: right;
	}
	#header a.add-author {
		font-size: 15px;
		color: white;
		background-color: #0037ff;
		text-align: right;
		float: right;
	}
	#header a:hover {
		background-color: black;
	}
	form {
		display: inline;
	}
	</style>
</head>
<body>

<div id="container">
	<h1 id="header"><a href="<?php echo $this->config->base_url(); ?>">Go Back</a></h1>
	<div id="body">
		<h2>Genre Added Successfully</h2>
	</div>

	<p class="footer">
	</p>
</div>

</body>
</html>
