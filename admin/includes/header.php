<?php
include_once 'connection.php';
include_once 'fetch.php';
include_once 'update.php';
@session_start();

//Database Object
$database = new Database();
$connection = $database->getConnection();

//Fetch Object
$fetchObject = new fetchDatabase();
$updateObject = new updateDatabase();

?>

<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.php"><h1>SHOPY</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
							<!--search-box-->
								<div class="search-box">
									<form>
										<input type="text" placeholder="Search..." required="">	
										<input type="submit" value="">					
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i><span class="badge">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 3 new messages</h3>
												</div>
											</li>
											<li><a href="user_profile.php">
											   <div class="user_img"><img src="images/p4.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>
											<li class="odd"><a href="user_profile.php">
												<div class="user_img"><img src="images/p2.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor </p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>	
											</a></li>
											<li><a href="user_profile.php">
											   <div class="user_img"><img src="images/p3.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="user_list.php">See all users</a>
												</div> 
											</li>
										</ul>
									</li>
									<!--Notification Section-->			
									<li class="dropdown head-dpdn">
									    <?php
									 //Count Wishlist's no view 
										$selectWishlist =$fetchObject->fetchTableAccordingToDate('wishlist',$connection);
										$countWishlist=0;
										while(mysqli_fetch_array($selectWishlist))
										{
											$countWishlist++;
										}		
                                     //Count Soldout's no view
									   $selectSoldOut =$fetchObject->fetchTableAccordingToDate('soldout',$connection);
										$countSoldOut=0;
									    while(mysqli_fetch_array($selectSoldOut))
										{
										   $countSoldOut++;	
                                        }											 
									 ?>
										<a href="#"  class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell">
										</i><span  class="badge blue"><span id="bell-icon"><?=$countSoldOut+$countWishlist?></span></span>
										</a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have <span style="color:#DD5145;"><?=$countSoldOut+$countWishlist?></span> new notification</h3>
												</div>
											</li>
											<li><a href="notification.php#notification-container-wishlist">	
											   <div class="notification_desc">
											   <?php 
											   if($countWishlist)
											   {
												   echo '<p style="font-weight:bold;">Wishlist Notification <strong><span style="color:#DD5145 !important;" id="wishlist-notification">'.$countWishlist.'</strong></span></p>';
											   }
											   else
											   {
												 echo '<p>Wishlist Notification <strong><span  id="wishlist-notification">'.$countWishlist.'</strong></span></p>';
											   }
											   ?>
												
												</div>
											  <div class="clearfix"></div>	
											 </a></li>
											 <li class="odd"><a href="notification.php#notification-container-soldout">
											   <div class="notification_desc">
											    <?php
												 if($countSoldOut)
												 {
												 echo '<p style="font-weight:bold;">Purchase Notification <span style="color:#DD5145 !important;" id="purchase-notification"><strong>'.$countSoldOut.'</strong></span></p>';
												 }
												 else
												 {
												 echo '<p>Purchase Notification <span id="purchase-notification"><strong>'.$countSoldOut.'</strong></span></p>';
												 }
												?>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 <li><a href="notificationphp">
											   <div class="notification_desc">
												<p>Order Cancellation</p>
												</div>
											   <div class="clearfix"></div>	
											 </a></li>
											 <li>
												<div class="notification_bottom">
													<a href="notification.php">See all notifications</a>
												</div> 
											</li>
										</ul>
									</li>	
									<script>
									  setInterval(updateBell,500);
									  function updateBell()
									  {
										  $("#bell-icon").load("includes/header.php #bell-icon");
										  $("#wishlist-notification").load("includes/header.php #wishlist-notification");
										  $("#purchase-notification").load("includes/header.php #purchase-notification");
					
									  }
									</script>
								   <!--Notification Section End-->
								</ul>
								<div class="clearfix"> </div>
							</div>
							<?php
							  $getTable = $fetchObject->fetchTableByAttr('admin','email',$_SESSION['email'],$connection);
                              
							  $retrieveAdmin = mysqli_fetch_array($getTable);
							  $name=$retrieveAdmin['name'];
							  $email=$retrieveAdmin['email'];
							  $photo=$retrieveAdmin['photo'];					  
							?>
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><?='<img src="data:image/jpeg;base64,'.base64_encode($photo).'" alt="" width="50" height="50"> </span>';?>
												<div class="user-name">
													<p><?=$name?></p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="setting.php"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="admin_profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>