<?php

$con = mysql_connect("127.0.0.1","root","pass123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("TestDatabase", $con);

$result = mysql_query("SELECT * FROM Customers");

while($row = mysql_fetch_assoc($result))
  {
	$output[]=$row;
  }
print(json_encode($output));

mysql_close($con);


?>