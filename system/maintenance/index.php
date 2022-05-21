<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Join millions in the planet's most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
	<meta name="image" content="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/website/app_summary_image.png">
	<meta name="keywords" content="<?php echo "$website[keywords]"; ?>" />
	<meta itemprop="name" content="<?= $config['hotelName'] ?>">
	<meta itemprop="description" content="Join millions in the planet's most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
	<meta itemprop="image" content="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/website/app_summary_image.png">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Virtual World, Avatar Chat and Pixel Art - <?= $config['hotelName'] ?>">
	<meta name="twitter:description" content="Join millions in the planet's most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
	<meta name="twitter:site" content="<?= $config['hotelUrl'] ?>">
	<meta name="twitter:creator" content="@solwowhotel">
	<meta name="twitter:image:src" content="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/website/app_summary_image.png">
	<meta name="og:title" content="<?= $config['hotelName'] ?>">
	<meta name="og:description" content="Join millions in the planet's most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
	<meta name="og:image" content="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/website/app_summary_image.png">
	<meta name="og:url" content="<?= $config['hotelUrl'] ?>">
	<meta name="og:site_name" content="<?= $config['hotelName'] ?>">
	<meta name="og:type" content="website">
	<link rel="stylesheet" type="text/css" href="<?= $config['hotelUrl'] ?>/templates/mezz/assets/styles/app.css?release-0.0.7">
	<link rel="shortcut icon" href="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/website/favicon.ico" type="image/x-icon">
	<title>Maintenance - <?= $config['hotelName'] ?></title>
</head>
<body class="container">
	<script src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/scripts/page-load.js"></script>
    <div class="page-content">
        <header class="page-content-header pixelated">
            <div class="page-content-max-width">
                <div class="page-content-header-column">
                    <img src="https://habbofont.net/font/habbo_new_big/<?= $config['hotelName'] ?>.gif" alt="<?= $config['hotelName'] ?> Big Logo" class="page-content-header-logo">
                </div>
            </div> 
        </header>
        <div class="page-content-collider" style="background-color: transparent;">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content maintenance">
                        <div class="page-content-collider-content-maintenance-box">
                            <h2 class="page-content-collider-content-maintenance-box-title">Maintenance Break</h2>
                            <p class="page-content-collider-content-maintenance-box-text">Sorry! <?= $config['hotelName'] ?> is being worked on al. Use moment. We'll be back soon. We promise.</p>
                            <img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/maintenance/frank.png" alt="Maintenance" class="page-content-collide-item-content-maintenance-box-image">
                        </div>
						<iframe src="https://discord.com/widget?id=952572046196494426&theme=light" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
					</div>
                </div>
            </div>
        </div>
        <footer class="page-content-footer">
            <div class="page-content-footer-top-side">
                <div class="page-content-max-width space-between" style="align-items: flex-start;">
                    <div class="page-content-footer-column">
                        <img class="page-content-footer-logo" src="https://habbofont.net/font/habbo_big/<?= $config['hotelName'] ?>.gif">
                        <p class="page-content-footer-text"><?= $config['hotelName'] ?> is an online vintage pixel-art style virtual community where you can create your own avatar, make friends, chat, build rooms, design + play games and so much more! Almost anything is possible in this strange place full of awesome people…</p>
                    </div>
                    <div class="page-content-footer-column">
                        <h3 class="page-content-footer-title">Support</h3>
                        <a href="" class="page-content-footer-url">Help Center</a>
                        <a href="" class="page-content-footer-url">Recover Password</a>
                        <a href="mailto:ylmzofc@outlook.com" class="page-content-footer-url">ylmzofc@outlook.com</a>
                    </div>
                    <div class="page-content-footer-column">
                        <h3 class="page-content-footer-title">Security and Privacy</h3>
                        <a href="/playing-habbo/safety.php" class="page-content-footer-url">Safety</a>
                        <a href="" class="page-content-footer-url">Terms of Service</a>
                        <a href="" class="page-content-footer-url">Privacy Policy</a>
                        <a href="" class="page-content-footer-url">Cookie Policy</a>
                    </div>
                    <div class="page-content-footer-column">
                        <h3 class="page-content-footer-title">Desktop App</h3>
                        <p class="page-content-footer-text">Download the desktop app for easier access to the hotel.</p>
                        <a href="" class="page-content-footer-download-button">Download HabboApp</a>
                    </div>
                </div>
            </div>
            <div class="page-content-footer-bottom-side">
                <div class="page-content-max-width space-between" style="align-items: flex-start;">
                    <span class="page-content-footer-title copyright">&copy; <script>var date=new Date();var year=date.getFullYear();document.write(year);</script> Habbo Hotel.</span>
                    <p class="page-content-footer-text copyright">All rights reserved. Design and coding by <a href="https://yilmazev.github.io" target="_blank" class="page-content-footer-url hugoyin">Hugoyin</a>.</p>
                </div>
            </div>
        </footer>
    </div>
	<?php if(loggedIn()){ if(strlen(User::userData('username')) == 0) { header('Location: /' . $config['defaultClient'] .''); } } ?>
	<?php if($page == "profile") { ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<?php } ?>
	<script src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/scripts/app.js"></script>
</body>
</html>