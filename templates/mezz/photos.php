<?php
$navigatorID = 3;
$subNavigatorID = 1;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-head">
                        <span class="page-content-collider-head-icon camera"></span>
                        <div class="page-content-collider-head-column">
                            <h2 class="page-content-collider-head-title">Photos</h2>
                            <p class="page-content-collider-head-description">Have a look at some of the great moments captured by Habbos around the hotel.</p>
                        </div>
                    </div>
                    <div class="page-content-collider-content">
						<?php
						$sql = $dbh->prepare("SELECT * FROM camera_web ORDER BY id DESC LIMIT 32");
						$sql->execute();
						If($sql->RowCount() > 0)
						{
						while ($photos = $sql->fetch())
						{
						$getMembers = $dbh->prepare("SELECT username,look FROM users WHERE id = :publisher");
						$getMembers->bindParam(':publisher', $photos['user_id']);
						$getMembers->execute();
						$userDetails = $getMembers->fetch(); {
						?>
                        <div class="page-content-collider-content-photos">
                            <span class="page-content-collider-content-photos-promo pixelated" style="background-image: url('<?php echo filter($photos["url"]) ?>')"></span>
                            <div class="page-content-collider-content-photos-bottom-side">
                                <a href="/profile/<?php echo filter($userDetails["username"]) ?>" class="page-content-collider-content-photos-bottom-side-avatar">
                                    <span class="page-content-collider-content-photos-bottom-side-avatar-figure pixelated" style="background-image: url('<?php echo $config['avatarImager'] ?><?php echo filter($userDetails["look"]) ?>&action=std&direction=2&head_direction=2&img_format=undefined&gesture=sml&headonly=1&size=b')"></span>
                                    <span class="page-content-collider-content-photos-bottom-side-avatar-username"><?php echo filter($userDetails["username"]) ?></span>
                                </a>
                            </div>
                        </div>
						<?php } } } ?>
                    </div>
                </div>
            </div>
		</div>
<?php 
include 'include/footer.php';
?>