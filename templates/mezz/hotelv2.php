<?php
    staffCheck();
    Game::sso('client');    
    Game::homeRoom();
	$navigatorID = 8;
	$subNavigatorID = 1;
	include 'include/head.php';
?>
<body class="container">
<?php
	if (empty(User::userData('username'))) { include 'include/choose-style.php'; } else {
?>
	<style>
	body{
		line-height:normal!important;
		background-color:#0E151C;
		margin:auto;
	}
		
	#client-ui{
		display: block;
		background: #000;
		border: none;
		height: 100vh;
		width: 100vw;
	}
	</style>
	 <iframe id="client-ui" src="<?php echo $config['hotelUrl'] ?>/nitro/client/react/index.html?sso=<?= User::userData('auth_ticket') ?>"></iframe>
<?php } ?>
</body>
</html>
</div>
</head>