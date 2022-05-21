<?php
$navigatorID = 10;
$subNavigatorID = 1;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item">
                   <div class="page-content-collider-content not-found">
						<span class="page-content-collider-content-not-found-image"></span>
						<h3 class="page-content-collider-content-not-found-title">Something went wrong</h3>
						<p class="page-content-collider-content-not-found-text">Frank can't find the page you're looking for. Please check the URL or try starting over from <a href="/" class="page-content-collider-item-content-not-found-text-url">front page.</a></p>
				   </div>
                </div>
            </div>
        </div>
<?php
include 'include/footer.php';
?>