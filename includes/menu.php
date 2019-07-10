<?php 
  $conn = mysqli_connect("localhost","root","","shopify");
  $select = "select * from catoption";
  $fetchCat = mysqli_query($conn , $select);
  $arr = array();
  while($option = mysqli_fetch_array($fetchCat))
  {
    array_push($arr,$option['id'],$option['catoption']);	
  }
?>
<style>
.heading-links
{
font-weight:bold;
color:#595959;
}
.heading-links:hover
{
 background-color:#ffffff;
color:#A8A8A8;

}
.normal-links
{
 color:#A8A8A8;
}
.normal-links:hover
{
 background-color:#ffffff;
color:#A8A8A8;
text-decoration:underline;
}
.dropdown-css
{
 border-radius:0;
 paddinge:1rem;
 font-size:15px;
 
}
.dropdown-toggle::after
{
 display:none;
}
</style>

<!--Scriptt-->
<script>
 function megaMenuToGo(gotoCheck)
 {
	 if(gotoCheck == "megamenuMen")
	 {
	 window.location = "menclothing.php?Men-Clothing=1";
	 }
	 else if(gotoCheck == "megamenuWomen")
	 {
		 window.location = "womenclothing.php?Women-Clothing=2";
	 }
 }
 function megaMenuShow(whichShow)
 {
	if(whichShow == "megamenuMen")
	{
		var idOfDropDownDiv = document.getElementById("megamenudivMen");
		idOfDropDownDiv.style.display="block";
		
		var idOfDropDownDiv = document.getElementById("megamenudivWomen");
		idOfDropDownDiv.style.display="none";
	}
	else if(whichShow == "megamenuWomen")
	{
		var idOfDropDownDiv = document.getElementById("megamenudivWomen");
		idOfDropDownDiv.style.display="block";
		
		var idOfDropDownDiv = document.getElementById("megamenudivMen");
		idOfDropDownDiv.style.display="none";
	}
 }
 function megaMenuHide(whichHide)
 {
	  if(whichHide == "megamenudivMen")
	  {
        var idOfDropDownDiv = document.getElementById("megamenudivMen");
		idOfDropDownDiv.style.display="none";
	  }
	  else if(whichHide == "megamenudivWomen")
	  {
		var idOfDropDownDiv = document.getElementById("megamenudivWomen");
		idOfDropDownDiv.style.display="none";
	  }
 }
</script>
<a class="navbar-brand" href="index.php">Ecommerce Single Wendor</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
       <!--Mega Menu 1-->
	       <li class="nav-item dropdown mega-menu">
		   <a class="nav-link dropdown-toggle" id="megamenuMen" role="button" data-toggle="dropdown" href="#"  onmouseover="megaMenuShow(this.id)" onclick="megaMenuToGo(this.id)">Men</a>
		   <div class="dropdown-menu dropdown-css" id="megamenudivMen" onmouseleave="megaMenuHide(this.id)">
		   <table class="table">
		          <tr>
				  <td>
		          <a class="dropdown-item heading-links" href="mencategory.php?Men-Clothing=1&catOption=<?php echo $arr[0];?>"><?php echo $arr[1] ;?></a>
				  <?php
				    $select_suboption = "select * from suboption where catoption = '$arr[0]'";
					$init = mysqli_query($conn , $select_suboption);
					while($suboption = mysqli_fetch_array($init))
					{
						$id = $suboption['id'];
						$soption = $suboption['suboption'];
					
				  ?>
				  <a class="dropdown-item normal-links" href="mencategory.php?Men-Clothing=1&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				  <?php } ?>
				  </td>
				   <td>
		          <a class="dropdown-item heading-links" href="mencategory.php?Men-Clothing=1&catOption=<?php echo $arr[2];?>"><?php echo $arr[3] ;?></a>
				  <?php
				    $select_suboption = "select * from suboption where catoption = '$arr[2]'";
					$init = mysqli_query($conn , $select_suboption);
					while($suboption = mysqli_fetch_array($init))
					{
						$id = $suboption['id'];
						$soption = $suboption['suboption'];
					
				  ?>
				  <a class="dropdown-item normal-links" href="mencategory.php?Men-Clothing=1&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				  <?php } ?>
				  </td>
				   <td>
		          <a class="dropdown-item heading-links" href="mencategory.php?Men-Clothing=1&catOption=<?php echo $arr[4];?>"><?php echo $arr[5];?></a>
				   <?php
				    $select_suboption = "select * from suboption where catoption = '$arr[4]'";
					$init = mysqli_query($conn , $select_suboption);
					while($suboption = mysqli_fetch_array($init))
					{
						$id = $suboption['id'];
						$soption = $suboption['suboption'];
					
				  ?>
				  <a class="dropdown-item normal-links" href="mencategory.php?Men-Clothing=1&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				  <?php } ?>
				  </td>
				  </tr>
				  <tr>
				     <td>
					    <a class="dropdown-item heading-links" href="mencategory.php?Men-Clothing=1&catOption=<?php echo $arr[6];?>"><?php echo $arr[7] ;?></a>
						 <?php
				           $select_suboption = "select * from suboption where catoption = '$arr[6]'";
					       $init = mysqli_query($conn , $select_suboption);
					      while($suboption = mysqli_fetch_array($init))
					      {
						    $id = $suboption['id'];
						    $soption = $suboption['suboption'];
				  ?>
				  <a class="dropdown-item normal-links" href="mencategory.php?Men-Clothing=1&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				  <?php } ?>
					 </td>
					 <td>
					    <a class="dropdown-item heading-links" href="mencategory.php?Men-Clothing=1&catOption=<?php echo $arr[8];?>"><?php echo $arr[9] ;?></a>
						 <?php
				       $select_suboption = "select * from suboption where catoption = '$arr[8]'";
					   $init = mysqli_query($conn , $select_suboption);
					   while($suboption = mysqli_fetch_array($init))
					   {
						$id = $suboption['id'];
						$soption = $suboption['suboption'];
					
				     ?>
				     <a class="dropdown-item normal-links" href="mencategory.php?Men-Clothing=1&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				     <?php } ?>
					 </td>
				  </tr>
		    </table>
		   </div>
		   </li>
		  <!---Mega Menu 1 END-->
      	<!--Mega Menu 2 --->
           <li class="nav-item dropdown mega-menu">
		   <a class="nav-link dropdown-toggle" id="megamenuWomen" role="button" data-toggle="dropdown" href="#" onmouseover="megaMenuShow(this.id)" onclick="megaMenuToGo(this.id)">Women</a>
		   <div class="dropdown-menu dropdown-css" id="megamenudivWomen" onmouseleave="megaMenuHide(this.id)">
		   <table class="table">
		          <tr>
				  <td>
		          <a class="dropdown-item heading-links" href="womencategory.php?Women-Clothing=2&catOption=<?php echo $arr[0];?>"><?php echo $arr[1] ;?></a>
				   <?php
				       $select_suboption = "select * from suboption where catoption = '$arr[0]'";
					   $init = mysqli_query($conn , $select_suboption);
					   while($suboption = mysqli_fetch_array($init))
					   {
						$id = $suboption['id'];
						$soption = $suboption['suboption'];
					
				    ?>
				     <a class="dropdown-item normal-links" href="womencategory.php?Women-Clothing=2&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				    <?php } ?>
				  </td>
				   <td>
		          <a class="dropdown-item heading-links" href="womencategory.php?Women-Clothing=2&catOption=<?php echo $arr[2];?>"><?php echo $arr[3] ;?></a>
				   <?php
				       $select_suboption = "select * from suboption where catoption = '$arr[2]'";
					   $init = mysqli_query($conn , $select_suboption);
					   while($suboption = mysqli_fetch_array($init))
					   {
						$id = $suboption['id'];
						$soption = $suboption['suboption'];
					
				    ?>
				  <a class="dropdown-item normal-links" href="womencategory.php?Women-Clothing=2&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				  <?php } ?>
				  </td>
				   <td>
		          <a class="dropdown-item heading-links" href="womencategory.php?Women-Clothing=2&catOption=<?php echo $arr[4];?>"><?php echo $arr[5] ;?></a>
				   <?php
				       $select_suboption = "select * from suboption where catoption = '$arr[4]'";
					   $init = mysqli_query($conn , $select_suboption);
					   while($suboption = mysqli_fetch_array($init))
					   {
						$id = $suboption['id'];
						$soption = $suboption['suboption'];
					
				    ?>
				    <a class="dropdown-item normal-links" href="womencategory.php?Women-Clothing=2&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				   <?php } ?>
				  </td>
				  </tr>
				  <tr>
				     <td>
					    <a class="dropdown-item heading-links" href="womencategory.php?Women-Clothing=2&catOption=<?php echo $arr[6];?>"><?php echo $arr[7] ;?></a>
						 <?php
				          $select_suboption = "select * from suboption where catoption = '$arr[6]'";
					     $init = mysqli_query($conn , $select_suboption);
					     while($suboption = mysqli_fetch_array($init))
					     {
						 $id = $suboption['id'];
						 $soption = $suboption['suboption'];
				    ?>
				    <a class="dropdown-item normal-links" href="womencategory.php?Women-Clothing=2&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				   <?php } ?>
					 </td>
					 <td>
					     <a class="dropdown-item heading-links" href="womencategory.php?Women-Clothing=2&catOption=<?php echo $arr[8];?>"><?php echo $arr[9] ;?></a>
						 <?php
				           $select_suboption = "select * from suboption where catoption = '$arr[8]'";
					       $init = mysqli_query($conn , $select_suboption);
					       while($suboption = mysqli_fetch_array($init))
					      {
						  $id = $suboption['id'];
						  $soption = $suboption['suboption'];
				        ?>
				         <a class="dropdown-item normal-links" href="womencategory.php?Women-Clothing=2&ID=<?php echo $id;?>"><?php echo $soption ;?></a>
				         <?php } ?>
					 </td>
				  </tr>
		    </table>
		   </div>
		   </li>
		  <!--Mega Menu 2 END -->
    </ul>