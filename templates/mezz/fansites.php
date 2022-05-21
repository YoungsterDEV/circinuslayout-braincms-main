<?php
$navigatorID = 3;
$subNavigatorID = 3;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider">
            <div class="page-content-max-width" style="width: 900px; justify-content: center;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content fansites">
                        <div class="page-content-collider-content-fansites-left-side">
                            <h2 class="page-content-collider-content-fansites-title">Official Fansites</h2>
                            <div class="page-content-collider-content-fansites-list-space">
                                <p class="page-content-collider-content-fansites-list-space-title">Our official fansites at the moment are:</p>
                                <ul class="page-content-collider-content-fansites-list-space-list">
                                    <?php
									$sql = $dbh->prepare("SELECT * FROM cms_fansites ORDER BY id DESC");
									$sql->execute();
									If($sql->RowCount() > 0)
									{
									while ($fansites = $sql->fetch())
									{
									?>
                                    <li class="page-content-collider-content-fansites-list-space-list-item">
                                        <a href="<?php echo filter($fansites["url"]) ?>" target="_blank" class="page-content-collider-content-fansites-list-space-list-item-url"><?php echo filter($fansites["name"]) ?></a>
                                    </li>
									<?php } } else { ?>
									<p class="page-content-collider-content-fansites-list-space-list-error">We don't have an official fansite yet.</p>
									<?php } ?>
                                </ul>
                            </div>
                            <p class="page-content-collider-content-fansites-paragraph">Every once in a while, we look for new official fansites, and when that happens we will publish a notification ingame. Check out our <a href="#" target="_blank" class="page-content-collider-content-fansites-paragraph-url">fansite policy</a> if you have any questions!</p>
                            <p class="page-content-collider-content-fansites-paragraph">Always remember to keep your Habbo login details separate and private! Don't use them to register on any other sites.</p>
                        </div>
                        <div class="page-content-collider-content-fansites-right-side">
                            <img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/collider/groups.png" alt="Fansites" class="page-content-collider-content-fansites-right-side-image">
                        </div>
                    </div>
                </div>
            </div>
		</div>
<?php 
include 'include/footer.php';
?>