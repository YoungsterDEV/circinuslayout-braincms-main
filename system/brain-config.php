<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	
	/* Database Setting */
	$db['host'] = '127.0.0.1';
	$db['port'] = '3306';
	$db['user'] = "root";
	$db['pass'] = 'nitromarketplace';
	$db['db'] = "nitromarketplace";
	
	/* Emulator Settings */
	$config['hotelEmu'] = 'arcturus';
	$config['hotelIP'] = '20.203.185.59';
	$config['hotelPort'] = '3000';
	
	/* Client Settings */
	$hotel['homeRoom'] = '1';
	
	/* Website Setting */
	$config['hotelUrl'] = "https://devnitro.gq";
	$config['defaultClient'] = "hotelv2"; //hotel (Nitro) or hotelv2 (NitroV2)
	$config['skin'] = "mezz";
	$config['lang'] = "en";
	$config['hotelName'] = "Habbo";
	$config['maintenance'] = false; // This closes the hotel and sets it up so that only staff can enter.
	$config['maintenancekMinimumRankLogin'] = 4;
	$config['updateNotifications'] = true; //Displays update notifications to staff when a new update is available
	$config['avatarImager'] = 'https://devnitro.gq/?figure=';
	$config['brainversion'] = '1.8.1'; // Please do not change.
	
	/* Button Settings */
	$config['buttonNitro'] = "Hotel"; // If you don't have Nitro V1 version, remove Hotel text.
	$config['buttonNitroReact'] = "Hotel V2"; // If you don't have Nitro V2 version, remove Hotel V2 text.
	$config['buttonFlash'] = "Download"; // If you don't have flash version, remove Download text.
	$config['buttonDownloadForWindows'] = "https://mega.nz/file/j64QUTjR#7bH9UEAUy-AIipNeHQuBUpTlq5XFeYKG9Fc8I6Db4to"; // If you don't have download link for Windows, remove text.
	$config['buttonDownloadForMac'] = "#"; // If you don't have download link for Windows, remove text.
	
	/* NFT Avatars */
	$config['nft'] = true;
	$config['sellAvatarCount'] = "50";
	$config['sellAvatarMinRank'] = "1";
	
	/* Register Setting */
	$config['home_room'] = "29";
	$config['look']	= "ch-210-66.lg-270-1338.sh-290-1408.hr-100-39.hd-180-1"; // Please do not change.
	$config['motto'] = "Hello :)";
	$config['credits']	= "25000";  //Credits
	$config['activity_points']	= "50000"; // Duckets
	$config['vip_points']	= "50"; // Diamonds
	$config['registerEnable'] = true;
	
	
	switch($config['hotelEmu'])
	{
		case "arcturus":
		$emuUse['user_wardrobe']  = 'users_wardrobe ';
		$emuUse['ip_last'] = 'ip_current';
		$emuUse['respect'] = 'respects_received';
		$emuUse['user_stats'] = 'users_settings';
		$emuUse['user_stats_user_id'] = 'user_id';
		$emuUse['OnlineTime'] = 'online_time';
		break;
		case "plusemu":
		$emuUse['user_wardrobe']  = 'user_wardrobe ';
		$emuUse['ip_last'] = 'ip_last';
		$emuUse['respect'] = 'Respect';
		$emuUse['user_stats'] = 'user_stats';
		$emuUse['user_stats_user_id'] = 'id';
		$emuUse['OnlineTime'] = 'OnlineTime';
		break;
		default:
		//Nothing
		break;
	}
?>