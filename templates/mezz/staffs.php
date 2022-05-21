<?php
$navigatorID = 3;
$subNavigatorID = 4;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
        <div class="page-content-collider" style="background-color: transparent;">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content staffs">
						<?php
						$getRanks = $dbh->prepare("SELECT id,rank_name,badge FROM permissions WHERE id in (8) ORDER BY id DESC");
						$getRanks->execute();
						while ($Ranks = $getRanks->fetch())
						{	
						echo '
                        <div class="page-content-collider-content-staffs-column">
                            <div class="page-content-collider-content-staffs-box">
                                <h2 class="page-content-collider-content-staffs-box-title">' . $Ranks['rank_name'] . 's</h2>
						';
						$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE rank = :ranid");
						$getMembers->bindParam(':ranid', $Ranks['id']);
						$getMembers->execute();
						if ($getMembers->RowCount() > 0)
						{
						while ($member = $getMembers->fetch())
						{
						$username = filter($member['username']);
						$motto = filter($member['motto']);
						$look = filter($member['look']);
						$online = filter($member['online']);
						if($online == 1){ $OnlineStatus = "Online"; } else { $OnlineStatus = "Offline"; }
						echo '
                                <div class="page-content-collider-content-staffs-box-row">
                                    <img src="' . $config['avatarImager'] .''.$look.'&action=std&direction=2&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=b" alt="'.$username.' Avatar" class="page-content-collider-content-staffs-box-figure">
                                    <div class="page-content-collider-content-staffs-box-column">
                                        <a href="/profile/'.$username.'" class="page-content-collider-content-staffs-box-username">'.$username.'</a>
                                        <p class="page-content-collider-content-staffs-box-motto">' .$motto . '</p>
                                        <img src="'. $config['hotelUrl'] .'/swf/c_images/album1584/' . $Ranks['badge'] . '.gif" alt="'. $config['hotelName'] .' ' . $Ranks['rank_name'] . '" class="page-content-collider-content-staffs-box-badge">
                                    </div>
                                    <p class="page-content-collider-content-staffs-box-status ' .$OnlineStatus . '">' .$OnlineStatus . '</p>
                                </div>
						';
						}
						}
						echo '
							</div>
                        </div>
						';
						}
						?>
                        <div class="page-content-collider-content-staffs-column">
							<?php
							$getRanks = $dbh->prepare("SELECT id,rank_name,badge FROM permissions WHERE id in (7,6) ORDER BY id DESC");
							$getRanks->execute();
							while ($Ranks = $getRanks->fetch())
							{	
							echo '
							<div class="page-content-collider-content-staffs-box">
								<h2 class="page-content-collider-content-staffs-box-title">' . $Ranks['rank_name'] . 's</h2>
							';
							$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE rank = :ranid");
							$getMembers->bindParam(':ranid', $Ranks['id']);
							$getMembers->execute();
							if ($getMembers->RowCount() > 0)
							{
							while ($member = $getMembers->fetch())
							{
							$username = filter($member['username']);
							$motto = filter($member['motto']);
							$look = filter($member['look']);
							$online = filter($member['online']);
							if($online == 1){ $OnlineStatus = "Online"; } else { $OnlineStatus = "Offline"; }
							echo '
								<div class="page-content-collider-content-staffs-box-row">
									<img src="' . $config['avatarImager'] .''.$look.'&action=std&direction=2&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=b" alt="'.$username.' Avatar" class="page-content-collider-content-staffs-box-figure">
									<div class="page-content-collider-content-staffs-box-column">
										<a href="/profile/'.$username.'" class="page-content-collider-content-staffs-box-username">'.$username.'</a>
										<p class="page-content-collider-content-staffs-box-motto">' .$motto . '</p>
										<img src="'. $config['hotelUrl'] .'/swf/c_images/album1584/' . $Ranks['badge'] . '.gif" alt="'. $config['hotelName'] .' ' . $Ranks['rank_name'] . '" class="page-content-collider-content-staffs-box-badge">
									</div>
									<p class="page-content-collider-content-staffs-box-status ' .$OnlineStatus . '">' .$OnlineStatus . '</p>
								</div>
							';
							}
							}
							echo '
							</div>
							';
							}
							?>
						</div>
						<div class="page-content-collider-content-staffs-column">
							<?php
							$getRanks = $dbh->prepare("SELECT id,rank_name,badge FROM permissions WHERE id in (5,4) ORDER BY id DESC");
							$getRanks->execute();
							while ($Ranks = $getRanks->fetch())
							{	
							echo '
							<div class="page-content-collider-content-staffs-box">
								<h2 class="page-content-collider-content-staffs-box-title">' . $Ranks['rank_name'] . 's</h2>
							';
							$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE rank = :ranid");
							$getMembers->bindParam(':ranid', $Ranks['id']);
							$getMembers->execute();
							if ($getMembers->RowCount() > 0)
							{
							while ($member = $getMembers->fetch())
							{
							$username = filter($member['username']);
							$motto = filter($member['motto']);
							$look = filter($member['look']);
							$online = filter($member['online']);
							if($online == 1){ $OnlineStatus = "Online"; } else { $OnlineStatus = "Offline"; }
							echo '
								<div class="page-content-collider-content-staffs-box-row">
									<img src="' . $config['avatarImager'] .''.$look.'&action=std&direction=2&head_direction=3&img_format=undefined&gesture=sml&headonly=0&size=b" alt="'.$username.' Avatar" class="page-content-collider-content-staffs-box-figure small">
									<div class="page-content-collider-content-staffs-box-column">
										<a href="/profile/'.$username.'" class="page-content-collider-content-staffs-box-username">'.$username.'</a>
										<p class="page-content-collider-content-staffs-box-motto">' .$motto . '</p>
									</div>
									<p class="page-content-collider-content-staffs-box-status ' .$OnlineStatus . '">' .$OnlineStatus . '</p>
								</div>
							';
							}
							}
							echo '
							</div>
							';
							}
							?>
						</div>
                    </div>
                </div>
            </div>
		</div>
<?php 
include 'include/footer.php';
?>