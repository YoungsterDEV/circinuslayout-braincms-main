<?php
$navigatorID = 9;
$subNavigatorID = 2;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider" style="background-color: transparent;">
            <div class="page-content-max-width">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content">
                        <div class="page-content-collider-content-settings">
                            <?php include 'include/settings-menu.php'; ?>
                            <form action="" method="POST" class="page-content-collider-content-settings-right-side">
                                <?php User::editPassword(); ?>
								<div class="page-content-collider-content-settings-right-side-item">
                                    <div class="page-content-collider-content-settings-right-side-item-column">
										<h3 class="page-content-collider-content-settings-right-side-item-title">Current password</h3>
										<input type="password" id="avatarmotto" name="oldpassword" class="page-content-collider-content-settings-right-side-item-input" placeholder="">
                                    </div>
								</div>
								<div class="page-content-collider-content-settings-right-side-item">
									<div class="page-content-collider-content-settings-right-side-item-column">
										<h3 class="page-content-collider-content-settings-right-side-item-title">New password</h3>
										<input type="password" id="avatarmotto" name="newpassword" class="page-content-collider-content-settings-right-side-item-input" placeholder="">
										<p class="page-content-collider-content-settings-right-side-item-description">Choose a strong password, make sure that nobody here can just crack your password.</p>
									</div>
								</div>
                                <button type="submit" name="password" class="page-content-collider-content-settings-right-side-default-button fill save">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'include/footer.php';
?>