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

	a, button {
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
	a, button {
		text-decoration: none;
		padding: 6px;
		transition: background-color .5s;
		border: 0;
		cursor: pointer;
	}
	td {
		text-align: center;
	}
	td .edit-book {
		background-color: #1573ff;
		color: white;
	}
	td .delete-book {
		background-color: red;
		color: white;
	}
	td a:hover, td button:hover {
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
	#header .add-book {
		font-size: 15px;
		color: white;
		background-color: green;
		text-align: right;
		float: right;
	}
	#header .add-author {
		font-size: 15px;
		color: white;
		background-color: #0037ff;
		text-align: right;
		float: right;
}
	#header .add-genre {
		font-size: 15px;
		color: white;
		background-color: #479eb1;
		text-align: right;
		float: right;
	}
	#header a:hover, #header button:hover {
		background-color: black;
	}
	form {
		display: inline;
	}
	</style>
</head>
<body>

<div id="container">
	<h1 id="header">
		<form method="GET" action="<?php echo $this->config->base_url();?>library/search">
			<input type="text" name="keyword" placeholder="Search">
			<input type="submit" name="submit" value="Search">
		</form>
		<a href="<?php echo $this->config->base_url();?>library/add_book" target="_blank" class="add-book">Add New Book</a>
		<a href="<?php echo $this->config->base_url();?>library/addAuthor" target="_blank" class="add-author">Add Author</a>
		<a href="<?php echo $this->config->base_url();?>library/add_genre" target="_blank" class="add-genre">Add New Genre</a>
	</h1>
	<div id="body">
		<table align="center" border="5"  width="50%">
			<thead>
			 	<tr>
				    <th>Book Name</th>
				    <th>Edition Number</th>
				    <th>Number of Pages</th>
				    <th>Publish Date</th>
				    <th>Edit</th>
				    <th>Delete</th>
			 	</tr>
		  	</thead>
		  	<tbody>
				<?php foreach($books as $book): ?>
					<tr style="width: 67px; height: 86px;">
					    <td><?php echo $book->NameBook; ?></td>
					    <td><?php echo $book->EditionNumber; ?></td>
					    <td><?php echo $book->numberofpages; ?></td>
					    <td><?php echo $book->PublishDate; ?></td>
					    <form action="<?php echo base_url(); ?>index.php/library/editBook" method="POST"><td><button type="submit" name="bookISBN" value="<?php echo $book->ISBN; ?>" class="edit-book">Edit Book</button></td></form>
					    <form action="<?php echo base_url(); ?>index.php/library/confirmDeleteBook" method="POST"><td><button type="submit" name="bookISBN" value="<?php echo $book->ISBN; ?>" class="delete-book">Delete Book</button></td></form>
					</tr>
				<?php endforeach; ?>
		  	</tbody>
		</table>
	</div>

	<p class="footer">
		<a href="<?php echo $this->config->base_url();?>index.php/library/logout">logout</a>
	</p>
</div>

</body>
</html>
