<!DOCTYPE html>
<body style="margin-top: -20px;" class="skin-black">
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<aside class="left-side sidebar-offcanvas">
			<section class="sidebar">
				<ul class="sidebar-menu">
					<?php
						if (User::userData('rank') > '4')
						{
							echo'<li>
							<a href="'.$config['hotelUrl'].'/adminpan/dash">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
							</li>';
						}

						if (User::userData('rank') > '5')
						{
							echo'	
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/news">
							<i class="fa fa-newspaper-o"></i> <span>News</span>
							</a>
							</li>
							';
						}

						if (User::userData('rank') > '4')
						{
							echo'	
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/zoekgebruiker">
							<i class="fa fa-user"></i> <span>Edit A User</span>
							</a>
							</li>
							';
						}

						if (User::userData('rank') > '4')
						{
							echo'
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/rooms">
							<i class="fa fa-home "></i> <span>Rooms</span>
							</a>
							</li>
								<li>
							<a href="'.$config['hotelUrl'].'/adminpan/wordfilter">
							<i class="fa fa-filter"></i> <span>Word Filters</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/chatlogs">
							<i class="fa fa-folder-o"></i> <span>Chatlogs</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/chatlogs_console">
							<i class="fa fa-desktop"></i> <span>Private Messages</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/chatlogs_commands">
							<i class="fa fa-desktop"></i> <span>Commands Logs</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/tradelogs">
							<i class="fa fa-desktop"></i> <span>Trade Logs</span>
							</a>
							</li>
							<li>
							<a href="'.$config['hotelUrl'].'/adminpan/bans">
							<i class="fa fa-users"></i> <span>Banlist</span>
							</a>
							</li>';
						}
					?>
				
				</ul>
			</section>
		</aside>							