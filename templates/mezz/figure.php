<html>
<body>
<img src="<?php echo $config['avatarImager'] ?><?= User::userData('look') ?>&direction=2&head_direction=3&gesture=sml&action=wav&size=l" alt="<?= User::userData('username') ?> avatar in Habbo" class="page-content-collider-content-profile-avatar-figure">
<p><?= User::userData('look') ?></p>
</body>
</html>