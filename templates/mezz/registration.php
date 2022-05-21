<?php
$navigatorID = 2;
$subNavigatorID = 1;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>		
		<style>
		hr { margin: 15px 0; border-top: 1px solid #0000001c; }
		</style>
        <div class="page-content-collider">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item" style="align-items: center;">
                    <div class="page-content-collider-content registration">
                        <div class="page-content-collider-content-registration">
                            <h2 id="error" class="page-content-collider-content-registration-title">Create free account now!</h2>
                            <div class="page-content-collider-content-registration-item">
                                <label class="page-content-collider-content-registration-item-title">Email</label>
                                <p class="page-content-collider-content-registration-item-text">You'll need to use this email address to log in to Habbo in the future. Please use a valid address.</p>
                                <input type="hidden" name="referrer" id="referrer" class="page-content-collider-content-registration-item-input" value="">
                                <input type="email" name="email" id="email" onkeyup="checkUsernameOrEmail(this.value, 'email')" class="page-content-collider-content-registration-item-input">
                            </div>
                            <div class="page-content-collider-content-registration-item">
                                <label class="page-content-collider-content-registration-item-title">Password</label>
                                <p class="page-content-collider-content-registration-item-text">Use at least 6 characters. Include at least one letter and at least one number or special character.</p>
                                <input type="password" id="password" name="password" onkeyup="checkPasswords(this.value, 'password')" class="page-content-collider-content-registration-item-input">
								<hr>
								<label class="page-content-collider-content-registration-item-title">Repeat Password</label>
                                <input type="password" id="password_repeat" name="password_repeat" onkeyup="checkPasswords(this.value, 'password_repeat')" class="page-content-collider-content-registration-item-input">
                            </div>
                            <div class="page-content-collider-content-registration-item">
                                <label class="page-content-collider-content-registration-item-title">Birthdate</label>
                                <p class="page-content-collider-content-registration-item-text">Please enter your real birth date. We will use this information to restore your account if you ever lose access. Your birth date will never be shared publicly. Please note you have to be aged 13 years or above to play Habbo!</p>
                                <div class="page-content-collider-content-registration-item-column">
                                    <select class="page-content-collider-content-registration-item-select">
                                        <?php
                                        echo '<option>Day</option>';
										for($i = 1; $i <= 31; $i++) {
											echo "<option>$i</option>";
										} 
                                        ?>
                                    </select>
									<select class="page-content-collider-content-registration-item-select">
                                        <?php
                                        echo '<option>Month</option>';
										for($i = 1; $i <= 12; $i++) {
											echo "<option>$i</option>";
										} 
                                        ?>
                                    </select>
									<select class="page-content-collider-content-registration-item-select">
                                        <?php
                                        echo '<option>Year</option>';
										for($i = 1970; $i <= 2022; $i++) {
											echo "<option>$i</option>";
										} 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="page-content-collider-content-registration-item">
                                <div class="page-content-collider-content-registration-item-column">
                                    <input type="checkbox" class="page-content-collider-content-registration-item-checkbox">
                                    <p class="page-content-collider-content-registration-item-text">I accept the <a class="page-content-collider-content-registration-item-href" href="#" target="_blank">terms of service</a>, <a class="page-content-collider-content-registration-item-href" href="#" target="_blank">privacy policy</a> and <a class="page-content-collider-content-registration-item-href" href="#" target="_blank">cookie policy</a>.</p>
                                </div>
                                <div class="page-content-collider-content-registration-item-column">
                                    <input type="checkbox" class="page-content-collider-content-registration-item-checkbox">
                                    <p class="page-content-collider-content-registration-item-text">Keep me updated about the latest Habbo happenings, news and gossip!</p>
                                </div>
                            </div>
                            <button type="submit" id="registration" name="registration" class="page-content-collider-content-registration-button">Let's make an avatar</button>
                        </div>
                    </div>
                </div>
            </div>
			<div class="error"></div>
        </div>
<?php 
include 'include/footer.php';
?>