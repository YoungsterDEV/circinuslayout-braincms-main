<?php
$navigatorID = 9;
$subNavigatorID = 4;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider" style="background-color: transparent;">
            <div class="page-content-max-width">
                <div class="page-content-collider-item">
                    <div id="look" class="page-content-collider-content">
                        <div class="page-content-collider-content-settings">
                            <?php include 'include/settings-menu.php'; ?>
                            <div class="page-content-collider-content-settings-right-side row">
                                <div class="page-content-collider-content-settings-right-side-item" style="width: 240px;">
                                   <div class="page-content-collider-content-settings-right-side-item-avatar">
                                       <img src="<?php echo $config['avatarImager'] ?><?= User::userData('look') ?>&action=wlk&direction=2&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=l" alt="<?= User::userData('username') ?> Avatar" class="page-content-collider-content-settings-right-side-item-avatar-figure">
                                   </div>
                                </div>
                                <div class="page-content-collider-content-settings-right-side-item looks">
									<?php 
									wardrope();
									$getUserLook = $dbh->prepare("SELECT * from users_wardrobe WHERE user_id = :id ORDER BY slot_id DESC");
									$getUserLook->bindParam(':id', $_SESSION['id']);
									$getUserLook->execute();
									if ($getUserLook->RowCount() > 0)
									{
									while ($getUserLookData = $getUserLook->fetch())
									{
									?>
									<form action="" method="POST" class="page-content-collider-content-settings-right-side-item-look">
										<img src="<?php echo $config['avatarImager'] ?><?php echo $getUserLookData['look'] ?>&amp;action=std&amp;direction=3&amp;head_direction=3&amp;img_format=undefined&amp;gesture=sml&amp;headonly=0&amp;size=b" onmouseover="this.src='<?php echo $config['avatarImager'] ?><?php echo $getUserLookData['look'] ?>&amp;action=wav&amp;direction=3&amp;head_direction=3&amp;img_format=undefined&amp;gesture=sml&amp;headonly=0&amp;size=b'" onmouseout="this.src='<?php echo $config['avatarImager'] ?><?php echo $getUserLookData['look'] ?>&amp;action=std&amp;direction=3&amp;head_direction=3&amp;img_format=undefined&amp;gesture=sml&amp;headonly=0&amp;size=b'" alt="<?= User::userData('username') ?> Avatar" class="page-content-collider-content-settings-right-side-item-look-figure">
										<div class="page-content-collider-content-settings-right-side-item-look-avatar-shadow"></div>
										<input type="hidden" value="<?php echo $getUserLookData['look'] ?>" name="lookid">
										<button type="submit" name="editlook" class="page-content-collider-content-settings-right-side-item-look-text">Use</button>
									</form>
									<?php
									}
									}
									else
									{
									echo'
									<p class="page-content-collider-content-settings-right-side-item-error">I couldn&#039;t find any looks in your wardrobe.</p>
									';
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'include/footer.php';
?>