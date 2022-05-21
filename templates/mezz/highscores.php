<?php
$navigatorID = 4;
$subNavigatorID = 1;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider" style="background-color: transparent;">
            <div class="page-content-max-width">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content highscores">
                    <div class="page-content-collider-content-highscores-ranking">
                            <div class="page-content-collider-content-highscores-ranking-head">
                                <img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/user-space/credits.png" alt="Habbo Top Credits" class="page-content-collider-content-highscores-ranking-head-icon">
                                <h3 class="page-content-collider-content-highscores-ranking-head-title">Top Credits</h3>
                            </div>
                            <div class="page-content-collider-content-highscores-ranking-content">
                                <?php
							    $top = 0;
							    $top++;
								  
							    $belcr_get = $dbh->prepare("SELECT id,credits,username,look from users WHERE rank < 3 ORDER BY `credits` DESC  LIMIT 10");
							    $belcr_get->execute();
							    while ($belcr_row = $belcr_get->fetch())
							    {
							    ?>
                                <div class="page-content-collider-content-highscores-ranking-content-item">
                                    <span class="page-content-collider-content-highscores-ranking-content-item-nth"><?php echo $top++ ?></span>
                                    <div style="background-image: url('<?php echo $config['avatarImager'] ?><?php echo $belcr_row['look'] ?>&size=b&head_direction=2&gesture=sml&headonly=1');" class="page-content-collider-content-highscores-ranking-content-item-figure"></div>
                                    <div class="page-content-collider-content-highscores-ranking-content-item-column">
                                        <a href="/profile/<?php echo $belcr_row['username'] ?>" class="page-content-collider-content-highscores-ranking-content-item-username"><?php echo $belcr_row['username'] ?></a>
                                        <p class="page-content-collider-content-highscores-ranking-content-item-amount"><b class="page-content-collider-content-highscores-ranking-content-item-amount-bold"><?php echo $belcr_row['credits'] ?></b> credits</p>
                                    </div>
                                </div>
								<?php } ?>
                            </div>
                        </div>
                        <div class="page-content-collider-content-highscores-ranking">
                            <div class="page-content-collider-content-highscores-ranking-head">
                                <img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/user-space/duckets.png" alt="Habbo Top Credits" class="page-content-collider-content-highscores-ranking-head-icon">
                                <h3 class="page-content-collider-content-highscores-ranking-head-title">Top Duckets</h3>
                            </div>
                            <div class="page-content-collider-content-highscores-ranking-content">
                                <?php 
								$top = 0;
								$top++;
								if ($config['hotelEmu'] == 'arcturus')
								{
								$belcr_get2 = $dbh->prepare("SELECT * from users_currency WHERE type = 0 ORDER BY `amount` DESC  LIMIT 10");
								$belcr_get2->execute();
								while ($belcr_row2 = $belcr_get2->fetch())
								{
								$belcr_get = $dbh->prepare("SELECT * from users WHERE id = :id");
								$belcr_get->bindParam(':id', $belcr_row2['user_id']);
								$belcr_get->execute();
								$belcr_row = $belcr_get->fetch();
								?>
                                <div class="page-content-collider-content-highscores-ranking-content-item">
                                    <span class="page-content-collider-content-highscores-ranking-content-item-nth"><?php echo $top++ ?></span>
                                    <div style="background-image: url('<?php echo $config['avatarImager'] ?><?php echo $belcr_row['look'] ?>&size=b&head_direction=2&gesture=sml&headonly=1');" class="page-content-collider-content-highscores-ranking-content-item-figure"></div>
                                    <div class="page-content-collider-content-highscores-ranking-content-item-column">
                                        <a href="/profile/<?php echo $belcr_row['username'] ?>" class="page-content-collider-content-highscores-ranking-content-item-username"><?php echo $belcr_row['username'] ?></a>
                                        <p class="page-content-collider-content-highscores-ranking-content-item-amount"><b class="page-content-collider-content-highscores-ranking-content-item-amount-bold"><?php echo $belcr_row2['amount'] ?></b> duckets</p>
                                    </div>
                                </div>
								<?php } } ?>
                            </div>
                        </div>
                        <div class="page-content-collider-content-highscores-ranking">
                            <div class="page-content-collider-content-highscores-ranking-head">
                                <img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/user-space/diamonds.png" alt="Habbo Top Diamonds" class="page-content-collider-content-highscores-ranking-head-icon">
                                <h3 class="page-content-collider-content-highscores-ranking-head-title">Top Diamonds</h3>
                            </div>
                            <div class="page-content-collider-content-highscores-ranking-content">
                                <?php 
								$top = 0;
								$top++;
								if ($config['hotelEmu'] == 'arcturus')
								{
								$belcr_get2 = $dbh->prepare("SELECT * from users_currency WHERE type = 5 ORDER BY `amount` DESC  LIMIT 10");
								$belcr_get2->execute();
								while ($belcr_row2 = $belcr_get2->fetch())
								{
								$belcr_get = $dbh->prepare("SELECT * from users WHERE id = :id");
								$belcr_get->bindParam(':id', $belcr_row2['user_id']);
								$belcr_get->execute();
								$belcr_row = $belcr_get->fetch();
								?>
                                <div class="page-content-collider-content-highscores-ranking-content-item">
                                    <span class="page-content-collider-content-highscores-ranking-content-item-nth"><?php echo $top++ ?></span>
                                    <div style="background-image: url('<?php echo $config['avatarImager'] ?><?php echo $belcr_row['look'] ?>&size=b&head_direction=2&gesture=sml&headonly=1');" class="page-content-collider-content-highscores-ranking-content-item-figure"></div>
                                    <div class="page-content-collider-content-highscores-ranking-content-item-column">
                                        <a href="/profile/<?php echo $belcr_row['username'] ?>" class="page-content-collider-content-highscores-ranking-content-item-username"><?php echo $belcr_row['username'] ?></a>
                                        <p class="page-content-collider-content-highscores-ranking-content-item-amount"><b class="page-content-collider-content-highscores-ranking-content-item-amount-bold"><?php echo $belcr_row2['amount'] ?></b> diamonds</p>
                                    </div>
                                </div>
								<?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'include/footer.php';
?>