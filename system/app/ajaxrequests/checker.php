<?php
define('BRAIN_CMS', 1);	
include_once $_SERVER['DOCUMENT_ROOT'].'/global.php';
if (isset($_GET['q']) && isset($_GET['username']))
{
	$query = $dbh->prepare('SELECT username FROM users WHERE username = :username');
	$query->execute([':username' => $_GET['q']]);
	if ($query->rowCount() == 0)
	{
		echo "check-true";
	}
	else
	{
		echo "check-false";
	}
}