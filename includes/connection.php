<?php
class Database
{
 private $server ="localhost";
 private $user ="root";
 private $password ="";
 private $dbname ="shopify";
 function getConnection()
 {
   $con = mysqli_connect($this->server,$this->user,$this->password,$this->dbname);
   return $con;
 }
}
?>

<!-- server password
 private $server ="localhost";
 private $user ="u635200556_shop";
 private $password ="VdiLSTUIUlP9";
 private $dbname ="u635200556_shop";
 function getConnection()
 --->
