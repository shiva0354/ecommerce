<?php
class fetchDatabase
{
  function fetchTable($tblname,$connection)
  {
	  $fetchTable= "select * from $tblname";
	  $init = mysqli_query($connection,$fetchTable);
	  return $init;
  }
  
  //fetch table according to attribute
  function fetchTableByAttr($tablename,$attr,$data,$connection)
  {
	  $fetchTable = "select * from $tablename where $attr='$data'";
	  /*$stmt = $connection->prepare($fetchTable);
	  $stmt->bind_param('s',$data);
	  $init = $stmt->execute();*/
	  $init=mysqli_query($connection,$fetchTable);
	  return $init;
  }
  //Fetch Table According Two Col Atrr
  function fetchTableByColumnAttrs($tablename,$connection,$attr1,$attr2,$data1,$data2)
  {
	  $query="select * from $tablename where $attr1='$data1' and $attr2='$data2'";
	  /*$stmt=$connection->prepare($query);
	  $stmt->bind_param('ss',$data1,$data2);
	  $stmt->execute();*/
	  $init = mysqli_Query($connection,$query);
	  return $init;
  }
 //Fetch Table According To Date and Time with view attr
 function fetchTableAccordingToDate($tablename,$connection)
 {
	 $query="select * from $tablename  where view='no' order by id desc";
	 $init = mysqli_query($connection,$query);
	 return $init;
 }
 //
 function fetchTableAccordingToSorting($tablename,$attr,$sort,$connection)
 {
	 $query="select * from $tablename group by $attr order by id $sort";
	 $init=mysqli_query($connection,$query);
	 return $init;
 }
}
?>