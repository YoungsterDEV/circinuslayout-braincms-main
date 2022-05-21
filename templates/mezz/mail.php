<?php
$navigatorID = 9;
$subNavigatorID = 1;
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
                            <form action="" method="post" class="page-content-collider-content-settings-right-side">
                                <?php User::editEmail(); ?>
								<div class="page-content-collider-content-settings-right-side-item">
                                    <div class="page-content-collider-content-settings-right-side-item-column">
                                        <h3 class="page-content-collider-content-settings-right-side-item-title">Email Address</h3>
                                        <input type="mail" id="avatarmotto" name="email" autocomplete="off" class="page-content-collider-content-settings-right-side-item-input" placeholder="" value="<?= User::userData('mail') ?>">
                                        <p class="page-content-collider-content-settings-right-side-item-description">Make sure this is a really email address. Imagine you are for your account password and can not reset it? with your email, you can!</p>
                                    </div>
                                </div>
                                <button type="submit" name="account" class="page-content-collider-content-settings-right-side-default-button fill save">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'include/footer.php';
?>