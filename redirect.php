<?php
  if(isset($_GET['Men-Clothing']))
  {
	  header("location:menclothing.php?Men-Clothing=1");
  }
  else if(isset($_GET['Women-Clothing']))
  {
	  header("location:womenclothing.php?Women-Clothing=2");
  }
?>