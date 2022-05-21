<?php
if ($navigatorID == 1) { // Index
	if ($subNavigatorID == 1) {
		echo 'Virtual World, Avatar Chat and Pixel Art';
	}
}
	
else if ($navigatorID == 2) { // Registration
	if ($subNavigatorID == 1) {
		echo 'Registration';
	}
}

else if ($navigatorID == 3) { // Community
	if ($subNavigatorID == 1) {
		echo 'Photos';
	}
	
	if ($subNavigatorID == 2) {
		echo 'Rooms';
	}
	
	if ($subNavigatorID == 3) {
		echo 'Fansites';
	}
	
	if ($subNavigatorID == 4) {
		echo 'Staffs';
	}
	
	if ($subNavigatorID == 5) {
		echo 'News';
	}
}

else if ($navigatorID == 4) { // Highscores
	if ($subNavigatorID == 1) {
		echo 'Highscores';
	}
}

else if ($navigatorID == 5) { // Shop
	if ($subNavigatorID == 1) {
		echo 'Shop';
	}
}

else if ($navigatorID == 6) { // Playing Habbo
	if ($subNavigatorID == 1) {
		echo 'What is Habbo';
	}
	
	if ($subNavigatorID == 2) {
		echo 'How to Play';
	}
	
	if ($subNavigatorID == 3) {
		echo 'Habbo Way';
	}
	
	if ($subNavigatorID == 4) {
		echo 'Safety';
	}
}

else if ($navigatorID == 7) { // Profile
	if ($subNavigatorID == 1) {
		echo userHome('username');
	}
}

else if ($navigatorID == 8) { // Hotel
	if ($subNavigatorID == 1) {
		echo 'Hotel';
	}
}

else if ($navigatorID == 9) { // Settings
	if ($subNavigatorID == 1) {
		echo 'Change Email Address';
	}
	
	if ($subNavigatorID == 2) {
		echo 'Change Password';
	}
	
	if ($subNavigatorID == 3) {
		echo 'My Avatars';
	}
	
	if ($subNavigatorID == 4) {
		echo 'My Wardrobe';
	}
}

else if ($navigatorID == 10) { // Not found
	if ($subNavigatorID == 1) {
		echo 'Not found';
	}
}

else if ($navigatorID == 11) { // Banned
	if ($subNavigatorID == 1) {
		echo 'Banned';
	}
}

else if ($navigatorID == 12) { // Update
	if ($subNavigatorID == 1) {
		echo 'Update';
	}
}

else if ($navigatorID == 13) { // NFT
	if ($subNavigatorID == 1) {
		echo 'NFT Avatars';
	}
}

else if ($navigatorID == 14) { // License
	if ($subNavigatorID == 1) {
		echo 'License';
	}
}
?>