<?php
require 'connection.php';
$database = new Database;
$conn = $database->getConnection();
class fetchDatabase
{
  function fetchTable($tblname)
  {
	  global $conn;
	  $fetchTable= "select * from $tblname";
	  $init = mysqli_query($conn,$fetchTable);
	  return $init;
  }
  function fetchTableByCategory($tblname,$id,$attr)
  {
	  global $conn;
	  $fetchTable= "select * from $tblname where $attr = '$id'";
	  $init = mysqli_query($conn,$fetchTable);
	  return $init;
  }

  function fetchTableByCategoryMen($tblname,$id,$MenID,$attr)
  {
	  global $conn;
	  $fetchTable= "select * from $tblname where $attr = '$id' and product_category='$MenID'";
	  $init = mysqli_query($conn,$fetchTable);
	  return $init;
  }
  function fetchTableByCategoryWomen($tblname,$id,$WomenID,$attr)
  {
	  global $conn;
	  $fetchTable= "select * from $tblname where $attr = '$id' and product_category='$WomenID'";
	  $init = mysqli_query($conn,$fetchTable);
	  return $init;
  }
  function fetchLimit($tblname)
  {
	  global $conn;
	  $randomRecord = "select * from $tblname LIMIT 6";
	  $init = mysqli_query($conn,$randomRecord);
	  return $init;
  }
    function fetchDistinctRecord($tblname,$col1,$col2,$id)
  {
	  global $conn;
	  $distinctRecord = "select distinct $col1 from $tblname where $col2 = '$id' ";
	  $init = mysqli_query($conn,$distinctRecord);
	  return $init;
  }
  function fetchTableBySortOrder($tablename,$sort,$val)
  {
	  global $conn;
	  $select = "select * from $tablename where product_category=$val order by product_price $sort";
	  $init = mysqli_query($conn,$select);
	  return $init;
  }
  function fetchTableByNewArrival($tablename,$sort,$val)
  {
	  global $conn;
	  $select = "select * from $tablename where product_category=$val order by id $sort";
	  $init = mysqli_query($conn,$select);
	  return $init;
  }
  function fetchTableByHottestSeller($tablename,$attr,$data,$attr2,$data2)
  {
	  global $conn;
	  $select="select * from $tablename where $attr = '$data' and $attr2='$data2'";
	  $init=mysqli_query($conn,$select);
	  return $init;
  }
  function fetchTableSoldOutForBestSeller($tablename)
  {
	  global $conn;
	  $sql = "select * from $tablename order by id desc limit 15";
	  $init=mysqli_query($conn,$sql);
	  return $init;
  }
}
?>