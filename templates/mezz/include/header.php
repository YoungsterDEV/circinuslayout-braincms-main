<body class="container">
	<script src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/scripts/page-load.js?release-0.0.1"></script>
    <div class="page-content">
		<?php if(!loggedIn()) { ?>
        <header class="page-content-header pixelated">
            <div class="page-content-max-width">
                <div class="page-content-header-column">
                    <p class="page-content-header-text">Online virtual community where you can create your own avatar, make friends, chat, create rooms and much more!</p>
                    <div class="page-content-header-buttons">
                        <a onclick="document.getElementById('login').style.display='block'" class="page-content-header-login-button">Login</a>
                        <span class="page-content-header-or">OR</span>
                        <a href="/registration" class="page-content-header-register-button">Create Account</a>
                    </div>
                </div>
            </div>
        </header>
		<?php if($navigatorID != "2") { ?>
        <div id="login" class="page-content-modal" style="z-index: 10;">
            <div class="page-content-modal-center">
                <div class="page-content-modal-center-form animate__animated animate__fadeInDown">
                    <div class="page-content-modal-center-form-head">
                        <h2 class="page-content-modal-center-form-head-title">Hello</h2>
                        <p class="page-content-modal-center-form-head-description">Currently <?= Game::usersOnline() ?> users are online.</p>
                        <i onclick="document.getElementById('login').style.display='none';" class="page-content-modal-center-form-head-close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="page-content-modal-center-form-head-close-icon"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </i>
                    </div>
                    <form method="post" class="page-content-modal-center-form-content">
                        <input type="text" id="username" name="username" class="page-content-modal-center-form-content-input" placeholder="Username">
                        <input type="password" id="password" name="password" class="page-content-modal-center-form-content-input" placeholder="Password">
                        <button type="submit" name="login" class="page-content-modal-center-form-content-button-login">Let's Go</button>
                        <a href="/registration" class="page-content-modal-center-form-content-button-register">Don't have an account? Join now!</a>
                    </form>
                </div>
            </div>
        </div>
		<?php User::Login(); ?>
		<?php } ?>
		<?php } else { ?>
		<div class="page-content-user-space">
			<div class="page-content-max-width space-between">
				<div class="page-content-user-space-left-side">
				<div class="page-content-user-space-left-side-item">
						<span class="page-content-user-space-left-side-item-icon credits"></span>
						<div class="page-content-user-space-left-side-item-column">
							<p class="page-content-user-space-left-side-item-text bold"><?= User::userData('credits') ?></p>
							<p class="page-content-user-space-left-side-item-text">Credits</p>
						</div>
					</div>
					<div class="page-content-user-space-left-side-item">
						<span class="page-content-user-space-left-side-item-icon duckets"></span>
						<div class="page-content-user-space-left-side-item-column">
							<p class="page-content-user-space-left-side-item-text bold"><?= User::userData('activity_points') ?></p>
							<p class="page-content-user-space-left-side-item-text">Duckets</p>
						</div>
					</div>
					<div class="page-content-user-space-left-side-item">
						<span class="page-content-user-space-left-side-item-icon diamonds"></span>
						<div class="page-content-user-space-left-side-item-column">
							<p class="page-content-user-space-left-side-item-text bold"><?= User::userData('vip_points') ?></p>
							<p class="page-content-user-space-left-side-item-text">Diamonds</p>
						</div>
					</div>
				</div>
				<div class="page-content-user-space-right-side">
					<?php if(User::userData('rank') >= 5) { ?>
					<div class="page-content-user-space-right-side-item">
						<a href="/adminpan/dash" target="_blank" class="page-content-user-space-right-side-item-nav panel">Housekeeping</a>
					</div>
					<?php } ?>
					<div class="page-content-user-space-right-side-item">
						<div onclick="dropdown()" class="page-content-user-space-right-side-item-nav">
							<span class="page-content-user-space-right-side-item-nav-figure pixelated" style="background-image: url('<?php echo $config['avatarImager'] ?><?= User::userData('look') ?>&action=std&direction=2&head_direction=2&img_format=undefined&gesture=sml&headonly=1&size=b')"></span>
							<span class="page-content-user-space-right-side-item-nav-username"><?= User::userData('username') ?></span>
							<button class="page-content-user-space-right-side-item-nav-hidden-button"></button>
						</div>
						<div id="user-space-dropdown" class="page-content-user-space-right-side-item-dropdown-content">
							<a class="page-content-user-space-right-side-item-sub-text" href="/profile/<?= User::userData('username') ?>">My Profile</a>
							<a class="page-content-user-space-right-side-item-sub-text" href="/settings/mail">Settings</a>
							<a class="page-content-user-space-right-side-item-sub-text" href="#help" target="_blank">Help</a>
							<a class="page-content-user-space-right-side-item-sub-text" href="/logout">Logout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<header class="page-content-header pixelated">
            <div class="page-content-max-width">
                <div class="page-content-header-column space-between" style="flex-direction: row;">
                    <span class="page-content-header-figure" style="background-image: url('<?php echo $config['avatarImager'] ?><?= User::userData('look') ?>&direction=2&head_direction=3&gesture=sml&action=wav&size=l')"></span>
                    <div class="page-content-header-buttons">
						<?php if(!empty($config['buttonNitro'])) { ?><a href="/hotel" class="page-content-header-default-button"><?= $config['buttonNitro'] ?></a><?php } ?>
						<?php if(!empty($config['buttonNitroReact'])) { ?><a href="/hotelv2" class="page-content-header-default-button"><?= $config['buttonNitroReact'] ?></a><?php } ?>
                        <?php if(!empty($config['buttonFlash'])) { ?><a onclick="document.getElementById('download').style.display='block';" class="page-content-header-default-button"><?= $config['buttonFlash'] ?></a><?php } ?>
                    </div>
                </div>
            </div> 
        </header>
		<div id="download" class="page-content-modal">
            <div class="page-content-modal-center">
                <div class="page-content-modal-center-form animate__animated animate__fadeInDown">
                    <div class="page-content-modal-center-form-head">
                        <h2 class="page-content-modal-center-form-head-title">Play with the <?= $config['hotelName'] ?> app</h2>
                        <p class="page-content-modal-center-form-head-description">Access <?= $config['hotelName'] ?> via the app.</p>
                        <i onclick="document.getElementById('download').style.display='none';" class="page-content-modal-center-form-head-close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="page-content-modal-center-form-head-close-icon"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </i>
                    </div>
                    <div class="page-content-modal-center-form-content">
                        <a href="/flash" class="page-content-modal-center-form-content-button-launch">Launch Hotel</a>
						<div class="page-content-modal-center-form-content-box">
							<p class="page-content-modal-center-form-content-box-text">You are currently logging in with <?= User::userData('username') ?> account.</p>
							<div class="page-content-modal-center-form-content-box-row">
								<img src="<?php echo $config['avatarImager'] ?><?= User::userData('look') ?>&action=std&direction=2&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=b" alt="<?= User::userData('username') ?> Avatar" class="page-content-modal-center-form-content-box-figure">
								<div class="page-content-modal-center-form-content-box-column">
									<p class="page-content-modal-center-form-content-box-username"><?= User::userData('username') ?></p>
									<p class="page-content-modal-center-form-content-box-motto"><?= User::userData('motto') ?></p>
								</div>
							</div>
						</div>
                        <p class="page-content-modal-center-form-content-text">Haven't downloaded the <?= $config['hotelName'] ?> app yet?</p>
                        <?php if(!empty($config['buttonDownloadForWindows'])) { ?><a href="<?= $config['buttonDownloadForWindows'] ?>" target="_blank" class="page-content-modal-center-form-content-button-download">Download for Windows</a><?php } ?>
                        <?php if(!empty($config['buttonDownloadForMac'])) { ?><a href="<?= $config['buttonDownloadForMac'] ?>" target="_blank" class="page-content-modal-center-form-content-button-download">Download for Mac</a><?php } ?>
                        <a href="#" target="_blank" class="page-content-modal-center-form-content-button-help">Help</a>
                    </div>
                </div>
            </div>
        </div>
		<?php
		if($config['updateNotifications'] == true) {
		if($version==$script) {
		}
		else if(User::userData('rank') >= 7) {
		echo '
			<div id="new-version" class="page-content-modal" style="display: block;">
            <div class="page-content-modal-center">
                <div class="page-content-modal-center-form animate__animated animate__fadeInDown" style="width: 400px;">
                    <div class="page-content-modal-center-form-head">
						<span class="page-content-modal-center-form-head-image"></span>
                        <h2 class="page-content-modal-center-form-head-title">New version available</h2>
                        <p class="page-content-modal-center-form-head-description" style="padding: 0 25px;">Would you like to take your hotel to the next level?</p>
                        <i onclick="document.getElementById(&#039;new-version&#039;).style.display=&#039;none&#039;;" class="page-content-modal-center-form-head-close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="page-content-modal-center-form-head-close-with-image-icon"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </i>
						<div class="page-content-modal-center-form-content" style="padding: 20px 25px; width: 100%;">
							<a href="https://devnitro.gq/release-notes.txt" target="_blank" class="page-content-modal-center-form-content-button-default">Release Notes</p>
							<a href="/update" target="_blank" class="page-content-modal-center-form-content-button-buy">Update</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
		';
		}
		}
		?>
		<?php } ?>