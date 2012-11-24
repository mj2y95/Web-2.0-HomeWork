<!DOCTYPE html>
<html>
	<!-- CSE 190 M Homework 4 (NerdLuv) -->
	<head>
		<title>NerdLuv</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="nerdluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="main">
			<div id="bannerarea">
				<img src="nerdluv.png" alt="banner logo" /> <br />
				where meek geeks meet
			</div>

	
			<form action = "results.php" method="POST" enctype="multipart/form-data">

				<fieldset>

					<legend> New User Signup: </legend>
					<div>
						<label>Name:</label>
						<input type="text" size = "16" name="name" class = "text"/>
					</div>

					<div>
						<label>Gender:</label>
						<input type="radio" name="Sex" value="Male"/> Male
						<input type="radio" checked="checked" name="Sex" value="Female" />Female
					</div>

					<div>
						<label>Age:</label>
						<input type="text" name = "Age" size = "5" maxlength= "2" class = "text"/>
					</div>

					<div>
						<label>Personality type:</label>
						<input type="text" name = "Personalitytype" size = "5" maxlength="4" class = "text"/>
						(<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>)
					</div>

					<div>
						<label>Favorite OS:</label>
						<select name="OS">
							<option value="Windows" selected="selected">Windows</option>
							<option value="Mac OS X">Mac OS X</option>
							<option value="Linux" >Linux</option>
							<option value="other">other</option>
						</select>
					</div>

					<div>
						<label> Photo: </label>
						<input type="file" name="file" id="file" class="text"/> 
					</div>

					<div id="seeking">
						<label>Seeking:</label>	
						<input type="checkbox" name="Seek_Male"  checked="checked"> Male
						<input type="checkbox" name="Seek_Female"> Female
					</div>

					<div>
						<label>Between ages:</label>
						<input type="text" name = "st" size = "5" maxlength="2" class = "text"/> and 
						<input type="text" name = "fi" size = "5" maxlength="2" class = "text"/>
					</div>

					<div>
						<input type="Submit" value = "Sign Up" class = "Submit">
					</div>
				</fieldset>
			</form>
		</div>
		
		<p>
			Results and page (C) Copyright 2009 NerdLuv Inc.
		</p>

		<div id="w3c">
			<a href="http://validator.w3.org/check/referer">
				<img src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" /></a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS" /></a>
		</div>
	</body>
</html>

	