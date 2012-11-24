<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TMNT - Rancid Tomatoes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
			$movie = $_REQUEST["film"];
			$infoArr = file("$movie/info.txt");
			$reviewArr = glob("$movie/review*.txt");

		?>
		<div class = "title_image">
			<img src="http://222.200.185.14/public/hw2/banner.png" alt="Rancid Tomatoes" />
		</div>

		<h1 class = "title_text"><?=$infoArr[0]?> (<?= $infoArr[1] ?>)</h1>
		
		<div class = "body_context">
			<div class = "body_left">
				<div class="left_top">
					<div class = "left_top_image">
						<?php
							if (trim($infoArr[2]) > 60)
								echo '<img src="http://222.200.185.14/public/hw3/freshbig.png" alt="Freshbig" />';
							else
								echo '<img src="http://222.200.185.14/public/hw3/rottenbig.png" alt="Rotten" />';
						?>
					</div>
					<div class="left_top_text1">
						<p class = "percent"> <?= trim($infoArr[2]) ?>%</p> 
					</div>
					<div class="left_top_text2">
						<p class = "cnt"> (<?= $infoArr[3] ?> reviews total) </p>
					</div>
				</div>
				<div class = "left">
					<?php
						for ($i=0; $i < count($reviewArr)/2; $i++) { 
							$review = file($reviewArr[$i]);
							
					?>
					<div class="block">
						<div class= "review">
							<img class = "img" src="http://222.200.185.14/public/hw2/<?=strtolower($review[1])?>.gif" alt="<?=$review[1]?>" />
						<q><?=$review[0]?></q>
						</div>
						<div class= "name">
							<img class = "img" src="http://222.200.185.14/public/hw2/critic.gif" alt="Critic" />
							<?=$review[2]?> <br />
							<?=$review[3]?>
						</div>
					</div>
					<?php	
						}
					?>
				</div>	
				
				<div class="right">
					<?php
						for ($i=count($reviewArr)/2+1; $i < count($reviewArr); $i++) { 
							$review = file($reviewArr[$i]);
							
					?>
					<div class="block">
						<div class= "review">
							<img class = "img" src="http://222.200.185.14/public/hw2/<?=strtolower($review[1])?>.gif" alt="<?=$review[1]?>" />
						<q><?=$review[0]?></q>
						</div>
						<div class= "name">
							<img class = "img" src="http://222.200.185.14/public/hw2/critic.gif" alt="Critic" />
							<?=$review[2]?> <br />
							<?=$review[3]?>
						</div>
					</div>
					<?php	
						}
					?>
				</div>
				
			</div>

			<div class="body_right">
				<div>
					<img src="<?=$movie?>/generaloverview.png" alt="general overview" />
				</div>
				<dl>
					<?php
						$overview = file("$movie/generaloverview.txt");
						foreach ($overview as $item) {
							$str = explode(":", $item);
							echo "<dt>$str[0]<dt>";
							echo "<dd>$str[1]<dt>";
						}
					?>
				</dl>	
			</div>
			
			<div class="body_footer">	
				<p style = "float = none">(1-<?=count($reviewArr)?>) of <?= $infoArr[3] ?></p>
			</div>
		</div>
		<div id="w3c">
			<a href="http://validator.w3.org/check/referer">
				<img src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" /></a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS" /></a>
		</div>
	</body>
</html>