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
		

		
		<div id="listarea">
			<ul id="musiclist">
				<?php
					$files = glob("songs/*.mp3");
					foreach ($files as $items) {
						$arr = explode('/', $items);
				?>

				<li class="mp3item">
					<a href= <?= $items ?> > <?= $arr[1] ?></a>

					(<?= filesize($items) ?> b)
					
				</li>

				<?php
					}
				?>

				<?php 
					
				?>
				<li class="playlistitem">
					<a href="music.php?playlist=mypicks.txt">mypicks.txt</a>
				</li>

				<li class="playlistitem">
					<a href="music.php?playlist=playlist.txt">playlist.txt</a>
				</li>
			</ul>
		</div>
	</body>
</html>

