<?php
$navigatorID = 6;
$subNavigatorID = 2;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider">
            <div class="page-content-max-width" style="width: 900px; justify-content: center;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content playing-habbo">
                        <div class="page-content-collider-content-playing-habbo-item">
                            <h1 class="page-content-collider-content-playing-habbo-item-big-title">How to play</h3>
                            <p class="page-content-collider-content-playing-habbo-item-description">You've styled your avatar, gotten comfy in your homeroom and you've been shown how a few things work by the Hotel Manager… So, what next?</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item dashed">
                            <h3 class="page-content-collider-content-playing-habbo-item-mini-title">Explore rooms</h3>
                            <p class="page-content-collider-content-playing-habbo-item-description"><img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/playing/navigator.png" alt="Explore rooms" class="page-content-collider-content-playing-habbo-item-image">Click the Navigator and choose one of the public rooms where you can chat with other <?= $config['hotelName'] ?>s.</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item dashed">
                            <h3 class="page-content-collider-content-playing-habbo-item-mini-title">Make friends</h3>
                            <p class="page-content-collider-content-playing-habbo-item-description"><img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/playing/askfriend.png" alt="Make friends" class="page-content-collider-content-playing-habbo-item-image">Click on a <?= $config['hotelName'] ?>, ask them to be your friend or give them respect!</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item dashed">
                            <h3 class="page-content-collider-content-playing-habbo-item-mini-title">Visit game rooms</h3>
                            <p class="page-content-collider-content-playing-habbo-item-description"><img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/playing/gamehub.png" alt="Visit game rooms" class="page-content-collider-content-playing-habbo-item-image">Find the Game Hub in the list of public rooms in the navigator. Once there, use any of the arcade machines to go to a game room!</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item dashed">
                            <h3 class="page-content-collider-content-playing-habbo-item-mini-title">Go shopping</h3>
                            <p class="page-content-collider-content-playing-habbo-item-description"><img src="<?= $config['hotelUrl'] ?>/templates/mezz/assets/images/playing/shop.png" alt="Go shopping" class="page-content-collider-content-playing-habbo-item-image">Go to the Duckets shop and see what your free duckets can get you!</p>
                        </div>
                        <div class="page-content-collider-content-playing-habbo-item">
                            <h3 class="page-content-collider-content-playing-habbo-item-mini-title">Check out the latest activities</h3>
                            <p class="page-content-collider-content-playing-habbo-item-description">Visit the <a href="/" class="page-content-collider-content-playing-habbo-item-url">Home</a> section of the website to find out all the latest news, competitions and general goings-on in <?= $config['hotelName'] ?>!</p>
                            <p class="page-content-collider-content-playing-habbo-item-description">Once you've done a few of these, you will be well on your way to becoming a fully fledged <?= $config['hotelName'] ?> citizen!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'include/footer.php';
?>