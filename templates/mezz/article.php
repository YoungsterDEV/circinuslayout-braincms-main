<?php
$navigatorID = 3;
$subNavigatorID = 5;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider" style="background-color: transparent;">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content news">
                        <div class="page-content-collider-content-news-left-side">
                            <h2 class="page-content-collider-content-news-left-side-title">News</h2>
								<?php
								for ($i = 0; $i < 6; $i++)
								{
								$sectionName = "";
								$sectionCutoffMax = 0;
								$sectionCutoffMin = 0;
								switch ($i)
								{
								case 0:
								$sectionName = 'Today';
								$sectionCutoffMax = time();
								$sectionCutoffMin = time() - 86400;
								break;
								case 1:
								$sectionName = 'Yesterday';
								$sectionCutoffMax = time() - 86400;
								$sectionCutoffMin = time() - 172800;
								break;
								case 2:
								$sectionName = 'Thisk Week';
								$sectionCutoffMax = time() - 172800;
								$sectionCutoffMin = time() - 604800;
								break;
								case 3:
								$sectionName = 'Last Week';
								$sectionCutoffMax = time() - 604800;
								$sectionCutoffMin = time() - 1209600;
								break;
								case 4:
								$sectionName = 'This Month';
								$sectionCutoffMax = time() - 1209600;
								$sectionCutoffMin = time() - 2592000;
								break;
								case 5:
								$sectionName = 'Last Month';
								$sectionCutoffMax = time() - 2592000;
								$sectionCutoffMin = time() - 5184000;
								break;
								}
								$getArticles = $dbh->prepare("SELECT id,date,title FROM cms_news WHERE date >= :sectionCutoffMin AND date <= :sectionCutoffMax ORDER BY date DESC");
								$getArticles->bindParam(':sectionCutoffMin', $sectionCutoffMin);
								$getArticles->bindParam(':sectionCutoffMax', $sectionCutoffMax);
								$getArticles->execute();
								if ($getArticles->RowCount() > 0)
								{
								?>
								<div class="page-content-collider-content-news-left-side-item">
									<h3 class="page-content-collider-content-news-left-side-item-title"><?php echo filter($sectionName) ?></h3>
									<ul class="page-content-collider-content-news-left-side-item-list">
								<?php
								while ($a = $getArticles->fetch())
								{
								?>
										<li class="page-content-collider-content-news-left-side-item-list-item <?php $page = $_GET['id']; if($page == filter($a['id'])) { echo "active"; } ?>">
											<a href="/community/article/<?php echo filter($a['id']) ?>" class="page-content-collider-content-news-left-side-item-list-url"><?php echo filter($a['title']) ?> »</a>
										</li>
								<?php
								}
								echo '
									</ul>
								</div>
									';
								}
								}
								?>
                        </div>
                        <div class="page-content-collider-content-news-right-side">
                            <div class="page-content-collider-content-news-right-side-content">
							<?php
							$sql = $dbh->prepare("SELECT id,title,longstory,author FROM cms_news WHERE id = :newsid");
							$sql->bindParam(':newsid', $_GET['id']);
							$sql->execute();
							If($sql->RowCount() > 0)
							{
							while ($news = $sql->fetch())
							{
							$getMembers = $dbh->prepare("SELECT username,look FROM users WHERE id = :author");
							$getMembers->bindParam(':author', $news['author']);
							$getMembers->execute();
							$userDetails = $getMembers->fetch(); {
							?>
                            <h2 class="page-content-collider-content-news-right-side-content-title"><?php echo filter($news["title"]) ?></h2>
                                <?php echo html_entity_decode($news["longstory"]) ?>
                                <div class="page-content-collider-content-news-right-side-content-article-author">
                                    <span class="page-content-collider-content-news-right-side-content-article-author-figure" style="background-image: url('<?php echo $config['avatarImager'] ?><?php echo filter($userDetails['look']) ?>&action=std&direction=2&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=b');"></span>
                                    <a href="/profile/<?php echo filter($userDetails['username']) ?>" class="page-content-collider-content-news-right-side-content-article-author-username"><?php echo filter($userDetails['username']) ?></a>
                                </div>
							<?php
							}
							}
							}
							?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
<?php 
include 'include/footer.php';
?>