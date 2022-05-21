<?php
$navigatorID = 7;
$subNavigatorID = 1;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider" style="background-color: transparent;">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content profile">
                        <div class="page-content-collider-content-profile">
                            <div class="page-content-collider-content-profile-avatar">
                                <img src="<?php echo $config['avatarImager'] ?><?= userHome('look'); ?>&direction=2&head_direction=3&gesture=sml&action=wav&size=l" alt="<?= userHome('username'); ?> avatar in Habbo" class="page-content-collider-content-profile-avatar-figure">
                                <div class="page-content-collider-content-profile-avatar-column">
                                    <p class="page-content-collider-content-profile-avatar-small-text">My name is,</p>
                                    <h3 class="page-content-collider-content-profile-avatar-username"><?= userHome('username'); ?></h3>
                                    <p class="page-content-collider-content-profile-avatar-motto"><?= userHome('motto'); ?></p>
                                </div>
                            </div>
                            <div class="page-content-collider-content-profile-purse">
                                <div class="page-content-collider-content-profile-purse-item credits">
                                    <span class="page-content-collider-content-profile-purse-item-icon"></span>
                                    <p class="page-content-collider-content-profile-purse-item-text"><?= userHome('credits'); ?></p>
                                </div>
                                <div class="page-content-collider-content-profile-purse-item duckets">
                                    <span class="page-content-collider-content-profile-purse-item-icon"></span>
                                    <p class="page-content-collider-content-profile-purse-item-text"><?= userHome('activity_points'); ?></p>
                                </div>
                                <div class="page-content-collider-content-profile-purse-item diamonds">
                                    <span class="page-content-collider-content-profile-purse-item-icon"></span>
                                    <p class="page-content-collider-content-profile-purse-item-text"><?= userHome('vip_points'); ?></p>
                                </div>
                            </div>
                            <div class="page-content-collider-content-profile-card-wrapper">
                                <div class="page-content-collider-content-profile-card-wrapper-aligner badges">
									<div class="page-content-collider-content-profile-card-wrapper-aligner-content">
										<h2 class="page-content-collider-content-profile-card-wrapper-aligner-content-title">Badges</h2>
										<?php
										$userId = userHome('id');
										$stmt = $dbh->prepare("SELECT * FROM users_badges WHERE user_id = :userid ORDER BY id DESC LIMIT 5");
										$stmt->bindParam(':userid', $userId);
										$stmt->execute();
										if (!$stmt->RowCount() == 0)
										{
										while($badge = $stmt->fetch())
										{
										?>
                                        <span class="page-content-collider-content-profile-card-wrapper-aligner-content-badge" data-toggle="tooltip" data-original-title="<?php echo filter($badge["badge_code"]); ?>"><img src="<?php echo $config['hotelUrl']; ?>/swf/c_images/album1584/<?php echo filter($badge["badge_code"]); ?>.gif" alt="<?php echo filter($badge_owner["badge_code"]); ?>"></span>
										<?php
										}
										}
										else
										{
											echo '<p class="page-content-collider-content-profile-card-wrapper-aligner-content-error">I couldn&#039;t find anything here.</p>';
										}
										?>
									</div>
                                </div>
                            </div>
                            <div class="page-content-collider-content-profile-card-wrapper">
                                <div class="page-content-collider-content-profile-card-wrapper-aligner groups">
                                    <div class="page-content-collider-content-profile-card-wrapper-aligner-content">
                                        <h2 class="page-content-collider-content-profile-card-wrapper-aligner-content-title">Groups</h2>
										<?php
										$userId = userHome('id');
										$stmt = $dbh->prepare("SELECT * FROM guilds WHERE user_id = :userid ORDER BY id DESC LIMIT 5");
										$stmt->bindParam(':userid', $userId);
										$stmt->execute();
										if (!$stmt->RowCount() == 0)
										{
										while($group = $stmt->fetch())
										{
										?>
                                        <span class="page-content-collider-content-profile-card-wrapper-aligner-content-badge" data-toggle="tooltip" data-original-title="<?php echo filter($group["name"]); ?>"><img src="<?php echo $config['hotelUrl']; ?>/swf/c_images/Badgeparts/<?php echo filter($group["badge"]); ?>.gif" alt="<?php echo filter($group["name"]); ?>"></span>
										<?php
										}
										}
										else
										{
											echo '<p class="page-content-collider-content-profile-card-wrapper-aligner-content-error">I couldn&#039;t find anything here.</p>';
										}
										?>
                                    </div>
                                </div>
                            </div>
                            <div class="page-content-collider-content-profile-card-wrapper">
                                <div class="page-content-collider-content-profile-card-wrapper-aligner rooms">
                                    <div class="page-content-collider-content-profile-card-wrapper-aligner-content">
                                        <h2 class="page-content-collider-content-profile-card-wrapper-aligner-content-title">Rooms</h2>
										<?php
										$userId = userHome('id');
										$stmt = $dbh->prepare("SELECT * FROM rooms WHERE owner_id = :userid ORDER BY id DESC LIMIT 4");
										$stmt->bindParam(':userid', $userId);
										$stmt->execute();
										if (!$stmt->RowCount() == 0)
										{
										while($room = $stmt->fetch())
										{
										?>
                                        <div class="page-content-collider-content-profile-card-wrapper-aligner-content-room">
                                            <div class="page-content-collider-content-profile-card-wrapper-aligner-content-room-image">
												<span class="page-content-collider-content-profile-card-wrapper-aligner-content-room-image-camera" style="background-image: url(<?php echo $config['hotelUrl'] ?>/swf/c_images/camera/thumbnails/<?php echo filter($room["id"]); ?>.png);"></span>
											</div>
                                            <p class="page-content-collider-content-profile-card-wrapper-aligner-content-room-name"><?php echo filter($room["name"]); ?></p>
                                        </div>
										<?php
										}
										}
										else
										{
											echo '<p class="page-content-collider-content-profile-card-wrapper-aligner-content-error">I couldn&#039;t find anything here.</p>';
										}
										?>
                                    </div>
                                </div>
                            </div>
                            <div class="page-content-collider-content-profile-card-wrapper">
                                <div class="page-content-collider-content-profile-card-wrapper-aligner friends">
                                    <div class="page-content-collider-content-profile-card-wrapper-aligner-content">
                                        <h2 class="page-content-collider-content-profile-card-wrapper-aligner-content-title">Friends</h2>
										<?php
										$userId = userHome('id');
										$sql = $dbh->prepare("SELECT * FROM messenger_friendships WHERE user_one_id=:userid ORDER BY id DESC LIMIT 5");
										$sql->bindParam(':userid', $userId);
										$sql->execute();
										if (!$sql->RowCount() == 0)
										{
										while($friends = $sql->fetch())
										{
										$id = (userHome('id') == $friends['user_two_id'] ? $friends['user_one_id'] : $friends['user_two_id']);
										$getUser = $dbh->prepare("SELECT * FROM users WHERE id = :id");
										$getUser->bindParam(':id', $id);
										$getUser->execute();
										$getUserData = $getUser->fetch();
										{
										?>
										<a href="/profile/<?php echo filter($getUserData['username']); ?>" class="page-content-collider-content-profile-card-wrapper-aligner-content-friend">
                                            <img src="<?php echo $config['avatarImager'] ?><?php echo filter($getUserData['look']); ?>&action=std&direction=3&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=b" onmouseover="this.src='<?php echo $config['avatarImager'] ?><?php echo filter($getUserData['look']); ?>&action=wav&direction=3&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=b'" onmouseout="this.src='<?php echo $config['avatarImager'] ?><?php echo filter($getUserData['look']); ?>&action=std&direction=3&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=b'" alt="<?php echo filter($getUserData['username']); ?> avatar in <?php echo $config['hotelName'] ?>" class="page-content-collider-content-profile-card-wrapper-aligner-content-friend-figure">
                                            <p class="page-content-collider-content-profile-card-wrapper-aligner-content-friend-username"><?php echo filter($getUserData['username']); ?></p>
                                        </a>
										<?php
										}
										}
										}
										else
										{
											echo '<p class="page-content-collider-content-profile-card-wrapper-aligner-content-error">I couldn&#039;t find anything here.</p>';
										}
										?>
                                    </div>
                                </div>
                            </div>
							<?php
							$userId = userHome('id');
							$stmt = $dbh->prepare("SELECT * FROM camera_web WHERE user_id = :userid ORDER BY id DESC LIMIT 4");
							$stmt->bindParam(':userid', $userId);
							$stmt->execute();
							if (!$stmt->RowCount() == 0)
							{
							?>
							<div class="page-content-collider-content-profile-photos">
                                <h2 class="page-content-collider-content-profile-photos-title">Photos</h2>
							<?php
							while($photo = $stmt->fetch())
							{
							?>
                                <div class="page-content-collider-content-profile-photo">
                                    <span class="page-content-collider-content-profile-photo-promo pixelated" style="background-image: url(<?php echo filter($photo["url"]); ?>)"></span>
                                </div>
							<?php } ?>
                            </div>
							<?php } ?>
                            <h3 class="page-content-collider-content-profile-date">Joined <?= $config['hotelName'] ?> on <?php echo strftime("%e %B, %Y",userHome('account_created'));?></h3>
                            <div class="page-content-collider-content-profile-icon">
                                <i class="page-content-collider-content-profile-icon-heart"></i>
                                <i class="page-content-collider-content-profile-icon-heart"></i>
                                <i class="page-content-collider-content-profile-icon-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'include/footer.php';
?>