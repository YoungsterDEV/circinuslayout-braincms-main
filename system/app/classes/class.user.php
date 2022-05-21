<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	
	class User 
	{
		public static function checkUser($password, $passwordDb, $username)
		{
			global $dbh;
			if (substr($passwordDb, 0, 1) == "$") 
			{
				if (password_verify($password, $passwordDb))
				{
					return true;
				}
				return false;
			}
			else 
			{
				$passwordBcrypt = self::hashed($password);
				if (md5($password) == $passwordDb) 
				{	
					$stmt = $dbh->prepare("UPDATE users SET password = :password WHERE username = :username");
					$stmt->bindParam(':username', $username); 
					$stmt->bindParam(':password', $passwordBcrypt); 
					$stmt->execute(); 
					return true;
				}
				return false;	
			}
		}
		public static function hashed($password)
		{	
			return password_hash($password, PASSWORD_BCRYPT);
		}
		public static function validName($username)
		{
			if(strlen($username) <= 12 && strlen($username) >= 3 && ctype_alnum($username))
			{
				return true;
			}
			return false;
		}
		public static function userData($key)
		{
			global $dbh,$config;
			if (loggedIn())
			{
				if ($config['hotelEmu'] == 'arcturus')
				{
					if ( in_array($key, array('activity_points', 'vip_points')) )
					{
						switch($key)
						{
							case "activity_points":
							$key = '0';
							break;
							case "vip_points":
							$key = '5';
							break;
							default:
							break;
						}
						$stmt = $dbh->prepare("SELECT ".$key.",user_id,type,amount FROM users_currency WHERE user_id = :id AND type = :type");
						$stmt->bindParam(':id', $_SESSION['id']);
						$stmt->bindParam(':type', $key);
						$stmt->execute();
						if ($stmt->RowCount() > 0)
						{
							$row = $stmt->fetch();
							return $row['amount'];
						}
						else
						{
							return '0';
						}
					}
					else
					{	
						$stmt = $dbh->prepare("SELECT ".$key." FROM users WHERE id = :id");
						$stmt->bindParam(':id', $_SESSION['id']);
						$stmt->execute();
						$row = $stmt->fetch();
						return filter($row[$key]);
					}
				}
				else
				{
					$stmt = $dbh->prepare("SELECT ".$key." FROM users WHERE id = :id");
					$stmt->bindParam(':id', $_SESSION['id']);
					$stmt->execute();
					$row = $stmt->fetch();
					return filter($row[$key]);
				}
			}
		}
		public static function emailTaken($email)
		{
			global $dbh;
			$stmt = $dbh->prepare("SELECT mail FROM users WHERE mail = :email LIMIT 1");
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			if ($stmt->RowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public static function nftTaken($nft_figure)
		{
			global $dbh;
			$nft_figure = User::userData('look');
			$stmt = $dbh->prepare("SELECT figure FROM cms_nft WHERE figure = :figure LIMIT 1");
			$stmt->bindParam(':figure', $nft_figure);
			$stmt->execute();
			if ($stmt->RowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public static function userTaken($username)
		{
			global $dbh;
			$stmt = $dbh->prepare("SELECT username FROM users WHERE username = :username LIMIT 1");
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			if ($stmt->RowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public static function refUser($refUsername)
        {
            global $dbh, $lang;
            $getUsernameRef = $dbh->prepare("SELECT username,ip_register FROM users WHERE username = :username LIMIT 1");
            $getUsernameRef->bindParam(':username', $refUsername);
            $getUsernameRef->execute();
            $getUsernameRefData = $getUsernameRef->fetch();
            if ($getUsernameRef->RowCount() > 0)
            {
                if ($getUsernameRefData['ip_register'] == userIp())
                {
                    //html::error($lang["RsameIpRef"]);
                    echo 'ref_error';
                }
                else
                {
                    return true;
                }
            }
            else
            {   
                //html::error($lang["RnotExist"]);
                echo 'ref_error';
                return false;
            }
		}
		public static function login()
		{
			global $dbh,$config,$lang,$emuUse;
			if (isset($_POST['login']))
			{
				if (!empty($_POST['username']))
				{
					if (!empty($_POST['password']))
					{
						$stmt = $dbh->prepare("SELECT id, password, username, rank FROM users WHERE username = :username");
						$stmt->bindParam(':username', $_POST['username']); 
						$stmt->execute();
						if ($stmt->RowCount() == 1)
						{
							$row = $stmt->fetch();
							if (self::checkUser($_POST['password'], $row['password'],$row['username']))
							{	
								$_SESSION['id'] = $row['id'];
								if (!$config['maintenance'] == true)
								{
									$userUpdateIp = $dbh->prepare("UPDATE users SET ".$emuUse['ip_last']." = :userip WHERE id = :id");
									$userUpdateIp->bindParam(':id', $_SESSION['id']);
									$userUpdateIp->bindParam(':userip', userIp());
									$userUpdateIp->execute(); 
									//User Session Log//
									$insertUserSession = $dbh->prepare("
									INSERT INTO
									user_session_log
									(userid,ip,date,browser)
									VALUES
									(
									:userid, 
									:ip,
									:date,
									:browser
									)");
									$insertUserSession->bindParam(':userid', $_SESSION['id']);
									$insertUserSession->bindParam(':ip', userIp());
									$insertUserSession->bindParam(':date', strtotime('now'));
									$insertUserSession->bindParam(':browser', $_SERVER['HTTP_USER_AGENT']);
									$insertUserSession->execute();
									header('Location: '.$config['hotelUrl'].'');
								}
								else
								{	
									if ($row['rank'] >= $config['maintenancekMinimumRankLogin'])
									{
										$_SESSION['adminlogin'] = true;
										header('Location: '.$config['hotelUrl'].'');	
									}
									echo '<div class="error" style="display: block;">Currently, only personnel can log in.</div>'; return;
								}
							}
							echo '<div class="error" style="display: block;">You entered your password incorrectly, check your password.</div>'; return;
						}
						echo '<div class="error" style="display: block;">Unfortunately Frank could not find such a user. You can create a free account if you want!</div>'; return;
					}
					echo '<div class="error" style="display: block;">You cannot leave your password blank.</div>'; return;
				}
				echo '<div class="error" style="display: block;">You cannot leave your username blank.</div>'; return;
			}
		}
		public static function registration()
		{
			$userRealIp = userIp();
			global $config, $lang, $dbh,$emuUse;
			if (isset($_POST['registration']))
			{
				if ($config['registerEnable'] == true)
				{
					if (!empty($_POST['password']))
					{
						if (!empty($_POST['password_repeat']))
						{
							if (!empty($_POST['email']))
							{
								if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
								{
										if (!self::emailTaken($_POST['email']))
										{
											if (strlen($_POST['password']) >= 6)
											{
												if ($_POST['password'] == $_POST['password_repeat'])
												{	
													$stmt = $dbh->prepare("SELECT ".$emuUse['ip_last']." FROM users WHERE ".$emuUse['ip_last']." = :userip");
													$stmt->bindParam(':userip',  userIp());
													$stmt->execute();
													if ($stmt->RowCount() < 4)
													{
														if (self::refUser($_POST['referrer']) || empty($_POST['referrer']))
														{
															if(!$config['recaptchaSiteKeyEnable'] == true)
															{
																$_POST['g-recaptcha-response'] = true;
															}
															if ($_POST['g-recaptcha-response'])
															{			
																$motto = filter($config['motto'] );
																$avatar = filter($config['look']);
																$password = self::hashed($_POST['password']);
																$addNewUser = $dbh->prepare("
																INSERT INTO
																users
																(password, rank, auth_ticket, motto, account_created, last_online, mail, look, ip_current, ip_register, credits, home_room)
																VALUES
																(
																:password, 
																'1',
																:sso,
																:motto, 
																:time, 
																:last_online,
																:email, 
																:avatar,
																:userip, 
																:userip, 
																:credits,
																:home_room
																)");
																$addNewUser->bindParam(':password', $password);
																$addNewUser->bindParam(':motto', $motto);
																$addNewUser->bindParam(':sso', game::sso('register'));
																$addNewUser->bindParam(':email', $_POST['email']);
																$addNewUser->bindParam(':avatar', $avatar);
																$addNewUser->bindParam(':credits', $config['credits']);
																$addNewUser->bindParam(':userip', userIp());
																$addNewUser->bindParam(':time', strtotime('now'));
																$addNewUser->bindParam(':last_online', strtotime('now'));
																$addNewUser->bindParam(':home_room', $config['home_room']);
																$addNewUser->execute();
																
																$addNewUserCurrency = $dbh->prepare("
																INSERT INTO
																users_currency
																(user_id, type, amount)
																VALUES
																(
																:user_id, 
																:type, 
																:amount
																)");

																$lastId = $dbh->lastInsertId();
																$type = "0";

																$addNewUserCurrency->bindParam(':user_id', $lastId);
																$addNewUserCurrency->bindParam(':type', $type);
																$addNewUserCurrency->bindParam(':amount', $config['activity_points']);
																$addNewUserCurrency->execute();
																
																//User referrer//
																if (!empty($_POST['referrer']))
																{	
																	$getUserRef = $dbh->prepare("SELECT id,username FROM users WHERE username = :username LIMIT 1");
																	$getUserRef->bindParam(':username', $_POST['referrer']);
																	$getUserRef->execute();
																	$getInfoRefUser = $getUserRef->fetch();
																	$addRef = $dbh->prepare("
																	INSERT INTO
																	referrer
																	(userid, refid,vip_points)
																	VALUES
																	(
																	:lastid, 
																	:refid,
																	:vip_points
																	)");
																	$addRef->bindParam(':lastid', $lastId);
																	$addRef->bindParam(':refid', $getInfoRefUser['id']);
																	$addRef->bindParam(':vip_points', $config['vip_pointsRef']);
																	$addRef->execute();
																	$stmt = $dbh->prepare("SELECT*FROM referrerbank WHERE userid = :id LIMIT 1");
																	$stmt->bindParam(':id', $getInfoRefUser['id']);
																	$stmt->execute();
																	if ($stmt->RowCount() == 0)
																	{
																		$addDiamondsRow = $dbh->prepare("
																		INSERT INTO
																		referrerbank
																		(userid,vip_points)
																		VALUES
																		(
																		:lastid, 
																		:vip_points
																		)");
																		$addDiamondsRow->bindParam(':lastid', $getInfoRefUser['id']);
																		$addDiamondsRow->bindParam(':vip_points', $config['vip_pointsRef']);
																		$addDiamondsRow->execute();
																	}
																	else
																	{
																		$addDiamonds = $dbh->prepare("
																		UPDATE referrerbank SET 
																		vip_points=vip_points + :vip_points 
																		WHERE 
																		userid=:lastid
																		");
																		$addDiamonds->bindParam(':lastid', $getInfoRefUser['id']);
																		$addDiamonds->bindParam(':vip_points', $config['vip_pointsRef']);
																		$addDiamonds->execute(); 
																	}
																	$_SESSION['id'] = $lastId;
																	echo 'succes';
																	return;
																}
																//User referrer//
																else
																{
																	$_SESSION['id'] = $lastId;
																	$type = "5";
																	$addNewUserCurrency->bindParam(':user_id', $lastId);
																	$addNewUserCurrency->bindParam(':type', $type);
																	$addNewUserCurrency->bindParam(':amount', $config['vip_points']);
																	$addNewUserCurrency->execute();
																	
																	echo 'succes';
																	return;
																}
															}
															else
															{
																echo 'robot';
																return;
															}
														}
													}
													else
													{
														echo 'to_many_ip';
														return;
													}
												}
												else
												{
													echo 'password_repeat_error';
													return;
												}
											}
											else
											{
												echo 'short_password';
												return;
											}
										}
										else
										{
											echo 'used_email';
											return;
										}
								}
								else
								{
									echo 'valid_email';
									return;
								}
							}
							else
							{
								echo 'empty_email';
								return;
							}
						}
						else
						{
							echo 'empty_password_repeat';
							return;
						}
					}
					else
					{
						echo 'empty_password';
						return;
					}
				}
				else
				{
					echo 'register_disable';
					return;
				}
			}
		}
		public static function registration_checker()
		{
			global $config, $lang, $dbh,$emuUse;
			if (isset($_POST['registration_checker']))
			{
				if ($config['registerEnable'] == true)
				{
					if (!empty($_POST['username']))
					{
						if (!self::userTaken($_POST['username']))
						{
							$addNewUserComplete = $dbh->prepare("UPDATE users SET username = :username, look = :look, gender = :gender WHERE id = :userid");
							$addNewUserComplete->bindParam(':username', $_POST['username']);
							$addNewUserComplete->bindParam(':look', $_POST['look']);
							$addNewUserComplete->bindParam(':gender', $_POST['avatar_gender']);
							$addNewUserComplete->bindParam(':userid', $_POST['userid']);
							$addNewUserComplete->execute();
						}
						else
						{
							echo 'used_username';
							return;
						}
					}
					else
					{
						echo 'empty_username';
						return;
					}
				}
				else
				{
					echo 'register_disable';
					return;
				}
			}
		}
		public static function buyNFTDiamonds()
		{
			global $dbh,$config,$lang,$emuUse;
			if (isset($_POST['buyNFTDiamonds']))
			{
				$sellAvatarCountMin = $_POST['price'] - 1;
				if ($sellAvatarCountMin < User::userData('activity_points'))
				{
					$getNFTDuckets = $dbh->prepare("UPDATE cms_nft SET user_id = :new_user_id WHERE id = :nft_id");
					$getNFTDuckets->bindParam(':new_user_id', $_SESSION['id']);
					$getNFTDuckets->bindParam(':nft_id', $_POST['nft_id']);
					$getNFTDuckets->execute();
					if ($getNFTDuckets->RowCount())
					{
						$type = '5';
						$buyNFTDiamonds = $getNFTDuckets->fetch();
						$buyNFTDiamonds = $dbh->prepare("UPDATE users_currency SET amount=:amount - :price WHERE user_id = :user_id AND type = :type");
						$buyNFTDiamonds->bindParam(':price', $_POST['price']);
						$buyNFTDiamonds->bindParam(':user_id', $_SESSION['id']);
						$buyNFTDiamonds->bindParam(':type', $type);
						$buyNFTDiamonds->bindParam(':amount', User::userData('vip_points'));
						$buyNFTDiamonds->execute();
						if ($buyNFTDiamonds->RowCount())
						{
							$buyerNFTDiamonds = $buyNFTDiamonds->fetch();
							$buyerNFTDiamonds = $dbh->prepare("UPDATE users_currency SET amount=:amount + :price WHERE user_id = :user_id AND type = :type");
							$buyerNFTDiamonds->bindParam(':price', $_POST['price']);
							$buyerNFTDiamonds->bindParam(':user_id', $_POST['user_id']);
							$buyerNFTDiamonds->bindParam(':type', $type);
							$buyerNFTDiamonds->bindParam(':amount', User::userData('vip_points'));
							$buyerNFTDiamonds->execute();
							header('Location: /settings/avatars');
							return;
						}
					}
				}
				echo '<div class="error" style="display: block;">You do not have enough duckets to purchase NFT.</div>'; return;
			}
		}
		public static function buyNFTDuckets()
		{
			global $dbh,$config,$lang,$emuUse;
			if (isset($_POST['buyNFTDuckets']))
			{
				$sellAvatarCountMin = $_POST['price'] - 1;
				if ($sellAvatarCountMin < User::userData('activity_points'))
				{
					$getNFTDuckets = $dbh->prepare("UPDATE cms_nft SET user_id = :new_user_id WHERE id = :nft_id");
					$getNFTDuckets->bindParam(':new_user_id', $_SESSION['id']);
					$getNFTDuckets->bindParam(':nft_id', $_POST['nft_id']);
					$getNFTDuckets->execute();
					if ($getNFTDuckets->RowCount())
					{
						$type = '0';
						$buyNFTDuckets = $getNFTDuckets->fetch();
						$buyNFTDuckets = $dbh->prepare("UPDATE users_currency SET amount=:amount - :price WHERE user_id = :user_id AND type = :type");
						$buyNFTDuckets->bindParam(':price', $_POST['price']);
						$buyNFTDuckets->bindParam(':user_id', $_SESSION['id']);
						$buyNFTDuckets->bindParam(':type', $type);
						$buyNFTDuckets->bindParam(':amount', User::userData('activity_points'));
						$buyNFTDuckets->execute();
						if ($buyNFTDuckets->RowCount())
						{
							$buyerNFTDuckets = $buyNFTDuckets->fetch();
							$buyerNFTDuckets = $dbh->prepare("UPDATE users_currency SET amount=:amount + :price WHERE user_id = :user_id AND type = :type");
							$buyerNFTDuckets->bindParam(':price', $_POST['price']);
							$buyerNFTDuckets->bindParam(':user_id', $_POST['user_id']);
							$buyerNFTDuckets->bindParam(':type', $type);
							$buyerNFTDuckets->bindParam(':amount', User::userData('activity_points'));
							$buyerNFTDuckets->execute();
							header('Location: /settings/avatars');
							return;
						}
					}
				}
				echo '<div class="error" style="display: block;">You do not have enough duckets to purchase NFT.</div>'; return;
			}
		}
		public static function buyNFTCredits()
		{
			global $dbh,$config,$lang,$emuUse;
			if (isset($_POST['buyNFTCredits']))
			{
				$sellAvatarCountMin = $_POST['price'] - 1;
				if ($sellAvatarCountMin < User::userData('credits'))
				{
					$getNFTCredits = $dbh->prepare("UPDATE cms_nft SET user_id = :new_user_id WHERE id = :nft_id");
					$getNFTCredits->bindParam(':new_user_id', $_SESSION['id']);
					$getNFTCredits->bindParam(':nft_id', $_POST['nft_id']);
					$getNFTCredits->execute();
					if ($getNFTCredits->RowCount())
					{
						$buyNFTCredits = $getNFTCredits->fetch();
						$buyNFTCredits = $dbh->prepare("UPDATE users SET credits=credits - :price WHERE id = :id");
						$buyNFTCredits->bindParam(':price', $_POST['price']);
						$buyNFTCredits->bindParam(':id', $_SESSION['id']);
						$buyNFTCredits->execute();
						if ($buyNFTCredits->RowCount())
						{
							$buyerNFTCredits = $buyNFTCredits->fetch();
							$buyerNFTCredits = $dbh->prepare("UPDATE users SET credits=credits + :price WHERE id = :user_id");
							$buyerNFTCredits->bindParam(':price', $_POST['price']);
							$buyerNFTCredits->bindParam(':user_id', $_POST['user_id']);
							$buyerNFTCredits->execute();
							header('Location: /settings/avatars');
							return;
						}
					}
				}
				echo '<div class="error" style="display: block;">You do not have enough credits to purchase NFT.</div>'; return;
			}
		}
		public static function changePrice()
		{
			global $dbh,$config,$lang,$emuUse;
			if (isset($_POST['changePrice']))
			{
				$getNFTDuckets = $dbh->prepare("UPDATE cms_nft SET price = :new_price, old_price = :old_price, old_type = :old_type WHERE id = :nft_id");
				$getNFTDuckets->bindParam(':new_price', $_POST['new_price']);
				$getNFTDuckets->bindParam(':old_price', $_POST['old_price']);
				$getNFTDuckets->bindParam(':old_type', $_POST['old_type']);
				$getNFTDuckets->bindParam(':nft_id', $_POST['nft_id']);
				$getNFTDuckets->execute();
				$url = $_SERVER['REQUEST_URI'];
				header('Location: '.$url.'');
			}
		}
		public static function create_nft()
		{
			global $config, $lang, $dbh,$emuUse;
			if (isset($_POST['create_nft']))
			{
				if (!empty($_POST['nft_name']))
				{
					if (!empty($_POST['price']))
					{
						$sellAvatarCountMin = $config['sellAvatarCount'] - 1;
						if(User::userData('vip_points') > $sellAvatarCountMin)
						{
							if (!self::nftTaken(User::userData('look')))
							{
								$addNewNFT = $dbh->prepare("
								INSERT INTO
								cms_nft
								(user_id, nft_name, figure, price, type)
								VALUES
								(
								:userid, 
								:nft_name,
								:figure,
								:price, 
								:type
								)");
								$addNewNFT->bindParam(':userid', User::userData('id'));
								$addNewNFT->bindParam(':nft_name', $_POST['nft_name']);
								$addNewNFT->bindParam(':figure', User::userData('look'));
								$addNewNFT->bindParam(':price', $_POST['price']);
								$addNewNFT->bindParam(':type', $_POST['type']);
								$addNewNFT->execute();
								
								$addNewNFTCurrency = $dbh->prepare("
								UPDATE users_currency SET 
								amount=amount - :vip_points 
								WHERE 
								user_id = :lastid && type = :type
								");
								$type = "5";
								$addNewNFTCurrency->bindParam(':lastid', User::userData('id'));
								$addNewNFTCurrency->bindParam(':vip_points', $config['sellAvatarCount']);
								$addNewNFTCurrency->bindParam(':type', $type);
								$addNewNFTCurrency->execute(); 
								echo 'succes';
								return;
							}
							else
							{
								echo 'used_nft';
								return;
							}
						}
						else
						{
							echo 'insufficient_amount';
							return;
						}
					}
					else
					{
						echo 'empty_price';
						return;
					}
				}
				else
				{
					echo 'empty_nft_name';
					return;
				}
			}
		}
		Public static function editPassword()
		{
			global $dbh,$lang;
			if (isset($_POST['password']))
			{
				if (isset($_POST['oldpassword']) && !empty($_POST['oldpassword']))
				{
					if (isset($_POST['newpassword']) && !empty($_POST['newpassword']))
					{
						$stmt = $dbh->prepare("SELECT id, password, username FROM users WHERE id = :id");
						$stmt->bindParam(':id', $_SESSION['id']);
						$stmt->execute();
						$getInfo = $stmt->fetch();
						if (self::checkUser(filter($_POST['oldpassword']), $getInfo['password'], filter($getInfo['username'])))
						{
							if (strlen($_POST['newpassword']) >= 6)
							{
								$newPassword = self::hashed($_POST['newpassword']);
								$stmt = $dbh->prepare("
								UPDATE 
								users 
								SET password = 
								:newpassword 
								WHERE id = 
								:id
								");
								$stmt->bindParam(':newpassword', $newPassword); 
								$stmt->bindParam(':id', $_SESSION['id']); 
								$stmt->execute(); 
								echo '<div class="error" style="display: block;">Your password has been successfully updated.</div>'; return;
							}
							else
							{
								echo '<div class="error" style="display: block;">Your password is too short.</div>'; return;
							}
						}
						else
						{
							echo '<div class="error" style="display: block;">You entered your password incorrectly, check again.</div>'; return;
						}
					}
					else
					{
						echo '<div class="error" style="display: block;">You cannot leave your password blank.</div>'; return;
					}
				}
				else
				{
					echo '<div class="error" style="display: block;">You cannot leave your password blank.</div>'; return;
				}
			}
		}
		Public static function editEmail()
		{
			global $lang,$dbh;
			if (isset($_POST['account']))
			{
				if (isset($_POST['email']) && !empty($_POST['email']))
				{
					if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					{
						if (!self::emailTaken($_POST['email']))
						{
							$stmt = $dbh->prepare("
							UPDATE 
							users 
							SET mail = 
							:newmail
							WHERE id = 
							:id
							");
							$stmt->bindParam(':newmail', $_POST['email']); 
							$stmt->bindParam(':id', $_SESSION['id']); 
							$stmt->execute(); 
							echo '<div class="error" style="display: block;">Your email address has been successfully updated.</div>'; return;
						}
						else
						{
							echo '<div class="error" style="display: block;">This email address is already in use..</div>'; return;
						}
					}
					else
					{
						echo '<div class="error" style="display: block;">You entered an invalid email address.</div>'; return;
					}
				}
				else
				{
					echo '<div class="error" style="display: block;">You cannot leave your email address blank.</div>'; return;
				}
			}
		}
	}																				