		<div class="page-content-nav">
            <div class="page-content-max-width" style="justify-content: flex-start;">
                <div class="page-content-nav-item <?php if ($navigatorID == 1) { echo 'active'; } ?>">
                    <a href="/" class="page-content-nav-item-text">Home</a>
                </div>
                <div class="page-content-nav-item <?php if ($navigatorID == 3) { echo 'active'; } ?>">
                    <a class="page-content-nav-item-text">Community</a>
                    <div class="page-content-nav-item-dropdown-content">
                        <a href="/community/photos" class="page-content-nav-item-sub-text">Photos</a>
                        <a href="/community/rooms" class="page-content-nav-item-sub-text">Rooms</a>
                        <a href="/community/fansites" class="page-content-nav-item-sub-text">Fansites</a>
                        <a href="/community/staffs" class="page-content-nav-item-sub-text">Staffs</a>
                        <a href="/community/article/<?php $sql = $dbh->prepare("SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");$sql->execute(); while ($news = $sql->fetch()) { echo ''.filter($news["id"]).'';} ?>" class="page-content-nav-item-sub-text">News</a>
                    </div>
                </div>
                <div class="page-content-nav-item <?php if ($navigatorID == 4) { echo 'active'; } ?>">
                    <a href="/highscores" class="page-content-nav-item-text">Highscores</a>
                </div>
                <div class="page-content-nav-item <?php if ($navigatorID == 5) { echo 'active'; } ?>">
                    <a href="/shop" class="page-content-nav-item-text">Shop</a>
                </div>
                <div class="page-content-nav-item <?php if ($navigatorID == 6) { echo 'active'; } ?>">
                    <a class="page-content-nav-item-text">Playing <?= $config['hotelName'] ?></a>
                    <div class="page-content-nav-item-dropdown-content">
                        <a href="/playing-habbo/what-is-habbo" class="page-content-nav-item-sub-text">What is <?= $config['hotelName'] ?></a>
                        <a href="/playing-habbo/how-to-play" class="page-content-nav-item-sub-text">How to Play</a>
                        <a href="/playing-habbo/habbo-way" class="page-content-nav-item-sub-text"><?= $config['hotelName'] ?> Way</a>
                        <a href="/playing-habbo/safety" class="page-content-nav-item-sub-text">Safety</a>
                        <a href="#" target="_blank" class="page-content-nav-item-sub-text">Help</a>
                    </div>
                </div>
				<?php if($config['nft'] == true) { ?>
				<div class="page-content-nav-item <?php if ($navigatorID == 13) { echo 'active'; } ?>">
                    <a href="/nft/avatars" class="page-content-nav-item-text">NFT</a>
                </div>
				<?php } ?>
            </div>
        </div>