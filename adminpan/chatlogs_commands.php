<?php
	include_once "includes/head.php";
	include_once "includes/header.php";
	include_once "includes/navi.php";
	admin::CheckRank(3);
?>
<aside class="right-side">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						Commands Log<br>
						<form name="mygallery" action="" method="POST">
						</header>
						<div class="panel-body">
							<table class="table table-striped table-bordered table-condensed">
								<b>	<strong><tr><td><b>User ID</b></td><td><b>Command</b></td><td><b>Params</b></td><td><b>Timestamp</b></td></b>
								<tbody>
								<?php
									$getArticles = $dbh->prepare("SELECT * FROM commandlogs");
									$getArticles->execute();
									while($news = $getArticles->fetch())
									{
										echo'<tr>
										<td style="width: 13%;">'.$news["user_id"].'</td>
										<td style="width: 7%;">'.$news["command"].'</td>
										<td style="width: 25%;">'.filter($news["params"]).'</td>
										<td>'. gmdate('d-m-Y, H:i ', $news['timestamp']).'</td>
										';
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php
				include_once "includes/footer.php";
				include_once "includes/script.php";
			?>							