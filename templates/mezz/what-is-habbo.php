<?php
$navigatorID = 6;
$subNavigatorID = 1;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider">
            <div class="page-content-max-width" style="width: 900px; justify-content: center;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content playing-habbo">
                        <div class="page-content-collider-content-playing-habbo-item">
                            <h2 class="page-content-collider-content-playing-habbo-item-title">What is <?= $config['hotelName'] ?>?</h2>
                            <p class="page-content-collider-content-playing-habbo-item-description"><?= $config['hotelName'] ?> is an online vintage pixel-art style virtual community where you can <b class="page-content-collider-content-playing-habbo-item-bolder">create your own avatar, make friends, chat, build rooms, design + play games</b> and so much more! Almost anything is possible in this strange place full of awesome people…</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item">
                            <h2 class="page-content-collider-content-playing-habbo-item-title">More than just a game...</h2>
                            <p class="page-content-collider-content-playing-habbo-item-description"><img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/playing/ill_15.png" alt="More than just a game..." class="page-content-collider-content-playing-habbo-item-image">Styling your avatar in the most on-trend styles isn't the only way to have fun in <?= $config['hotelName'] ?>. Want to be the architect of the century and <b class="page-content-collider-content-playing-habbo-item-bolder">build dazzling structures?</b> Builders Club is for you! Want to show off your crazy <b class="page-content-collider-content-playing-habbo-item-bolder">game building skills</b> and stump your friends? Join our competitions!</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item">
                            <h2 class="page-content-collider-content-playing-habbo-item-title">Find your community</h2>
                            <p class="page-content-collider-content-playing-habbo-item-description">Do you love to chat and hang out with friends? <b class="page-content-collider-content-playing-habbo-item-bolder"><?= $config['hotelName'] ?> Groups, forums and Roleplaying communities</b> are a great place to start. Join the army and suit up for duty, don your cape and save the universe, wear <?= $config['hotelName'] ?> Couture as you strut down the runway, become a nurse and save pixel lives. Join in and start exploring the endless role-playing possibilities!</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item">
                            <h2 class="page-content-collider-content-playing-habbo-item-title">Express yourself</h2>
                            <p class="page-content-collider-content-playing-habbo-item-description"><img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/playing/ill_16.png" alt="Express yourself" class="page-content-collider-content-playing-habbo-item-image">Creativity and individuality are welcomed in <?= $config['hotelName'] ?>! Every week we have tons of awesome competitions for you to enter. From <b class="page-content-collider-content-playing-habbo-item-bolder">room building to Selfies, to pixel art videos and short story comps</b> - there are tons of cool things to get your artistic juices flowing and win awesome achievements + prizes! Feeling creative? Check out our news to find out about fun weekly competitions!</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item">
                            <h2 class="page-content-collider-content-playing-habbo-item-title">Play free, forever.</h2>
                            <p class="page-content-collider-content-playing-habbo-item-description"><?= $config['hotelName'] ?> is a <b class="page-content-collider-content-playing-habbo-item-bolder">free to play game</b>, so you can explore a vast world of rooms, complete quests, chat and win prizes without ever having to pay a thing!</p>
                            <p class="page-content-collider-content-playing-habbo-item-description">Some in-game 'extras' like pets, <?= $config['hotelName'] ?> Club membership, Builders Club membership and furniture can be purchased with <?= $config['hotelName'] ?> Credits. For more info about in-game extras, head to the <a href="/playing/shop.php" class="page-content-collider-content-playing-habbo-item-url">Shop</a>.</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item">
                            <h2 class="page-content-collider-content-playing-habbo-item-title">Always here to help...</h2>
                            <p class="page-content-collider-content-playing-habbo-item-description"><img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/playing/ill_17.png" alt="Always here to help..." class="page-content-collider-content-playing-habbo-item-image">The Hotel is moderated 24 hours a day, seven days a week. You can also do a lot to make sure you stay safe on <?= $config['hotelName'] ?> and on the internet. Read our <a href="/playing/safety.php" class="page-content-collider-content-playing-habbo-item-url">Safety</a> Tips to find out how.</p>
                            <p class="page-content-collider-content-playing-habbo-item-description">As a popular online virtual world we are proud to have great <b class="page-content-collider-content-playing-habbo-item-bolder">in-depth knowledge of online safety</b>, following international guidelines set out by government groups and teen organisations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'include/footer.php';
?>