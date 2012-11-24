<!DOCTYPE html>
<html>
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
	
			<div id="matches">
				<h1>Matches for Marty Stepp</h1>

		<?php
			$uploadName = str_replace(" ", "_", strtolower($_POST["name"]));
			$uploadName .= ".jpg";

			if ($_FILES["file"]["error"] > 0)
    		{
    			echo "Error: " . $_FILES["file"]["error"] . "<br />";
    		}

			if ( ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg"))
			  {
			  if ($_FILES["file"]["error"] > 0)
			    {
			    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			    }
			  else
			    {
			    if (file_exists("images/" . $uploadName))
			      {
			      echo $uploadName . " already exists. ";
			      }
			    else
			      {
			      move_uploaded_file($_FILES["file"]["tmp_name"],
			      "images/" . $uploadName);
			      }
			    }
			  }
			else
			{
			  echo "Invalid file";
			}

			function strToDict($str)
			{
				$arr = explode(",", $str);
				
				$dict["name"] = $arr[0];
				$dict["Sex"]  = $arr[1];
				$dict["Age"]  = $arr[2];
				$dict["Per"]  = $arr[3];
				$dict["OS"]   = $arr[4];
				$dict["Seek"] = $arr[5];
				$dict["st"]   = $arr[6];
				$dict["fi"]   = $arr[7];

				return $dict;
			}

			function calc($Single, $Register) 
			{
				$result = 0;

				if ($Single["st"] >= $Register["Age"] && $Single["fi"] <= $Register["Age"]) $result = $result + 1;
				if ($Single["OS"] == $Register["OS"]) 	$result = $result + 2;
					
				for ($i=0; $i < 4; $i++) 
					if ($Single["Per"][$i] == $Register["Per"][$i])
						$result = $result + 1;

				if ($Register["Sex"] == "M")
					if ($Single["Seek"][0] != "M") $result = 0;
				
				if ($Register["Sex"] == "F")
				{
					$str = $Single["Seek"];
					if ($str[strlen($str)-1] != "F") $result = 0;
				}
				return $result;
			}

			function shortSex($value)
			{
				if ($value == "Male") return "M";
				if ($value == "Famle") return "F";
				return "";
			}

			function makeSeeking()
			{
				$str = "";
				if ($_POST["Seek_Male"] == "on")   $str .= "M";
				if ($_POST["Seek_Female"] == "on")  $str .= "F";
				return $str;
			}

			function saveToTXT()
			{
				$name = $_POST["name"];
				$sex  = shortSex($_POST["Sex"]);
				$age  = $_POST["Age"];
				$Per  = $_POST["Personalitytype"];
				$OS   = $_POST["OS"];
				$Seek = makeSeeking();
				$se_st= $_POST["st"];
				$se_fi= $_POST["fi"];

			
				$current = file_get_contents("singles.txt");
				$current .= "\n$name,$sex,$age,$Per,$OS,$Seek,$se_st,$se_fi";
				file_put_contents("singles.txt", $current);
				return strToDict("$name,$sex,$age,$Per,$OS,$Seek,$se_st,$se_fi");
			}
			
			$arr = file("singles.txt");
			$Single = saveToTXT();

			foreach ($arr as $item) {
				$dict = strToDict($item);
				$res = calc($Single, $dict);

				if ($res > 2) 
				{
					$jpgname = str_replace(" ", "_", strtolower($dict["name"]));
					$jpgname .= ".jpg";

					$jpgfiles = glob("images/*.jpg");
					$flag = 0;
					foreach ($jpgfiles as $jpgfile) {
						$tmp = explode('/', $jpgfile);
						if ($jpgname == $tmp[1])
						{
							$flag = 1;
							break;
						}
					}

					if ($flag == 0)
					{
						$jpgname = "default_user.jpg";
					}

					?>

					<div class="match">
					<p class="name">
						<img src="images/<?= $jpgname?>" alt="<?= $dict["name"] ?>" />
						<?= $dict["name"] ?>
					</p>

					<p class="info">
						<strong>gender:</strong>  <?= $dict["Sex"] ?> <br />
						<strong>age:</strong>     <?= $dict["Age"] ?> <br />
						<strong>type:</strong>    <?= $dict["Per"] ?> <br />
						<strong>OS:</strong>      <?= $dict["OS"] ?> <br />
						<strong>rating:</strong>  <?= $res ?>
					</p>
				</div>
			</div>
		</div>

					<?php
				}
			}
			


		?>

		

				
		
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
