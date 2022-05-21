	<div class="page-content">
        <div id="avatarSelector" class="page-content-choose-style">
            <div class="page-content-choose-style-max-width">
                <img src="https://habbofont.net/font/habbo_big/<?php echo $config['hotelName'] ?>.gif" alt="<?php echo $config['hotelName'] ?> Logo" class="page-content-choose-style-logo">
                <div class="page-content-choose-style-wrapper">
                    <div class="page-content-choose-style-wrapper-item">
                        <h3 class="page-content-choose-style-wrapper-item-title">Choose your look</h3>
						<div class="page-content-choose-style-wrapper-item-nav">
							<a href="#" data-navigate="hd" data-subnav="gender" class="page-content-choose-style-wrapper-item-nav-item menu-active"><span class="page-content-choose-style-wrapper-item-nav-item-icon hd"></a>
							<a href="#" data-navigate="hr" data-subnav="hair" class="page-content-choose-style-wrapper-item-nav-item"><span class="page-content-choose-style-wrapper-item-nav-item-icon hr"></a>
							<a href="#" data-navigate="ch" data-subnav="tops" class="page-content-choose-style-wrapper-item-nav-item"><span class="page-content-choose-style-wrapper-item-nav-item-icon ch"></a>
							<a href="#" data-navigate="lg" data-subnav="bottoms" class="page-content-choose-style-wrapper-item-nav-item"><span class="page-content-choose-style-wrapper-item-nav-item-icon lg"></a>
							<a href="#" data-navigate="sh" data-subnav="bottoms" class="page-content-choose-style-wrapper-item-nav-item"><span class="page-content-choose-style-wrapper-item-nav-item-icon sh"></a>
						</div>
                        <div id="clothes" class="page-content-choose-style-wrapper-item-content"></div>
                    </div>
                    <div class="page-content-choose-style-wrapper-item">
                        <h3 class="page-content-choose-style-wrapper-item-title">Choose color</h3>
                        <div id="colors" class="page-content-choose-style-wrapper-item-content"></div>
                    </div>
                    <div class="page-content-choose-style-wrapper-item">
                        <h3 class="page-content-choose-style-wrapper-item-title">This is your avatar</h3>
                        <div class="page-content-choose-style-wrapper-item-content">
                            <div class="page-content-choose-style-wrapper-item-content-column">
                                <input type="text" name="username" id="username" onkeyup="checkUsernameOrEmail(this.value, 'username')" class="page-content-choose-style-wrapper-item-content-username" maxlength="20">
                                <div id="gender" class="page-content-choose-style-wrapper-item-content-row">
                                    <a href="#" class="page-content-choose-style-wrapper-item-content-sex sex-active" data-gender="M">
                                        <span class="page-content-choose-style-wrapper-item-content-sex-icon male"></span>
                                        <p class="page-content-choose-style-wrapper-item-content-sex-text">Male</p>
                                    </a>
                                    <a href="#" class="page-content-choose-style-wrapper-item-content-sex" data-gender="F">
                                        <span class="page-content-choose-style-wrapper-item-content-sex-icon female"></span>
                                        <p class="page-content-choose-style-wrapper-item-content-sex-text">Female</p>
                                    </a>
                                </div>
                                <div id="avatar" class="page-content-choose-style-wrapper-item-content-avatar">
                                    <img id="myHabbo" src="" onerror="this.onerror=null;this.src='https://www.habbo.com/habbo-imaging/avatarimage?head_direction=4&direction=4&size=l&figure=hr-100-39.hd-180-1.ch-210-66.lg-270-1338.sh-290-1408&gender=M';" alt="New user Avatar" class="page-content-choose-style-wrapper-item-content-avatar-figure">
                                    <input type="hidden" name="look" id="avatar_code">
                                    <input type="hidden" name="avatar_gender" id="avatar_gender">
                                    <input type="hidden" name="userid" id="userid" value="<?php echo User::userData('id') ?>">
                                </div>
                                <p class="page-content-choose-style-wrapper-item-content-text">Can't decide? You can change your clothes later, don't worry!</p>
                                <button type="submit" id="registration_checker" name="registration_checker" class="page-content-choose-style-wrapper-item-content-button">I am ready</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="error" style="z-index: 9; left: 15px; right: inherit;"></div>
    </div>
    <script src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/scripts/avatar-generate.js?release-0.0.3" type="text/javascript"></script>