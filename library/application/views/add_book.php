<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
		padding-left: 30px;
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
	input[type="submit"] {
		text-decoration: none;
		padding: 6px;
		transition: background-color .5s;
		border: none;
		cursor: pointer;
	}
	input[type="text"], input[type="date"], input[type="number"], select {
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
	p .add-book {
		font-size: 15px;
		color: white;
		background-color: green;
	}
	p .add-book:hover {
		background-color: black;
	}
	.cancel {
		padding-left: 5px;
	    text-decoration: none;
	    color: black;
	    font-size: 12px;
	    font-weight: bold;
	}
	</style>
</head>
<body>
	<div id="container">
		<h1 id="header">Add New Book</h1>
		<form action="<?php echo $this->config->base_url(); ?>library/add_book_resault" method="POST">
			<div id="body">
				ISBN:<br>
				<input type="text" name="isbn" value="" required>
				<br>
				<br>
				Item title:<br>
				<input type="text" name="bookname" value="" required>
				<br>
				<br>
				Edition Number:<br>
				<input type="text" name=" editionnumber" value="" required>

				<br>
				<br>

				Publish Date:<br>
				<input type="date" name="publishdate" value="" required>

				<br>
				<br>
				Format Avaliable:<br>
				<!-- to multiply selection the user have to press (ctrl or shift) while selection -->
				<?php
				if(isset($typesList)){
					foreach ( $typesList as $type) {
						echo '<label><input type="checkbox" name="type[]" value="'.$type->IDType.'">'.$type->TypeName.'</label><br>';
					}
				}
				?>
				<br>
				<br>
				Author:<br>
					<?php
					if (isset($authorsList)) {
						foreach ($authorsList as $author) {
							echo '<label><input type="checkbox" name="author[]" value="'.$author->IDAuthor.'">'.$author->NameAuthor.'</label><br>';
						}
					}

					?>
				<br>
				<br>
				Number of pages:<br>
				<input type="number" name="pagesCount" value="">

				<br>
				<br>

				Genre:<br>
				<?php
				if(isset($genresList)){
					foreach ( $genresList as $genre) {
						echo '<label><input type="checkbox" name="genre[]" value="'.$genre->IDGenre.'">'.$genre->NameGenre.'</label><br>';
					}
				}
				?>
				<br>
				<br>
				Best of collection:
				<input type="checkbox" name="bestOf">
			</div>
			<p class="footer"><input class="add-book" type="submit" name="submit" value="Add New Book"><br><a class="cancel" href="<?php echo $this->config->base_url(); ?>">Cancel &times;</a></p>
		</form>
	</div>
</body>
</html>
