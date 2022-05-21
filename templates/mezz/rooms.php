<?php
$navigatorID = 3;
$subNavigatorID = 2;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-head">
                        <span class="page-content-collider-head-icon rooms"></span>
                        <div class="page-content-collider-head-column">
                            <h2 class="page-content-collider-head-title">Rooms</h2>
                            <p class="page-content-collider-head-description">Check out some of the most popular rooms within Habbo right now!</p>
                        </div>
                    </div>
                    <div class="page-content-collider-content rooms">
						<?php
						$sql = $dbh->prepare("SELECT id,users,description,owner_id,name,is_public FROM rooms WHERE users > 0 ORDER BY users DESC LIMIT 50");
						$sql->execute();
						If($sql->RowCount() > 0)
						{
						while ($on = $sql->fetch())
						{
						$getMembers = $dbh->prepare("SELECT username,look FROM users WHERE id = :owner");
						$getMembers->bindParam(':owner', $on['owner_id']);
						$getMembers->execute();
						$getMemberss = $getMembers->fetch(); {
						?>
						<div class="page-content-collider-content-rooms-room">
							<span class="page-content-collider-content-rooms-room-image"><span class="page-content-collider-content-rooms-room-image-camera" style="background-image: url(<?php echo $config['hotelUrl'] ?>/swf/c_images/camera/thumbnails/<?php echo filter($on['id']) ?>.png);"></span></span>
							<div class="page-content-collider-content-rooms-room-column">
								<h2 class="page-content-collider-content-rooms-room-title"><?php echo filter($on['name']) ?></h2>
								<p class="page-content-collider-content-rooms-room-description"><?php echo filter($on['description']) ?></p>
								<?php if(filter($on['is_public']) == "1") { ?>
								<a class="page-content-collider-content-rooms-room-owner">
									<span class="page-content-collider-content-rooms-room-owner-head-figure" style="background-image: url(<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/collider/public-room.png);"></span>
									<p class="page-content-collider-content-rooms-room-owner-username">Public Room</p>
								</a>
								<?php } else { ?>
								<a href="/profile/<?php echo filter($getMemberss['username']) ?>"  class="page-content-collider-content-rooms-room-owner">
									<span class="page-content-collider-content-rooms-room-owner-head-figure" style="background-image: url(<?php echo $config['avatarImager'] ?><?php echo filter($getMemberss['look']) ?>&action=std&direction=2&head_direction=2&img_format=undefined&gesture=sml&headonly=1&size=b);"></span>
									<p class="page-content-collider-content-rooms-room-owner-username"><?php echo filter($getMemberss['username']) ?></p>
								</a>
								<?php } ?>
							</div>
						</div>
						<?php
						}
						}
						}
						else
						{
						echo '
						<div class="page-content-collider-content-rooms-room">
							<p class="page-content-collider-content-rooms-room-error">No one is in the hotel yet, or the meteor fell.</p>
						</div>
						';
						}
						?>
                    </div>
                </div>
            </div>
		</div>
<?php 
include 'include/footer.php';
?>