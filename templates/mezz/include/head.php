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
	<meta name="twitter:creator" content="@habbo">
	<meta name="twitter:image:src" content="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/website/app_summary_image.png">
	<meta name="og:title" content="<?= $config['hotelName'] ?>">
	<meta name="og:description" content="Join millions in the planet's most popular virtual world for teens. Create your avatar, meet new friends, role play, and build amazing spaces.">
	<meta name="og:image" content="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/website/app_summary_image.png">
	<meta name="og:url" content="<?= $config['hotelUrl'] ?>">
	<meta name="og:site_name" content="<?= $config['hotelName'] ?>">
	<meta name="og:type" content="website">
	<link rel="stylesheet" type="text/css" href="<?= $config['hotelUrl'] ?>/templates/mezz/assets/styles/app.css?release-0.0.2">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="shortcut icon" href="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/website/favicon.ico" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<?php if($page == "registration") { ?><script src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/scripts/registration.js?release-0.0.1"></script><?php } ?>
	<?php if($page == "hotel" || $page == "hotelv2") { ?><script src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/scripts/registration-checker.js?release-0.0.1"></script><?php } ?>
	<?php if($navigatorID == 13) { ?><script src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/scripts/create-nft.js?release-0.0.1"></script><?php } ?>
	<script type="text/javascript">var language = '<?php echo $config['lang']; ?>';</script>
	<title><?php include 'head-title.php'; ?> - <?= $config['hotelName'] ?></title>
</head>
<?php define('REMOTE_VERSION', 'https://devnitro.gq/latest-version.txt'); define('VERSION', '1.0.5'); $script = file_get_contents(REMOTE_VERSION); $version = VERSION; ?>