<?php
$navigatorID = 5;
$subNavigatorID = 1;
include 'include/head.php';
include 'include/header.php';
include 'include/menu.php';
?>
	    <div class="page-content-collider">
            <div class="page-content-max-width" style="flex-direction: column;align-items: flex-start;">
                <div class="page-content-collider-item">
                    <div class="page-content-collider-content shop">
                        <h1 class="page-content-collider-content-shop-title">Buy credits and more</h1>
                        <div class="page-content-collider-content-shop-column">
                            <div class="page-content-collider-content-shop-left-side">
								<?php
								$sql = $dbh->prepare("SELECT * FROM cms_shop WHERE type = '2' ORDER BY id ASC");
								$sql->execute();
								If($sql->RowCount() > 0)
								{
								while ($item = $sql->fetch())
								{
								?>
                                <div class="page-content-collider-content-shop-left-side-special-offer">
                                    <div class="page-content-collider-content-shop-left-side-special-offer-item accordion">
                                        <div class="page-content-collider-content-shop-left-side-special-offer-item-head">
                                            <p class="page-content-collider-content-shop-left-side-special-offer-item-head-title">Valid for limited time</p>
                                        </div>
                                        <div class="page-content-collider-content-shop-left-side-special-offer-item-body">
                                            <div class="page-content-collider-content-shop-left-side-special-offer-item-body-row">
                                                <div class="page-content-collider-content-shop-left-side-special-offer-item-body-icon --icon-<?php echo filter($item["icon"]) ?>"></div>
                                                <div class="page-content-collider-content-shop-left-side-special-offer-item-body-column">
                                                    <h5 class="page-content-collider-content-shop-left-side-special-offer-item-body-title"><?php echo filter($item["title"]) ?></h5>
                                                    <p class="page-content-collider-content-shop-left-side-special-offer-item-body-description"><?php echo filter($item["description"]) ?></p>
                                                </div>
                                            </div>
                                            <div class="page-content-collider-content-shop-left-side-special-offer-item-body-price">
                                                <p class="page-content-collider-content-shop-left-side-products-item-body-price-text">US$ <?php echo filter($item["price"]) ?></p>
                                            </div>
                                        </div>
                                    </div>
									<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-absolute payment">
										<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details">
											<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-icon-space">
												<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-icon-space-icon pixelated --s-icon-<?php echo filter($item["icon"]) ?>"></span>
											</div>
											<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information">
												<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head">
													<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head-title"><?php echo filter($item["title"]) ?></span>
													<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head-price">US$ <?php echo filter($item["price"]) ?></span>
												</div>
												<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-description"><?php echo filter($item["description"]) ?></p>
												<ul class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps">
													<li class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item">
														<h3 class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-title">Check your details</h3>
														<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-avatar"><?php if(loggedIn()){ ?>You buy with <b class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-avatar-bolder"><?= User::userData('username') ?></b> account.<?php } else { ?>You must be logged in to purchase.<?php } ?></p>
													</li>
													<li class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item">
														<h3 class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-title">Choose how to buy</h3>
														<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">Always ask your parents and/or bill-payer's permission first. If you don't and the payment is later cancelled or declined, you'll be banned.</p>
														<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">By clicking "Pay", you accept that the digital content is delivered immediately upon confirmation of payment and that there is no right of withdrawal after purchase.</p>
														<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">You may leave our website and enter a third-party website over which we are not in control. Third-party sites may have different Privacy policies than we do.</p>
													</li>
												</ul>
												<?php if(loggedIn()){ ?>
												<?php if(!empty($item["payment_paypal"])) { ?>
												<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
													<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/paypal.png" alt="Paypal logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
													<a href="<?php echo filter($item["payment_paypal"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
												</button>
												<?php } ?>
												<?php if(!empty($item["payment_visa_or_mastercard"])) { ?>
												<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
													<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/visa-mastercard.png" alt="Visa and Mastercard logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
													<a href="<?php echo filter($item["payment_visa_or_mastercard"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
												</button>
												<?php } ?>
												<?php if(!empty($item["payment_paysafe"])) { ?>
												<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
													<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/paysafe.png" alt="Paysafe logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
													<a href="<?php echo filter($item["payment_paysafe"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
												</button>
												<?php } ?>
												<?php } ?>
											</div>
										</div>
									</div>
                                </div>
								<?php } } ?>
                                <div class="page-content-collider-content-shop-left-side-products">
                                    <h3 class="page-content-collider-content-shop-left-side-products-title">Memberships and bundles</h3>
                                    <ul class="page-content-collider-content-shop-left-side-products-list">
										<?php
										$sql = $dbh->prepare("SELECT * FROM cms_shop WHERE type = '1' ORDER BY id ASC");
										$sql->execute();
										If($sql->RowCount() > 0)
										{
										while ($item = $sql->fetch())
										{
										?>
                                        <div class="page-content-collider-content-shop-left-side-products-list-wrapper" style="height: 100%">
                                            <button class="page-content-collider-content-shop-left-side-products-list-item accordion">
                                                <div class="page-content-collider-content-shop-left-side-products-list-item-column">
                                                    <span class="page-content-collider-content-shop-left-side-products-list-item-icon --icon-<?php echo filter($item["icon"]) ?>"></span>
                                                    <p class="page-content-collider-content-shop-left-side-products-list-item-name"><?php echo filter($item["title"]) ?></p>
                                                </div>
                                                <div class="page-content-collider-content-shop-left-side-products-list-item-price">
                                                    <p class="page-content-collider-content-shop-left-side-products-list-item-price-text">US$ <?php echo filter($item["price"]) ?></p>
                                                </div>
                                            </button>
											<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-absolute payment">
												<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details">
													<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-icon-space">
														<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-icon-space-icon pixelated --icon-<?php echo filter($item["icon"]) ?>"></span>
													</div>
													<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information">
														<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head">
															<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head-title"><?php echo filter($item["title"]) ?></span>
															<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head-price">US$ <?php echo filter($item["price"]) ?></span>
														</div>
														<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-description"><?php echo filter($item["description"]) ?></p>
														<ul class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps">
															<li class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item">
																<h3 class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-title">Check your details</h3>
																<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-avatar"><?php if(loggedIn()){ ?>You buy with <b class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-avatar-bolder"><?= User::userData('username') ?></b> account.<?php } else { ?>You must be logged in to purchase.<?php } ?></p>
															</li>
															<li class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item">
																<h3 class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-title">Choose how to buy</h3>
																<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">Always ask your parents and/or bill-payer's permission first. If you don't and the payment is later cancelled or declined, you'll be banned.</p>
																<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">By clicking "Pay", you accept that the digital content is delivered immediately upon confirmation of payment and that there is no right of withdrawal after purchase.</p>
																<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">You may leave our website and enter a third-party website over which we are not in control. Third-party sites may have different Privacy policies than we do.</p>
															</li>
														</ul>
														<?php if(loggedIn()){ ?>
														<?php if(!empty($item["payment_paypal"])) { ?>
														<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
															<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/paypal.png" alt="Paypal logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
															<a href="<?php echo filter($item["payment_paypal"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
														</button>
														<?php } ?>
														<?php if(!empty($item["payment_visa_or_mastercard"])) { ?>
														<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
															<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/visa-mastercard.png" alt="Visa and Mastercard logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
															<a href="<?php echo filter($item["payment_visa_or_mastercard"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
														</button>
														<?php } ?>
														<?php if(!empty($item["payment_paysafe"])) { ?>
														<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
															<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/paysafe.png" alt="Paysafe logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
															<a href="<?php echo filter($item["payment_paysafe"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
														</button>
														<?php } ?>
														<?php } ?>
													</div>
												</div>
											</div>
                                        </div>
										<?php } } ?>
                                    </ul>
                                </div>
								<div class="page-content-collider-content-shop-left-side-products">
                                    <h3 class="page-content-collider-content-shop-left-side-products-title">Credits</h3>
                                    <ul class="page-content-collider-content-shop-left-side-products-list">
                                        <?php
										$sql = $dbh->prepare("SELECT * FROM cms_shop WHERE type = '0' ORDER BY id ASC");
										$sql->execute();
										If($sql->RowCount() > 0)
										{
										while ($item = $sql->fetch())
										{
										?>
                                        <div class="page-content-collider-content-shop-left-side-products-list-wrapper" style="height: 100%">
                                            <button class="page-content-collider-content-shop-left-side-products-list-item accordion">
                                                <div class="page-content-collider-content-shop-left-side-products-list-item-column">
                                                    <span class="page-content-collider-content-shop-left-side-products-list-item-icon --icon-<?php echo filter($item["icon"]) ?>"></span>
                                                    <p class="page-content-collider-content-shop-left-side-products-list-item-name"><?php echo filter($item["title"]) ?></p>
                                                </div>
                                                <div class="page-content-collider-content-shop-left-side-products-list-item-price">
                                                    <p class="page-content-collider-content-shop-left-side-products-list-item-price-text">US$ <?php echo filter($item["price"]) ?></p>
                                                </div>
                                            </button>
											<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-absolute payment">
												<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details">
													<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-icon-space">
														<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-icon-space-icon pixelated --icon-<?php echo filter($item["icon"]) ?>"></span>
													</div>
													<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information">
														<div class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head">
															<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head-title"><?php echo filter($item["title"]) ?></span>
															<span class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-head-price">US$ <?php echo filter($item["price"]) ?></span>
														</div>
														<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-description"><?php echo filter($item["description"]) ?></p>
														<ul class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps">
															<li class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item">
																<h3 class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-title">Check your details</h3>
																<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-avatar"><?php if(loggedIn()){ ?>You buy with <b class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-avatar-bolder"><?= User::userData('username') ?></b> account.<?php } else { ?>You must be logged in to purchase.<?php } ?></p>
															</li>
															<li class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item">
																<h3 class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-title">Choose how to buy</h3>
																<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">Always ask your parents and/or bill-payer's permission first. If you don't and the payment is later cancelled or declined, you'll be banned.</p>
																<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">By clicking "Pay", you accept that the digital content is delivered immediately upon confirmation of payment and that there is no right of withdrawal after purchase.</p>
																<p class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-steps-item-text">You may leave our website and enter a third-party website over which we are not in control. Third-party sites may have different Privacy policies than we do.</p>
															</li>
														</ul>
														<?php if(loggedIn()){ ?>
														<?php if(!empty($item["payment_paypal"])) { ?>
														<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
															<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/paypal.png" alt="Paypal logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
															<a href="<?php echo filter($item["payment_paypal"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
														</button>
														<?php } ?>
														<?php if(!empty($item["payment_visa_or_mastercard"])) { ?>
														<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
															<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/visa-mastercard.png" alt="Visa and Mastercard logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
															<a href="<?php echo filter($item["payment_visa_or_mastercard"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
														</button>
														<?php } ?>
														<?php if(!empty($item["payment_paysafe"])) { ?>
														<button class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method">
															<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/partners/paysafe.png" alt="Paysafe logo" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-logo">
															<a href="<?php echo filter($item["payment_paysafe"]) ?>" target="_blank" class="page-content-collider-content-shop-left-side-products-list-item-product-payment-details-information-payment-method-button">Pay</a>
														</button>
														<?php } ?>
														<?php } ?>
													</div>
												</div>
											</div>
                                        </div>
										<?php } } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="page-content-collider-content-shop-right-side">
								<?php if(loggedIn()) { ?>
								<div class="page-content-collider-content-shop-right-side-box">
									<h3 class="page-content-collider-content-shop-right-side-box-title">My Purse</h3>
									<div class="page-content-collider-content-shop-right-side-box-content">
										<div class="page-content-collider-content-shop-right-side-box-content-column">
											<div class="page-content-collider-content-shop-right-side-box-content-item">
												<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/credits.png" alt="Credits" class="page-content-collider-content-shop-right-side-box-content-item-icon">
												<p class="page-content-collider-content-shop-right-side-box-content-item-text"><?= User::userData('credits') ?> credits</p>
											</div>
											<div class="page-content-collider-content-shop-right-side-box-content-item">
												<img src="<?php echo $config['hotelUrl'] ?>/templates/mezz/assets/images/shop/diamonds.png" alt="Diamonds" class="page-content-collider-content-shop-right-side-box-content-item-icon">
												<p class="page-content-collider-content-shop-right-side-box-content-item-text"><?= User::userData('vip_points') ?> diamonds</p>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								<div class="page-content-collider-content-shop-right-side-box">
									<h3 class="page-content-collider-content-shop-right-side-box-title">Help for payment</h3>
									<div class="page-content-collider-content-shop-right-side-box-content">
										<p class="page-content-collider-content-shop-right-side-box-content-text">Wondering <b class="page-content-collider-content-shop-right-side-box-content-text-bold">what all those shiny things for sale</b> are? See <a href="#" target="_blank" class="page-content-collider-content-shop-right-side-box-content-text-url">detailed descriptions of our goods</a> in Habbo Helpdesk!</p>
										<p class="page-content-collider-content-shop-right-side-box-content-text"><b class="page-content-collider-content-shop-right-side-box-content-text-bold">All legitimate ways to buy credits are shown either here or in the in-game Shop. Buying them elsewhere may get you ripped off and banned.</b></p>
										<p class="page-content-collider-content-shop-right-side-box-content-text">Habbo has different spending limits for different payment options. They are all listed on our <a href="#" target="_blank" class="page-content-collider-content-shop-right-side-box-content-text-url">Spending Limits</a> page in Habbo Helpdesk.</p>
										<p class="page-content-collider-content-shop-right-side-box-content-text">Got a query about your <b class="page-content-collider-content-shop-right-side-box-content-text-bold">Habbo account, a purchase or a feature?</b> Find your answer at the <a href="#" target="_blank" class="page-content-collider-content-shop-right-side-box-content-text-url">Habbo Helpdesk.</a></p>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
include 'include/footer.php';
?>