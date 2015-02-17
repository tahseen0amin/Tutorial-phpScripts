<?php
    
    if(isset($_REQUEST['CustomerID']))
       {
       $con = mysql_connect("127.0.0.1","root","pass123");
       if (!$con)
       {
       die('Could not connect: ' . mysql_error());
       }
       mysql_select_db("TestDatabase", $con);
       
       $id = $_REQUEST['CustomerID'];
       
       $result = mysql_query("SELECT * FROM Customers WHERE id = '$id' ") or die('Errant query:');
       
       
       while($row = mysql_fetch_assoc($result))
       {
            $output[]=$row;
       }
       
       print(json_encode($output));
       
       mysql_close($con);
       }
    else
       {
       $output = "not found";
       print(json_encode($output));
       }




?>