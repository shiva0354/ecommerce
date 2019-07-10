<div class="row text-center" id="mobile-device-filter-sort">
			     <!--Filters-->
			     <div class="col-xs-6">
				 
				 <div class="dropdown">
				 <span class="dropdown-toggle filter-mainheading" id="filterParent"  data-toggle="dropdown">FILTER</span>
				 <div class="dropdown-menu" id="filter">
				     <!--Category Menu-->
				     <div class="dropdown-item filter-dropdown-item">
					      <div class="dropdown">
					      <span class="dropdown-toggle filter-mainheading" data-toggle="dropdown">Category</span>
						  <div class="dropdown-submenu filter-submenu">
						   <?php
						      $x = new fetchDatabase;
                              $Limit = $x->fetchLimit('suboption');
						  while($data = mysqli_fetch_array($Limit))
						  {
							  $suboptionId = $data['id'];
							  $suboptionName = $data['suboption'];
						  ?>
						  
					      <a class="sb dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'] ;?>&ID=<?php echo $suboptionId;?>"><?php echo $suboptionName ;?></a>
						  <?php } ?>
						  </div>
						  </div>
					 </div>
					 <!--Sizess-->
					 <div class="dropdown-item filter-dropdown-item">
					      <div class="dropdown">
					      <span class="dropdown-toggle filter-mainheading" data-toggle="dropdown">Size</span>
						  <div class="dropdown-submenu filter-submenu">
						  <?php
						 $fetch_size_table = "select distinct size from size";
						 $init = mysqli_query($conn , $fetch_size_table);
						 while($size=mysqli_fetch_Array($init))
						 {
							
							$sizeName=$size['size'];
							
                            $select_size_table = "select * from size where size = '$sizeName'";
							$run = mysqli_query($conn,$select_size_table);
							
							$ssize = mysqli_fetch_array($run);
							$sizeofProduct = $ssize['product_id'];
							

						?>
					      <a class="dropdown-item" href="womencategory.php?size=<?php echo $sizeofProduct ;?>&Women-Clothing=<?php echo $_GET['Women-Clothing']?>&ID=<?php echo $suboptionId;?>"><?php echo $sizeName ;?></a>
						<?php } ?>
						  </div>
						  </div>
					 </div>
					 <!--Color-->
					  <div class="dropdown-item filter-dropdown-item">
					      <div class="dropdown">
					      <span class="dropdown-toggle filter-mainheading" data-toggle="dropdown">Size</span>
						  <div class="dropdown-submenu filter-submenu">
						  <?php
						   $fetch_color_from_product = "select distinct product_color from product where product_category ='$menClothing'";
						   $initialize_color = mysqli_query($conn , $fetch_color_from_product);
						   while($color = mysqli_fetch_array($initialize_color))
						   {
							   $colorName = $color['product_color'];
						      
						?>
					      <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $womenClothing ;?>&Color=<?php echo $colorName ;?>"><?php echo $colorName ;?></a>
						  
						   <?php } ?>
						  </div>
						  </div>
					 </div>
					 <!--Design-->
					 <div class="dropdown-item filter-dropdown-item">
					      <div class="dropdown">
					      <span class="dropdown-toggle filter-mainheading" data-toggle="dropdown">Design</span>
						  <div class="dropdown-submenu filter-submenu">
						  <?php
						      $designTable = $x->fetchTable('design');
							  while($design = mysqli_Fetch_Array($designTable))
							  {
								  $designId=$design['id'];
								  $designName=$design['design'];
							  
						   ?>
						   <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'] ;?>&Design=<?php echo $designId ;?>"><?php echo $designName ;?></a>
						   <?php }?>
						  </div>
						  </div>
					 </div>
					 <!--Fit-->
					  <div class="dropdown-item filter-dropdown-item">
					      <div class="dropdown">
					      <span class="dropdown-toggle filter-mainheading" data-toggle="dropdown">Fit</span>
						  <div class="dropdown-submenu filter-submenu">
						  <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'] ;?>&Fit=Regular">Regular</a>
					      <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'] ;?>&Fit=Slim">Slim</a>
						  </div>
						  </div>
					 </div>
					 <!--Sleeve-->
					 <div class="dropdown-item filter-dropdown-item">
					      <div class="dropdown">
					      <span class="dropdown-toggle filter-mainheading" data-toggle="dropdown">Sleeves</span>
						  <div class="dropdown-submenu filter-submenu">
					      <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'];?>&Sleeves=FullSleeve">Full Sleeve</a>
					      <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'];?>&Sleeves=HalfSleeve">Half Sleeve</a>
					      <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'];?>&Sleeves=SleeveLess">Sleeveless</a>
						  </div>
						  </div>
					 </div>
					 <!--Neck-->
					  <div class="dropdown-item filter-dropdown-item">
					      <div class="dropdown">
					      <span class="dropdown-toggle filter-mainheading" data-toggle="dropdown">Sleeves</span>
						  <div class="dropdown-submenu filter-submenu">
					       <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'];?>&Neck=RoundNeck">Round Neck</a>
					      <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'];?>&Neck=Hood">Hood</a>
					      <a class="dropdown-item" href="womencategory.php?Women-Clothing=<?php echo $_GET['Women-Clothing'];?>&Neck=TwoPieceCollar">Two Piece Collor</a>
						  </div>
						  </div>
					 </div>
					 
				 </div>
				 </div>
				 
				 </div>
				 <!--End-->
				 <div class="col-xs-6" style="border-left:solid 2px gray;">
				      <div class="dropdown-item filter-dropdown-item">
					      <div class="dropdown" style="position:relative;right:100px;">
					      <span class="dropdown-toggle filter-mainheading" id="sortParent" style="position:relative;right:-100px;" data-toggle="dropdown">SORT</span>
						  <div class="dropdown-menu filter-submenu" id="sort">
						  <a class="dropdown-item" href="#">Popular</a>
					      <a class="dropdown-item" href="womenClothing.php?new">New:</a>
					      <a class="dropdown-item" href="womenclothing.php?sort-high-2-low">Price:High to Low</a>
					      <a class="dropdown-item" href="womenclothing.php?sort-low-2-high">Low to High</a>
						  </div>
						  </div>
					 </div>
				 </div>
			 </div>
			 <script>
			 /**
			 var filter = document.getElementById('filterParent');
			 var sort = document.getElementById('sortParent');
			 filter.addEventListener("mouseover",function(){
				  document.getElementById("filter").style.display="block";
				  document.getElementById("sort").style.display="none";
			 });
			 document.getElementById("filter").addEventListener("mouseleave",function(){
				 document.getElementById("filter").style.display="none";
			 });
			 sort.addEventListener("mouseover",function(){
				 document.getElementById("sort").style.display="block";
				 document.getElementById("filter").style.display="none";
			 });
			  document.getElementById("sort").addEventListener("mouseleave",function(){
				 document.getElementById("sort").style.display="none";
			 });***/
			 setInterval(myFun,200);
			 function myFun()
			 {
				 screenSize = screen.width;
				 if(screenSize < 550)
				 {
					var mdfs = document.querySelector("#mobile-device-filter-sort");
					mdfs.style.display="block";
				 }
				 else
				 {
					 var mdfs = document.querySelector("#mobile-device-filter-sort");
					 mdfs.style.display="none";
				 }  
			 }
			 </script>