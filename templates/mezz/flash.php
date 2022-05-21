<?php
    staffCheck();
    Game::sso('client');    
    Game::homeRoom();
	$navigatorID = 8;
	$subNavigatorID = 1;
?>
<body class="container">
	<style>
	.container {
		padding: 0;
		margin: 0;
	}
	</style>
	<script src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/scripts/flash-client/jquery-latest.js" type="text/javascript"></script>
	<script src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/scripts/flash-client/jquery-ui.js" type="text/javascript"></script>
	<script src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/scripts/flash-client/flashclient.js"></script>
	<script src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/scripts/flash-client/client.js" type="text/javascript"></script>
	<div id="client-ui">
		<div class="client" id="client"></div>
	</div>
	<script>
		var Client = new SWFObject("<?php echo $config['hotelUrl'] ?>/swf/gordon/PRODUCTION/Nitro.swf", "client", "100%", "100%", "10.0.0");
		Client.addVariable("client.allow.cross.domain", "0"); 
		Client.addVariable("client.notify.cross.domain", "1");
		Client.addVariable("connection.info.host", "<?php echo $config['hotelIP'] ?>");
		Client.addVariable("connection.info.port", "<?php echo $config['hotelPort'] ?>");
		Client.addVariable("site.url", "<?php echo $config['hotelUrl'] ?>");
		Client.addVariable("url.prefix", "<?php echo $config['hotelUrl'] ?>"); 
		Client.addVariable("client.reload.url", "<?php echo $config['hotelUrl'] ?>");
		Client.addVariable("client.fatal.error.url", "<?php echo $config['hotelUrl'] ?>");
		Client.addVariable("client.connection.failed.url", "<?php echo $config['hotelUrl'] ?>");
		Client.addVariable("external.override.texts.txt", "<?php echo $config['hotelUrl'] ?>/swf/gamedata/override/external_flash_override_texts.txt?release-0.0.1"); 
		Client.addVariable("external.override.variables.txt", "<?php echo $config['hotelUrl'] ?>/swf/gamedata/override/external_override_variables.txt?release-0.0.1"); 	
		Client.addVariable("external.variables.txt", "<?php echo $config['hotelUrl'] ?>/swf/gamedata/external_variables.txt?release-0.0.6");
		Client.addVariable("external.texts.txt", "<?php echo $config['hotelUrl'] ?>/swf/gamedata/external_flash_texts.txt?release-0.0.1"); 
		Client.addVariable("external.figurepartlist.txt", "<?php echo $config['hotelUrl'] ?>/swf/gamedata/figuredata.xml?release-0.0.3"); 
		Client.addVariable("flash.dynamic.avatar.download.configuration", "<?php echo $config['hotelUrl'] ?>/swf/gamedata/figuremap.xml?release-0.0.3");
		Client.addVariable("productdata.load.url", "<?php echo $config['hotelUrl'] ?>/swf/gamedata/productdata.txt?release-0.0.1"); 
		Client.addVariable("furnidata.load.url", "<?php echo $config['hotelUrl'] ?>/swf/gamedata/furnidata.xml");
		Client.addVariable("use.sso.ticket", "1"); 
		Client.addVariable("sso.ticket", "<?= User::userData('auth_ticket') ?>");
		Client.addVariable("processlog.enabled", "0");
		Client.addVariable("client.starting", "<?= $config['hotelName'] ?> is loading...");
		Client.addVariable("flash.client.url", "<?php echo $config['hotelUrl'] ?>/swf/gordon/PRODUCTION/"); 
		Client.addVariable("flash.client.origin", "popup");
		Client.addVariable("ads.domain", "");
		Client.addVariable("diamonds.enabled", '1');
		Client.addParam('base', '<?php echo $config['hotelUrl'] ?>/swf/gordon/PRODUCTION/Nitro.swf');
		Client.addParam('allowScriptAccess', 'always');
		Client.addParam('wmode', "opaque");
		Client.write('client');
		FlashExternalInterface.signoutUrl = "<?php echo $config['hotelUrl'] ?>/logout";
	</script>
</body>
</html>