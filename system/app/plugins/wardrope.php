<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function wardrope()
	{
		global $dbh,$config,$lang,$emuUse;
		if (isset($_POST['editlook']))
		{
			$getUserLook = $dbh->prepare("SELECT * from users_wardrobe WHERE figure = :lookid and user_id = :userid ");
			$getUserLook->bindParam(':lookid', $_POST['lookid']);
			$getUserLook->bindParam(':userid', $_SESSION['id']);
			$getUserLook->execute();
			if ($getUserLook->RowCount())
			{
				$getUserLookData = $getUserLook->fetch();
				$updateUserLook = $dbh->prepare("UPDATE users SET look = :look WHERE id = :id");
				$updateUserLook->bindParam(':look', $getUserLookData['figure']);
				$updateUserLook->bindParam(':id', $_SESSION['id']);
				$updateUserLook->execute(); 
				$url = $_SERVER['REQUEST_URI'];
				header('Location: '.$url.'#look');
			}
			else
			{
				return html::error('This is not allowed!');
			}
		}
	}
?>