							<div class="page-content-collider-content-settings-left-side">
                                <a href="/settings/mail" class="page-content-collider-content-settings-left-side-item <?php if ($navigatorID == 9 AND $subNavigatorID == 1) { echo 'active'; } ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="page-content-collider-content-settings-left-side-item-icon"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    <h3 class="page-content-collider-content-settings-left-side-item-title">Change Email Address</h3>
                                </a>
                                <a href="/settings/password" class="page-content-collider-content-settings-left-side-item <?php if ($navigatorID == 9 AND $subNavigatorID == 2) { echo 'active'; } ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="page-content-collider-content-settings-left-side-item-icon"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <h3 class="page-content-collider-content-settings-left-side-item-title">Change Password</h3>
                                </a>
								<?php if($config['nft'] == true) { ?>
                                <a href="/settings/avatars" class="page-content-collider-content-settings-left-side-item <?php if ($navigatorID == 9 AND $subNavigatorID == 3) { echo 'active'; } ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="page-content-collider-content-settings-left-side-item-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <h3 class="page-content-collider-content-settings-left-side-item-title">My Avatars</h3>
                                </a>
								<?php } else { ?>
								<a href="/settings/wardrobe" class="page-content-collider-content-settings-left-side-item <?php if ($navigatorID == 9 AND $subNavigatorID == 4) { echo 'active'; } ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="page-content-collider-content-settings-left-side-item-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <h3 class="page-content-collider-content-settings-left-side-item-title">My Wardrobe</h3>
                                </a>
								<?php } ?>
                            </div>