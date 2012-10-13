<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/3-music/viewer.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		

		<?php
			if ($_GET["playlist"] != NULL)
			{
				$tmp = $_GET["playlist"];
				$arr = file(urldecode("songs/$tmp"));
				if ($_GET["shuffle"] == "on")
				{
					shuffle($arr);
				}
		?>

		<div id = "listarea">
			<ul id="musiclist">
				<?php
				foreach ($arr as $item) {	
					if ($item[0] != "#")
					{
						$fz = "songs/$item";
						$fz = substr($fz, 0, strlen($fz)-2);
				?>
				<li class="mp3item">
					<a href= <?= "\"songs/$item\"" ?> > <?= $item ?></a>
					(<?= filesize($fz)?> b)
				</li>
				<?php
					}
				}
				?>
			</ul>
		</div>

		<?php
			}
			else
			{
		?>

		
		<div id="listarea">
			<ul id="musiclist">
				<?php
					$files = glob("songs/*.mp3");
					if ($_GET["shuffle"] == "on")
					{
						shuffle($files);
					}
					foreach ($files as $items) {
						$arr = explode('/', $items);
				?>

				<li class="mp3item">
					<a href= <?= "\"$items\"" ?> > <?= $arr[1] ?></a>

					(<?= filesize($items) ?> b)
					
				</li>

				<?php
					}
					$files = glob("songs/*.m3u");
					foreach ($files as $items) {
						$arr = explode('/', $items);
						$tmp = urlencode($arr[1]);
				?>
				<li class="playlistitem">
					<a href=<?= "music.php?playlist=$tmp" ?> > <?= $arr[1]?></a>
				</li>

				<?php
					}
				?>
			</ul>
		</div>
		<?php
			}
		?>
	</body>
</html>

